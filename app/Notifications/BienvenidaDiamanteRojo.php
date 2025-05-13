<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BienvenidaDiamanteRojo extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('¡Bienvenido a Diamante Rojo!')
            ->greeting('Hola ' . $notifiable->name . ' 👋')
            ->line('Gracias por registrarte en *Diamante Rojo*. Estamos felices de tenerte con nosotros.')
            ->line('Aquí podrás disfrutar de juegos, premios y muchas sorpresas.')
            ->action('Ir al sitio', url('/'))
            ->line('¡Que comience la diversión!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
