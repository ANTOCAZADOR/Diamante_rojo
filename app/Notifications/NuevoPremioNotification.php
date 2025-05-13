<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoPremioNotification extends Notification
{
    use Queueable;

    public $premio;
    /**
     * Create a new notification instance.
     */
    public function __construct($premio)
    {
        $this->premio = $premio;
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
            ->subject('¡Nuevo premio disponible!')
            ->greeting('Hola ' . $notifiable->name . '!')
            ->line('Se ha agregado un nuevo premio: ' . $this->premio->name)
            ->line('Descripción: ' . $this->premio->descripcion)
            ->line('Monto: $' . number_format($this->premio->monto, 2))
            ->action('Ir a Premios', url('/premios'))
            ->line('¡Gracias por participar!');
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
