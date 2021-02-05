<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendCredentialsToTheNewUser extends Notification
{
    use Queueable;

    protected $password;

    public function __construct($password)
    {
        $this->password = $password;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Creación de usuario en ' . env('APP_NAME') . '.')
                    ->greeting('Hola, ' . $notifiable->name . ' ' . $notifiable->surname . '.')
                    ->line('¡Bienvenido a ' . env('APP_NAME') . '!')
                    ->line('Tus credenciales para acceder son:')
                    ->line('<strong>Correo electrónico: </strong>' . $notifiable->email)
                    ->line('<strong>Contraseña: </strong>' . $this->password)
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
