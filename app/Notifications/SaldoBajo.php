<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SaldoBajo extends Notification
{
    use Queueable;

    protected $saldo;

    /**
     * Create a new notification instance.
     * 
     * @param float $saldo
     * @return void
     */
    public function __construct($saldo)
    {
        $this->saldo = $saldo;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     * 
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('⚠️ ¡Tu saldo es bajo!')
            ->greeting('Hola ' . $notifiable->name . ',')
            ->line('Tu saldo actual es de ' . $this->saldo . ' monedas.')
            ->line('Recuerda que cuando tu saldo esté por debajo de 50 monedas, no podrás realizar ciertas acciones.')
            ->action('Recargar saldo', url('/recargar-saldo')) // Asegúrate de crear esta ruta
            ->line('¡No dejes que se agote!'); 
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'saldo' => $this->saldo,
        ];
    }
}
