<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Form Submission Forwarded</title>
    </head>

    <body
        style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px;">
        <div style="background-color: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
            <h2 style="color: #1D4ED8; margin: 0;">Form Submission Forwarded to You</h2>
        </div>

        <p>Dear Recipient,</p>

        <p>A form submission has been forwarded to you from the NICHE system.</p>

        <div style="background-color: #f8f9fa; padding: 15px; border-radius: 5px; margin: 20px 0;">
            <p><strong>Form Type:</strong> {{ $formSubmission->form_type }}</p>
            <p><strong>Submitted by:</strong> {{ $formSubmission->submitter->full_name }}</p>
            <p><strong>Submitted on:</strong> {{ $formSubmission->submitted_at->format('F j, Y \a\t g:i A') }}</p>
            @if (!empty($customMessage))
                <p><strong>Message:</strong> {{ $customMessage }}</p>
            @endif
        </div>

        <p>Please review the form submission. You can view and download the attached file by clicking the link below:
        </p>

        <div style="text-align: center; margin: 30px 0;">
            <a href="{{ route('forms.admin-view', $formSubmission->id) }}"
                style="background-color: #1D4ED8; color: white; padding: 12px 24px; text-decoration: none; border-radius: 5px; display: inline-block;">
                View Form Submission
            </a>
        </div>

        <p>Thank you for your attention.</p>

        <hr style="border: none; border-top: 1px solid #eee; margin: 30px 0;">
        <p style="color: #666; font-size: 12px;">
            This email was sent from the NICHE system. Please do not reply to this email.
        </p>
    </body>

</html>
