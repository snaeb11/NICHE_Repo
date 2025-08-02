<?php

namespace App\Notifications;

use App\Models\Submission;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SubmissionApprovedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(public Submission $submission) {}

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Your Thesis Submission has been Approved')
            ->greeting("Dear {$notifiable->full_name},")
            ->line("Congratulations! Your thesis **{$this->submission->title}** has been accepted.")
            ->line('**Submitted on:** ' . $this->submission->submitted_at->format('F j, Y \a\t g:i A'))
            ->line('**Approved on:** ' . $this->submission->reviewed_at->format('F j, Y'))
            ->lineIf($this->submission->remarks, "**Remarks:** {$this->submission->remarks}")
            ->line('Thank you for your contribution to the Thesis Inventory.');
    }
}