<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use stdClass;

class EventoVoyagerController extends \TCG\Voyager\Http\Controllers\VoyagerBaseController
{
    public $filesystem;

    public function __construct()
    {
        $this->filesystem = config('voyager.storage.disk');
    }

    private function addWatermarkToImage($file_path, $options)
    {

        $image = Image::make(Storage::disk($this->filesystem)->get($file_path));
        $watermark = Image::make(Storage::disk('public-folder')->path('images/logo.png'));

        // Resize watermark
        $width = $image->width() * (($options->size ?? 33) / 100);
        $watermark->resize($width, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        return $image->insert(
            $watermark,
            ($options->position ?? 'center'),
            ($options->x ?? 0),
            ($options->y ?? 0)
        );
    }

    public function insertUpdateData($request, $slug, $rows, $data)
    {
        $multi_select = [];

        $fotosDoEvento = [];

        // Pass $rows so that we avoid checking unused fields
        $request->attributes->add(['breadRows' => $rows->pluck('field')->toArray()]);

        /*
         * Prepare Translations and Transform data
         */
        $translations = is_bread_translatable($data)
            ? $data->prepareTranslations($request)
            : [];



        foreach ($rows as $row) {
            // if the field for this row is absent from the request, continue
            // checkboxes will be absent when unchecked, thus they are the exception
            if (!$request->hasFile($row->field) && !$request->has($row->field) && $row->type !== 'checkbox') {
                // if the field is a belongsToMany relationship, don't remove it
                // if no content is provided, that means the relationships need to be removed
                if (isset($row->details->type) && $row->details->type !== 'belongsToMany') {
                    if ($row->type == 'relationship' && $row->details->type == 'belongsTo') {
                        $row->field = @$row->details->column;
                        $data->{$row->field} = $request->{$row->field};
                        continue;
                    }
                    continue;
                }
            }

            // Value is saved from $row->details->column row
            if ($row->type == 'relationship' && $row->details->type == 'belongsTo') {
                continue;
            }

            $content = $this->getContentBasedOnType($request, $slug, $row, $row->details);

            if ($row->type == 'relationship' && $row->details->type != 'belongsToMany') {
                $row->field = @$row->details->column;
            }

            /*
             * merge ex_images/files and upload images/files
             */
            if (in_array($row->type, ['multiple_images', 'file']) && !is_null($content)) {
                if (isset($data->{$row->field})) {
                    $ex_files = json_decode($data->{$row->field}, true);
                    $fotosDoEvento = json_decode($content);
                    if (!is_null($ex_files)) {
                        $content = json_encode(array_merge($ex_files, json_decode($content)));
                    }
                }
            }

            if (is_null($content)) {

                // If the image upload is null and it has a current image keep the current image
                if ($row->type == 'image' && is_null($request->input($row->field)) && isset($data->{$row->field})) {
                    $content = $data->{$row->field};
                }

                // If the multiple_images upload is null and it has a current image keep the current image
                if ($row->type == 'multiple_images' && is_null($request->input($row->field)) && isset($data->{$row->field})) {
                    $content = $data->{$row->field};
                }

                // If the file upload is null and it has a current file keep the current file
                if ($row->type == 'file') {
                    $content = $data->{$row->field};
                    if (!$content) {
                        $content = json_encode([]);
                    }
                }

                if ($row->type == 'password') {
                    $content = $data->{$row->field};
                }
            }

            if ($row->type == 'relationship' && $row->details->type == 'belongsToMany') {
                // Only if select_multiple is working with a relationship
                $multi_select[] = [
                    'model'           => $row->details->model,
                    'content'         => $content,
                    'table'           => $row->details->pivot_table,
                    'foreignPivotKey' => $row->details->foreign_pivot_key ?? null,
                    'relatedPivotKey' => $row->details->related_pivot_key ?? null,
                    'parentKey'       => $row->details->parent_key ?? null,
                    'relatedKey'      => $row->details->key,
                ];
            } else {
                $data->{$row->field} = $content;
            }
        }

        if (isset($data->additional_attributes)) {
            foreach ($data->additional_attributes as $attr) {
                if ($request->has($attr)) {
                    $data->{$attr} = $request->{$attr};
                }
            }
        }

        $data->save();

        // Save translations
        if (count($translations) > 0) {
            $data->saveTranslations($translations);
        }

        foreach ($multi_select as $sync_data) {
            $data->belongsToMany(
                $sync_data['model'],
                $sync_data['table'],
                $sync_data['foreignPivotKey'],
                $sync_data['relatedPivotKey'],
                $sync_data['parentKey'],
                $sync_data['relatedKey']
            )->sync($sync_data['content']);
        }

        foreach ($fotosDoEvento as $indice =>$foto_path) {
            $foto = new Foto();
            $foto->evento_id = $data->id;
            $foto->original = $foto_path;
            $options = new stdClass;
            $thumbnail_file = $foto->thumbnail('medium', 'original');
            $infoPath = pathinfo($thumbnail_file);
            $extension = $infoPath['extension'];
            $thumbnail = $this->addWatermarkToImage($thumbnail_file,$options);
            Storage::disk($this->filesystem)->put($thumbnail_file, $thumbnail->encode($extension, 90)->encoded);

            $foto->save();
            if($indice==0){
                $data->capa_id = $foto->id;
                $data->save();
            }
        }

        if (isset($data->fotos_evento)) {
            $ex_files = json_decode($data->fotos_evento, true);
            $fotosDoEvento = json_decode($content);
            if (!is_null($ex_files)) {
                $content = json_encode(array_merge($ex_files, json_decode($content)));
            }
        }

        //dd($fotosDoEvento, $request, $slug, $rows, $data);
        foreach ($fotosDoEvento as $indice =>$foto_path) {
            $foto = new \App\Models\Foto();
            $foto->evento_id = $data->id;
            $foto->original = $foto_path;
            $foto->save();
            if($indice==0){
                $data->capa_id = $foto->id;
                $data->save();
            }
        }

        // Rename folders for newly created data through media-picker
        if ($request->session()->has($slug . '_path') || $request->session()->has($slug . '_uuid')) {
            $old_path = $request->session()->get($slug . '_path');
            $uuid = $request->session()->get($slug . '_uuid');
            $new_path = str_replace($uuid, $data->getKey(), $old_path);
            $folder_path = substr($old_path, 0, strpos($old_path, $uuid)) . $uuid;

            $rows->where('type', 'media_picker')->each(function ($row) use ($data, $uuid) {
                $data->{$row->field} = str_replace($uuid, $data->getKey(), $data->{$row->field});
            });
            $data->save();
            if (
                $old_path != $new_path &&
                !Storage::disk(config('voyager.storage.disk'))->exists($new_path) &&
                Storage::disk(config('voyager.storage.disk'))->exists($old_path)
            ) {
                $request->session()->forget([$slug . '_path', $slug . '_uuid']);
                Storage::disk(config('voyager.storage.disk'))->move($old_path, $new_path);
                Storage::disk(config('voyager.storage.disk'))->deleteDirectory($folder_path);
            }
        }

        return $data;
    }
}
