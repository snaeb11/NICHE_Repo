@extends('emails.layouts.base')

@section('title', 'Form Submission Forwarded | CTET-CTSuL')

@section('header-title', 'Forwarded: Form Submission')

@section('content')
    <div class="greeting">
        Greetings,
    </div>

    <div class="message-content">
        <p class="text-justify">A form submission has been <span style="color: #007bff; font-weight: 600;">forwarded</span> to
            you from the CTET-CTSuL Inventory System for your review and processing.</p>
    </div>

    <div class="info-box">
        <p><strong>Form Type:</strong> {{ $formSubmission->form_type }}</p>
        <p><strong>Submitted by:</strong> {{ $formSubmission->submitter->full_name }}</p>
        <p><strong>Submitted on:</strong> {{ $formSubmission->submitted_at->format('F j, Y \a\t g:i A') }}</p>
        @if (!empty($customMessage))
            <p><strong>Forwarding Message:</strong> {{ $customMessage }}</p>
        @endif
    </div>

    <div class="message-content">
        <p class="text-justify">Please review the form submission at your earliest convenience. You can access the complete
            submission details, including any attached documents, using the link below.</p>
    </div>

    <div class="action-button">
        <a href="{{ route('forms.admin-view', $formSubmission->id) }}">
            View Form Submission
        </a>
    </div>

    <div class="message-content">
        <p><strong>Next Steps:</strong></p>
        <ul style="margin: 15px 0; padding-left: 20px;">
            <li>Review the submitted form and any attachments</li>
            <li>Process according to your department's procedures</li>
            <li>Contact the submitter if additional information is needed</li>
            <li>Update the submission status as appropriate</li>
        </ul>

        <p class="text-justify">If you have any questions about this submission or need technical assistance accessing the
            form, please contact your system administrator.</p>
    </div>
@endsection
