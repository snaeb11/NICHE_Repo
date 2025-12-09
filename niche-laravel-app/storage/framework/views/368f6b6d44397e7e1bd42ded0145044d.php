<?php $__env->startSection('title', 'Email Verification | CTET-CTSuL'); ?>

<?php $__env->startSection('header-title', 'Email Verification'); ?>

<?php $__env->startSection('content'); ?>
    <div class="greeting">
        Dear <?php echo e($user->full_name); ?>,
    </div>

    <div class="message-content">
        <p class="text-justify">Welcome to the CTET-CTSuL Inventory System! To complete your account setup, please verify
            your email address using the 6-digit verification code below:</p>
    </div>

    <div class="verification-code">
        <?php echo e($verificationCode); ?>

    </div>

    <div class="info-box">
        <p><strong>Important Notes:</strong></p>
        <p>• This verification code will expire in <strong>15 minutes</strong></p>
        <p>• Enter this code exactly as shown above</p>
        <p>• If you didn't request this verification, please ignore this email</p>
    </div>

    <div class="message-content">
        <p>Once verified, you'll have full access to submit and manage your thesis documents through the CTET-CTSuL
            Inventory System.</p>
        <p>If you're having trouble with the verification process, please contact your system administrator for assistance.
        </p>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('emails.layouts.base', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/vunc/Documents/HR_Repo/HR_Repo/niche-laravel-app/resources/views/emails/verify-email.blade.php ENDPATH**/ ?>