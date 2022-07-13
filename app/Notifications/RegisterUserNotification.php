<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RegisterUserNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $link_active;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($linkActive)
    {
        $this->link_active = $linkActive;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // Xác định template mail đăng ký user
        return (new MailMessage)->subject('Xác nhận đăng ký tài khoản Sạch food')->view(
            'mail.verify-user',
            ['name' => $notifiable->name, 'linkActive' => $this->link_active]
        );
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
            //
        ];
    }
}
