<?php

namespace App\Notifications;

use App\Models\Submission;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SubmissionRejectedNotification extends Notification
{
    use Queueable;

    public function __construct(public Submission $submission) {}

    public function via($notifiable) { return ['mail']; }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Your Thesis Submission has been Rejected')
            ->greeting("Dear {$notifiable->full_name},")
            ->line("Your thesis **{$this->submission->title}** was reviewed and rejected.")
            ->line('**Submitted on:** ' . $this->submission->submitted_at->format('F j, Y \a\t g:i A'))
            ->line('**Rejected on:** ' . $this->submission->reviewed_at->format('F j, Y'))
            ->lineIf($this->submission->remarks, "**Remarks:** {$this->submission->remarks}")
            ->line('Please revise and resubmit if applicable.');
    }
}
