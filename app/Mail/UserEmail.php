<?php

namespace App\Mail;

use App\Models\Foto;
use App\Models\Pedido;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class UserEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $pedido;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Pedido $pedido)
    {
        $this->pedido = $pedido; // persiste dentro da classe

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $this->subject("Fotos do Pedido {$this->pedido->id}");

        $fotos = $this->pedido->fotos()->get();
        $usuario = User::find($this->pedido->user_id);

        foreach($fotos as $foto) {

            //dd(public_path(), storage_path(), $foto->original);
            $file = storage_path( ) . '\app\public\\' . $foto->original;
            $this->attach($file);

        }

        $this->to($usuario->email, $usuario->name);
        return $this->markdown('mail.index', data: [
            'user' => $usuario
        ]);

        // criar uma página para redirecionar o usuário
    }
}
