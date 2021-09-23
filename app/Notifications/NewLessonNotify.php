<?php

namespace App\Notifications;

use App\Models\Lesson;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewLessonNotify extends Notification
{
    use Queueable;

    public $lesson;
    public $data;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($lesson, $data)
    {
        $this->lesson = $lesson;
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Halo anak-anak, Tugas baru telah tersedia..')
                    ->greeting('Halo' , 'Para Murid')
                    ->line('Tugas baru sudah diupload, silahkan dikerjakan tugasnya yaa..')
                    ->line('Judul Tugas : '.$this->lesson->title) //Send with post title
                    ->action('Baca tugas' , route('task.show' , $this->lesson->slug)) //Send with post url
                    ->line('Terimakasih perhatianya!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return $this->data;
    }
}
