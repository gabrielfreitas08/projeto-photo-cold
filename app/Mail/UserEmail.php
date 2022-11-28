<?php

namespace App\Mail;

use App\Models\Foto;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class UserEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    private $fotos;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $fotos)
    {
        $this->user = $user; // persiste dentro da classe
        $this->fotos = $fotos;
        $user = Auth::user();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('Teste das fotos');

        foreach($this->fotos as $foto) {
            //dd(public_path(), storage_path(), $foto->original);
            $file = storage_path( ) . '\app\public\\' . $foto->original;
            $this->attach($file);

        }

        $this->to($this->user->email, $this->user->name);
        return $this->markdown('mail.index', data: [
            'user' => $this->user
        ]);

        // criar uma página para redirecionar o usuário
    }
}
