<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class Ediciondepartamento extends Notification
{
    use Queueable;
//defino variable local para recibir en la llamada a la notificacion
    private $departamento;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
//PISO LA VARIABLE LOCAL EN EL CONSTRUCTOR
    public function __construct(\App\departamento $departamento)
    {
        $this->departamento = $departamento;
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
        return [    'id' => $this->departamento->id,
                    'nombre' => 'Departamento editado',
                    'mensaje'=> ''.$this->departamento->nombre.' ha sido editado.',
                    'url'=> "/departamentos",
                    'data' => $this->departamento->create_at,
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
        'id_departamento' => $this->departamento->id,
        'nombre' => $this->invoice->amount,
        ];
    }
}
