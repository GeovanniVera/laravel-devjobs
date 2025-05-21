<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewCandidate extends Notification
{
    use Queueable;

    public $vacancy_id;
    public $vacancy_title;
    public $user_id;

    /**
     * Create a new notification instance.
     */
    public function __construct($vacancy_id,$vacancy_title,$user_id)
    {
        $this->vacancy_id = $vacancy_id;
        $this->vacancy_title = $vacancy_title;
        $this->user_id = $user_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {

        $url = url('/notifications/');
        return (new MailMessage)
            ->line('Has un nuevo candidato para tu vacante '.$this->vacancy_title.'.')
            ->action('Ver Candidato', $url)
            ->line('Gracias por usar nuestra aplicación!');
    }



    public function toDatabase(object $notifiable)
    {
        return [
            'vacancy_id' => $this->vacancy_id,
            'vacancy_title' => $this->vacancy_title,
            'user_id' => $this->user_id,
            'message' => 'Hay un nuevo candidato para tu vacante '.$this->vacancy_title.'.',
            'url' => url('/candidates/'.$this->user_id),
        ];
    }
}
