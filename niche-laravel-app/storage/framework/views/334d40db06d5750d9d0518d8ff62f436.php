<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <title><?php echo $__env->yieldContent('title'); ?> | <?php echo e(config('app.name', 'Research Niche')); ?> </title>
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap"
            rel="stylesheet">
        <link rel="icon" href="<?php echo e(asset('assets/ctet-logo.png')); ?>" type="image/x-icon">
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    </head>

    <body <?php if(isset($cssClass)): ?> class="<?php echo e($cssClass); ?> flex flex-col min-h-screen" <?php endif; ?>>
        <?php echo $__env->yieldContent('childContent'); ?>

        <?php if (isset($component)) { $__componentOriginalc4f5f9ee3b3060d06f95306d87fd8359 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc4f5f9ee3b3060d06f95306d87fd8359 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.popups.login-successful-m','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('popups.login-successful-m'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc4f5f9ee3b3060d06f95306d87fd8359)): ?>
<?php $attributes = $__attributesOriginalc4f5f9ee3b3060d06f95306d87fd8359; ?>
<?php unset($__attributesOriginalc4f5f9ee3b3060d06f95306d87fd8359); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc4f5f9ee3b3060d06f95306d87fd8359)): ?>
<?php $component = $__componentOriginalc4f5f9ee3b3060d06f95306d87fd8359; ?>
<?php unset($__componentOriginalc4f5f9ee3b3060d06f95306d87fd8359); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginal09e0c8e2bdc0ce58228e205d6577878f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal09e0c8e2bdc0ce58228e205d6577878f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.popups.login-failed-m','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('popups.login-failed-m'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal09e0c8e2bdc0ce58228e205d6577878f)): ?>
<?php $attributes = $__attributesOriginal09e0c8e2bdc0ce58228e205d6577878f; ?>
<?php unset($__attributesOriginal09e0c8e2bdc0ce58228e205d6577878f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal09e0c8e2bdc0ce58228e205d6577878f)): ?>
<?php $component = $__componentOriginal09e0c8e2bdc0ce58228e205d6577878f; ?>
<?php unset($__componentOriginal09e0c8e2bdc0ce58228e205d6577878f); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginala70f5db503f9cf30402259dbc983efbc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala70f5db503f9cf30402259dbc983efbc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.popups.email-verified-m','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('popups.email-verified-m'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala70f5db503f9cf30402259dbc983efbc)): ?>
<?php $attributes = $__attributesOriginala70f5db503f9cf30402259dbc983efbc; ?>
<?php unset($__attributesOriginala70f5db503f9cf30402259dbc983efbc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala70f5db503f9cf30402259dbc983efbc)): ?>
<?php $component = $__componentOriginala70f5db503f9cf30402259dbc983efbc; ?>
<?php unset($__componentOriginala70f5db503f9cf30402259dbc983efbc); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginal9c76d95d89d1a21bc0977891b229b7b4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9c76d95d89d1a21bc0977891b229b7b4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.popups.first-time-user-login','data' => ['message' => session('verification_message')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('popups.first-time-user-login'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['message' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(session('verification_message'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9c76d95d89d1a21bc0977891b229b7b4)): ?>
<?php $attributes = $__attributesOriginal9c76d95d89d1a21bc0977891b229b7b4; ?>
<?php unset($__attributesOriginal9c76d95d89d1a21bc0977891b229b7b4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9c76d95d89d1a21bc0977891b229b7b4)): ?>
<?php $component = $__componentOriginal9c76d95d89d1a21bc0977891b229b7b4; ?>
<?php unset($__componentOriginal9c76d95d89d1a21bc0977891b229b7b4); ?>
<?php endif; ?>

        <?php if(session('showLoginSuccessModal')): ?>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const modal = document.getElementById('login-success-modal');
                    const msgEl = document.getElementById('ls-message');
                    modal.style.display = 'flex';
                    if (msgEl) {
                        msgEl.textContent = <?php echo json_encode(session('login_success_message', 'Login successful.'), 512) ?>;
                    }
                    setTimeout(() => modal.style.display = 'none', 2000);
                });
            </script>
        <?php endif; ?>

        <?php if(session('showLoginFailModal')): ?>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const modal = document.getElementById('login-fail-modal');
                    const msgEl = document.getElementById('lf-message');
                    modal.style.display = 'flex';
                    if (msgEl) {
                        msgEl.textContent = <?php echo json_encode(session('login_fail_message', 'Login failed.'), 512) ?>;
                    }
                    setTimeout(() => modal.style.display = 'none', 3000);
                });
            </script>
        <?php endif; ?>

        <?php if(session('showVerificationModal')): ?>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    let modal = document.getElementById('first-time-user-login-popup');
                    modal.style.display = 'flex';
                });
            </script>
        <?php endif; ?>

        <?php if(session('showForgotPasswordSuccessModal')): ?>
            <?php if (isset($component)) { $__componentOriginal5082062fcd138959b74fae1cd6508016 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5082062fcd138959b74fae1cd6508016 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.popups.forgot-password-success','data' => ['message' => ''.e(session('forgot_password_success_message')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('popups.forgot-password-success'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['message' => ''.e(session('forgot_password_success_message')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5082062fcd138959b74fae1cd6508016)): ?>
<?php $attributes = $__attributesOriginal5082062fcd138959b74fae1cd6508016; ?>
<?php unset($__attributesOriginal5082062fcd138959b74fae1cd6508016); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5082062fcd138959b74fae1cd6508016)): ?>
<?php $component = $__componentOriginal5082062fcd138959b74fae1cd6508016; ?>
<?php unset($__componentOriginal5082062fcd138959b74fae1cd6508016); ?>
<?php endif; ?>
        <?php endif; ?>

        <?php if(session('showForgotPasswordFailModal')): ?>
            <?php if (isset($component)) { $__componentOriginal79eb81de5b55f4756a8e6fd302621454 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal79eb81de5b55f4756a8e6fd302621454 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.popups.forgot-password-fail','data' => ['message' => ''.e(session('forgot_password_fail_message')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('popups.forgot-password-fail'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['message' => ''.e(session('forgot_password_fail_message')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal79eb81de5b55f4756a8e6fd302621454)): ?>
<?php $attributes = $__attributesOriginal79eb81de5b55f4756a8e6fd302621454; ?>
<?php unset($__attributesOriginal79eb81de5b55f4756a8e6fd302621454); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal79eb81de5b55f4756a8e6fd302621454)): ?>
<?php $component = $__componentOriginal79eb81de5b55f4756a8e6fd302621454; ?>
<?php unset($__componentOriginal79eb81de5b55f4756a8e6fd302621454); ?>
<?php endif; ?>
        <?php endif; ?>

        <?php if(session('showResetPasswordSuccessModal')): ?>
            <?php if (isset($component)) { $__componentOriginal6dfa1e9ace84fc360bccc6303a0340f0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6dfa1e9ace84fc360bccc6303a0340f0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.popups.reset-password-success','data' => ['message' => ''.e(session('reset_password_success_message')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('popups.reset-password-success'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['message' => ''.e(session('reset_password_success_message')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6dfa1e9ace84fc360bccc6303a0340f0)): ?>
<?php $attributes = $__attributesOriginal6dfa1e9ace84fc360bccc6303a0340f0; ?>
<?php unset($__attributesOriginal6dfa1e9ace84fc360bccc6303a0340f0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6dfa1e9ace84fc360bccc6303a0340f0)): ?>
<?php $component = $__componentOriginal6dfa1e9ace84fc360bccc6303a0340f0; ?>
<?php unset($__componentOriginal6dfa1e9ace84fc360bccc6303a0340f0); ?>
<?php endif; ?>
        <?php endif; ?>

        <?php if(session('showResetPasswordFailModal')): ?>
            <?php if (isset($component)) { $__componentOriginal0285a24ecdb55d7edd57d04b38d02a94 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0285a24ecdb55d7edd57d04b38d02a94 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.popups.reset-password-fail','data' => ['message' => ''.e(session('reset_password_fail_message')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('popups.reset-password-fail'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['message' => ''.e(session('reset_password_fail_message')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0285a24ecdb55d7edd57d04b38d02a94)): ?>
<?php $attributes = $__attributesOriginal0285a24ecdb55d7edd57d04b38d02a94; ?>
<?php unset($__attributesOriginal0285a24ecdb55d7edd57d04b38d02a94); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0285a24ecdb55d7edd57d04b38d02a94)): ?>
<?php $component = $__componentOriginal0285a24ecdb55d7edd57d04b38d02a94; ?>
<?php unset($__componentOriginal0285a24ecdb55d7edd57d04b38d02a94); ?>
<?php endif; ?>
        <?php endif; ?>

    </body>

</html>
<?php /**PATH /home/vunc/Documents/HR_Repo/HR_Repo/niche-laravel-app/resources/views/layouts/template/base.blade.php ENDPATH**/ ?>