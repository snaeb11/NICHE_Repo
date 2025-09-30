<?php

namespace App\Notifications;

use App\Models\FacultyFormSubmission;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FormSubmissionRejectedNotification extends Notification
{
    use Queueable;

    public function __construct(public FacultyFormSubmission $formSubmission) {}

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return new MailMessage()
            ->subject('Your Form Submission has been Rejected')
            ->greeting("Dear {$notifiable->full_name},")
            ->line("Your form submission **{$this->formSubmission->form_type}** was reviewed and rejected.")
            ->line('**Submitted on:** ' . $this->formSubmission->submitted_at->format('F j, Y \a\t g:i A'))
            ->line('**Rejected on:** ' . $this->formSubmission->reviewed_at->format('F j, Y'))
            ->lineIf($this->formSubmission->review_remarks, "**Remarks:** {$this->formSubmission->review_remarks}")
            ->line('Please revise and resubmit if applicable.');
    }
}
