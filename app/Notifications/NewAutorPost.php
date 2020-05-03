<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewAutorPost extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * 
     * @return void
     */
    
     public $post;

    public function __construct($post)
    {
        $this->post= $post;
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
        return (new MailMessage)
                    ->greeting('Hello','Admin!')
                    ->subject('New Author Post waiting for your Approval  ')  
                    ->line('New post by'.$this->post->user->name.'need to approve')
                    ->line('to approve this post click the view button') 
                    ->line('the post title is:'.$this->post->title)
                    ->action('view post', url(route('admin.post.show',$this->post->id)) )
                    ->line('Thank you for using our application!');
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
