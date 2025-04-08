<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\TourGuide;


class LicenseApproved extends Notification
{
    use Queueable;

    protected $tourGuide;
    
    public function __construct(TourGuide $tourGuide)
    {
        $this->tourGuide = $tourGuide;
    }
    
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }
    
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Your Tour Guide License Has Been Approved')
            ->line('Congratulations! Your tour guide license has been approved.')
            ->line('Please complete your profile information to start using our platform.')
            ->action('Complete Your Profile', route('TourGuide.complete_profile'))
            ->line('Thank you for using our application!');
    }
    
    public function toArray($notifiable)
    {
        return [
            'message' => 'Your tour guide license has been approved. Please complete your profile.',
            'action_url' => route('TourGuide.complete_profile'),
        ];
    }
}
    
