<?php

namespace App\Notifications;

use App\Models\FacultyFormSubmission;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FormSubmissionApprovedNotification extends Notification
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
            ->subject('Your Form Submission has been Approved')
            ->greeting("Dear {$notifiable->full_name},")
            ->line("Congratulations! Your form submission **{$this->formSubmission->form_type}** has been accepted.")
            ->line('**Submitted on:** ' . $this->formSubmission->submitted_at->format('F j, Y \a\t g:i A'))
            ->line('**Approved on:** ' . $this->formSubmission->reviewed_at->format('F j, Y'))
            ->lineIf($this->formSubmission->review_remarks, "**Remarks:** {$this->formSubmission->review_remarks}")
            ->line('Thank you for your contribution.');
    }
}
