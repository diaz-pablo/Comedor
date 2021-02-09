<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendNewPasswordToUpdatedUser extends Notification
{
    use Queueable;

    public $newPassword;

    public function __construct($newPassword)
    {
        $this->newPassword = $newPassword;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Actualización de contraseña.')
            ->greeting('Hola, ' . $notifiable->name . ' ' . $notifiable->surname . '.')
            ->line('Se actualizó tu contraseña exitosamente.')
            ->line('Tus credenciales para acceder son:')
            ->line('<strong>Correo electrónico: </strong>' . $notifiable->email)
            ->line('<strong>Nueva contraseña: </strong>' . $this->newPassword)
            ->line('<small style="color: #dc3545;">Recomendamos que actualizes tu contraseña desde la sección de Mi perfil.</small>')
            ->action('Acceder a ' . env('APP_NAME'), url('/login'))
            ->line('¡Gracias por usar nuestra aplicación!');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
