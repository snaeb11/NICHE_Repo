<?php $__env->startSection('title', 'Thesis Approved | CTET-CTSuL'); ?>

<?php $__env->startSection('header-title', 'Thesis Submission Approved'); ?>

<?php $__env->startSection('content'); ?>
    <div class="greeting">
        Dear <?php echo e($user->full_name); ?>,
    </div>

    <div class="message-content">
        <p class="text-justify"><strong>Congratulations!</strong> We are pleased to inform you that your thesis submission
            has been reviewed and
            <span style="color: #28a745; font-weight: 600;">approved</span> for inclusion in the CTET-CTSuL Inventory System.
        </p>
    </div>

    <div class="info-box">
        <p><strong>Thesis Title:</strong> <?php echo e($submission->title); ?></p>
        <p><strong>Submitted on:</strong> <?php echo e($submission->submitted_at->format('F j, Y \a\t g:i A')); ?></p>
        <p><strong>Approved on:</strong> <?php echo e($submission->reviewed_at->format('F j, Y \a\t g:i A')); ?></p>
        <?php if($submission->remarks): ?>
            <p><strong>Reviewer Comments:</strong> <?php echo e($submission->remarks); ?></p>
        <?php endif; ?>
    </div>

    <div class="message-content">
        <p class="text-justify">Your thesis has now been added to the official CTET-CTSuL Inventory System and will be
            available for academic reference and research purposes. This is a significant achievement that contributes to
            the academic knowledge base of the University of Southeastern Philippines.</p>

        <p><strong>What happens next:</strong></p>
        <ul style="margin: 15px 0; padding-left: 20px;">
            <li>Your thesis is now part of the official university repository</li>
            <li>It will be accessible to future researchers and students</li>
        </ul>

        <p class="text-justify">Thank you for your valuable contribution to the academic community and for using the
            CTET-CTSuL Inventory System for your thesis submission.</p>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('emails.layouts.base', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/vunc/Documents/HR_Repo/HR_Repo/niche-laravel-app/resources/views/emails/thesis-approved.blade.php ENDPATH**/ ?>