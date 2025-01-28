<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VerifyEmail extends Notification
{
 use Queueable;

 protected $verificationUrl;

 public function __construct($verificationUrl)
 {
     $this->verificationUrl = $verificationUrl;
 }

 public function via($notifiable)
 {
     return ['mail'];
 }

 public function toMail($notifiable)
 {
     return (new MailMessage)
         ->subject('Verify Your Email Address')
         ->line('Thank you for registering!')
         ->action('Verify Email Address', $this->verificationUrl)
         ->line('If you did not create an account, no further action is required.');
 }
}
