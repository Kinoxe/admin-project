<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class EdicionCliente extends Notification
{
    use Queueable;
//defino variable local para recibir en la llamada a la notificacion
    private $cliente;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
//PISO LA VARIABLE LOCAL EN EL CONSTRUCTOR
    public function __construct(\App\Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {   //SELECCIONO QUE ENVIE NOTIFICACIONES VIA BASEDE DATOS
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */   

     //CREO EL METODO BASE DE DATOS PARA GUARDAR LAS NOTIFICACIONS
    public function toDatabase()
    {  
        return [    'id' => $this->cliente->id,
                    'nombre' => 'Cliente editado',
                    'mensaje'=> ''.$this->cliente->nombre.' ha sido editado.',
                    'url'=> "/clientes/".$this->cliente->id,
                    'data' => $this->cliente->create_at,
                    'icon' => 'fa fa-pencil',
                    'color' => 'text-warning',
                    'creador'=> auth()->user()->name
                ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
        'id_cliente' => $this->cliente->id,
        'nombre' => $this->invoice->amount,
        ];
    }
}
