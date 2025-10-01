<?php

namespace App\Notifications;

use App\Models\FacultyFormSubmission;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FormSubmissionForwardedNotification extends Notification
{
    use Queueable;

    public function __construct(public FacultyFormSubmission $formSubmission, public string $toEmail, public string $message = '') {}

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return new MailMessage()
            ->subject('Your Form Submission has been Forwarded')
            ->greeting("Dear {$notifiable->full_name},")
            ->line("Your form submission **{$this->formSubmission->form_type}** has been forwarded to another recipient.")
            ->line('**Submitted on:** ' . $this->formSubmission->submitted_at->format('F j, Y \a\t g:i A'))
            ->line('**Forwarded on:** ' . $this->formSubmission->reviewed_at->format('F j, Y \a\t g:i A'))
            ->line('**Forwarded to:** ' . $this->toEmail)
            ->lineIf(!empty($this->message), "**Message:** {$this->message}")
            ->line('The recipient has been notified and will review your submission.')
            ->line('Thank you for your contribution.');
    }
}
