<?php

namespace App\Actions\Voyager;

use TCG\Voyager\Actions\AbstractAction;

class AcaoValidarFotografo extends AbstractAction
{
    public function getTitle()
    {
        return 'Validar';
    }

    public function getIcon()
    {
        return 'voyager-check';
    }

    public function getPolicy()
    {
        return 'read';
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-dark pull-right mx-2 ',
        ];
    }

    public function getDefaultRoute()
    {
        return route('fotografo.ativar', ['id'=>$this->data->id]);
    }

    /**
     * Se Você só quer mostrar sua ação para telas especificas:
     */
    public function shouldActionDisplayOnDataType()
    {
        return $this->dataType->slug == 'fotografos';
    }
    //para ações em massa:
    /*public function massAction($ids, $comingFrom)
    {
        // Do something with the IDs
        //dd($ids);
        return redirect($comingFrom);
    }//*/
}
