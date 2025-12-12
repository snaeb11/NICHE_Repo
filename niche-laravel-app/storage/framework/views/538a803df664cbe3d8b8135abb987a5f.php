<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title><?php echo e($title ?? 'My App'); ?></title>
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    </head>

    <body class="bg-[#fdfdfd] text-gray-900">
        <?php if (isset($component)) { $__componentOriginal0bb1da9a47fe5554e58c2f991cab1ca5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0bb1da9a47fe5554e58c2f991cab1ca5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.popups.action-successful-m','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('popups.action-successful-m'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0bb1da9a47fe5554e58c2f991cab1ca5)): ?>
<?php $attributes = $__attributesOriginal0bb1da9a47fe5554e58c2f991cab1ca5; ?>
<?php unset($__attributesOriginal0bb1da9a47fe5554e58c2f991cab1ca5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0bb1da9a47fe5554e58c2f991cab1ca5)): ?>
<?php $component = $__componentOriginal0bb1da9a47fe5554e58c2f991cab1ca5; ?>
<?php unset($__componentOriginal0bb1da9a47fe5554e58c2f991cab1ca5); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginald3b38cb774d92c5f96ee7ebc405bf066 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald3b38cb774d92c5f96ee7ebc405bf066 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.popups.backup-download-successful-m','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('popups.backup-download-successful-m'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald3b38cb774d92c5f96ee7ebc405bf066)): ?>
<?php $attributes = $__attributesOriginald3b38cb774d92c5f96ee7ebc405bf066; ?>
<?php unset($__attributesOriginald3b38cb774d92c5f96ee7ebc405bf066); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald3b38cb774d92c5f96ee7ebc405bf066)): ?>
<?php $component = $__componentOriginald3b38cb774d92c5f96ee7ebc405bf066; ?>
<?php unset($__componentOriginald3b38cb774d92c5f96ee7ebc405bf066); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginal484f53c0d17ca2befde5fe9ead0760f8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal484f53c0d17ca2befde5fe9ead0760f8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.popups.backup-successful-m','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('popups.backup-successful-m'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal484f53c0d17ca2befde5fe9ead0760f8)): ?>
<?php $attributes = $__attributesOriginal484f53c0d17ca2befde5fe9ead0760f8; ?>
<?php unset($__attributesOriginal484f53c0d17ca2befde5fe9ead0760f8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal484f53c0d17ca2befde5fe9ead0760f8)): ?>
<?php $component = $__componentOriginal484f53c0d17ca2befde5fe9ead0760f8; ?>
<?php unset($__componentOriginal484f53c0d17ca2befde5fe9ead0760f8); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginal9986f2b8e704a8e979563aafb0edc933 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9986f2b8e704a8e979563aafb0edc933 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.popups.import-excel-file-m','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('popups.import-excel-file-m'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9986f2b8e704a8e979563aafb0edc933)): ?>
<?php $attributes = $__attributesOriginal9986f2b8e704a8e979563aafb0edc933; ?>
<?php unset($__attributesOriginal9986f2b8e704a8e979563aafb0edc933); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9986f2b8e704a8e979563aafb0edc933)): ?>
<?php $component = $__componentOriginal9986f2b8e704a8e979563aafb0edc933; ?>
<?php unset($__componentOriginal9986f2b8e704a8e979563aafb0edc933); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginal2ac3cbce2afa24f6b3cd4e5151f323a3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2ac3cbce2afa24f6b3cd4e5151f323a3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.popups.export-file-m','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('popups.export-file-m'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2ac3cbce2afa24f6b3cd4e5151f323a3)): ?>
<?php $attributes = $__attributesOriginal2ac3cbce2afa24f6b3cd4e5151f323a3; ?>
<?php unset($__attributesOriginal2ac3cbce2afa24f6b3cd4e5151f323a3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2ac3cbce2afa24f6b3cd4e5151f323a3)): ?>
<?php $component = $__componentOriginal2ac3cbce2afa24f6b3cd4e5151f323a3; ?>
<?php unset($__componentOriginal2ac3cbce2afa24f6b3cd4e5151f323a3); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginal75ec6b19b16c5b8b3a94ec11d8826223 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal75ec6b19b16c5b8b3a94ec11d8826223 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.popups.logout-m','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('popups.logout-m'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal75ec6b19b16c5b8b3a94ec11d8826223)): ?>
<?php $attributes = $__attributesOriginal75ec6b19b16c5b8b3a94ec11d8826223; ?>
<?php unset($__attributesOriginal75ec6b19b16c5b8b3a94ec11d8826223); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal75ec6b19b16c5b8b3a94ec11d8826223)): ?>
<?php $component = $__componentOriginal75ec6b19b16c5b8b3a94ec11d8826223; ?>
<?php unset($__componentOriginal75ec6b19b16c5b8b3a94ec11d8826223); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginal51a7a0392d97dd0aeb4f08de29012a87 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal51a7a0392d97dd0aeb4f08de29012a87 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.popups.upload-thesis-m','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('popups.upload-thesis-m'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal51a7a0392d97dd0aeb4f08de29012a87)): ?>
<?php $attributes = $__attributesOriginal51a7a0392d97dd0aeb4f08de29012a87; ?>
<?php unset($__attributesOriginal51a7a0392d97dd0aeb4f08de29012a87); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal51a7a0392d97dd0aeb4f08de29012a87)): ?>
<?php $component = $__componentOriginal51a7a0392d97dd0aeb4f08de29012a87; ?>
<?php unset($__componentOriginal51a7a0392d97dd0aeb4f08de29012a87); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginal9c76d95d89d1a21bc0977891b229b7b4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9c76d95d89d1a21bc0977891b229b7b4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.popups.first-time-user-login','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('popups.first-time-user-login'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
        <?php if (isset($component)) { $__componentOriginala99586467e2e931c85a556720b7e211f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala99586467e2e931c85a556720b7e211f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.shared.new-sidebar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shared.new-sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala99586467e2e931c85a556720b7e211f)): ?>
<?php $attributes = $__attributesOriginala99586467e2e931c85a556720b7e211f; ?>
<?php unset($__attributesOriginala99586467e2e931c85a556720b7e211f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala99586467e2e931c85a556720b7e211f)): ?>
<?php $component = $__componentOriginala99586467e2e931c85a556720b7e211f; ?>
<?php unset($__componentOriginala99586467e2e931c85a556720b7e211f); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginal65eec4cfaaf8266445a06a66d0824843 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal65eec4cfaaf8266445a06a66d0824843 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.popups.edit-acc','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('popups.edit-acc'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal65eec4cfaaf8266445a06a66d0824843)): ?>
<?php $attributes = $__attributesOriginal65eec4cfaaf8266445a06a66d0824843; ?>
<?php unset($__attributesOriginal65eec4cfaaf8266445a06a66d0824843); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal65eec4cfaaf8266445a06a66d0824843)): ?>
<?php $component = $__componentOriginal65eec4cfaaf8266445a06a66d0824843; ?>
<?php unset($__componentOriginal65eec4cfaaf8266445a06a66d0824843); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginalcd1d0ac65a1fa29f99285bf4c696d7fd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcd1d0ac65a1fa29f99285bf4c696d7fd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.popups.confirm-approval-m','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('popups.confirm-approval-m'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcd1d0ac65a1fa29f99285bf4c696d7fd)): ?>
<?php $attributes = $__attributesOriginalcd1d0ac65a1fa29f99285bf4c696d7fd; ?>
<?php unset($__attributesOriginalcd1d0ac65a1fa29f99285bf4c696d7fd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcd1d0ac65a1fa29f99285bf4c696d7fd)): ?>
<?php $component = $__componentOriginalcd1d0ac65a1fa29f99285bf4c696d7fd; ?>
<?php unset($__componentOriginalcd1d0ac65a1fa29f99285bf4c696d7fd); ?>
<?php endif; ?>
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
        <?php if (isset($component)) { $__componentOriginal5bf1762cfe3912f278184734aee17e2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5bf1762cfe3912f278184734aee17e2c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.popups.email-alr-tkn-m','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('popups.email-alr-tkn-m'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5bf1762cfe3912f278184734aee17e2c)): ?>
<?php $attributes = $__attributesOriginal5bf1762cfe3912f278184734aee17e2c; ?>
<?php unset($__attributesOriginal5bf1762cfe3912f278184734aee17e2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5bf1762cfe3912f278184734aee17e2c)): ?>
<?php $component = $__componentOriginal5bf1762cfe3912f278184734aee17e2c; ?>
<?php unset($__componentOriginal5bf1762cfe3912f278184734aee17e2c); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginalefde8f8afcf1b1b7cac0286d6bde600e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalefde8f8afcf1b1b7cac0286d6bde600e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.popups.email-invalid-m','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('popups.email-invalid-m'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalefde8f8afcf1b1b7cac0286d6bde600e)): ?>
<?php $attributes = $__attributesOriginalefde8f8afcf1b1b7cac0286d6bde600e; ?>
<?php unset($__attributesOriginalefde8f8afcf1b1b7cac0286d6bde600e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalefde8f8afcf1b1b7cac0286d6bde600e)): ?>
<?php $component = $__componentOriginalefde8f8afcf1b1b7cac0286d6bde600e; ?>
<?php unset($__componentOriginalefde8f8afcf1b1b7cac0286d6bde600e); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginal2bd184e76e5d871dbcd5e6665d6eebf8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2bd184e76e5d871dbcd5e6665d6eebf8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.popups.import-restore-file-m','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('popups.import-restore-file-m'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2bd184e76e5d871dbcd5e6665d6eebf8)): ?>
<?php $attributes = $__attributesOriginal2bd184e76e5d871dbcd5e6665d6eebf8; ?>
<?php unset($__attributesOriginal2bd184e76e5d871dbcd5e6665d6eebf8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2bd184e76e5d871dbcd5e6665d6eebf8)): ?>
<?php $component = $__componentOriginal2bd184e76e5d871dbcd5e6665d6eebf8; ?>
<?php unset($__componentOriginal2bd184e76e5d871dbcd5e6665d6eebf8); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginalacd42df548d1006691bbf21061d095ad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalacd42df548d1006691bbf21061d095ad = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.popups.account-creation-successful-m','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('popups.account-creation-successful-m'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalacd42df548d1006691bbf21061d095ad)): ?>
<?php $attributes = $__attributesOriginalacd42df548d1006691bbf21061d095ad; ?>
<?php unset($__attributesOriginalacd42df548d1006691bbf21061d095ad); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalacd42df548d1006691bbf21061d095ad)): ?>
<?php $component = $__componentOriginalacd42df548d1006691bbf21061d095ad; ?>
<?php unset($__componentOriginalacd42df548d1006691bbf21061d095ad); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginala62b9ed30b6366735126925408a9a954 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala62b9ed30b6366735126925408a9a954 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.popups.add-admin-m','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('popups.add-admin-m'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala62b9ed30b6366735126925408a9a954)): ?>
<?php $attributes = $__attributesOriginala62b9ed30b6366735126925408a9a954; ?>
<?php unset($__attributesOriginala62b9ed30b6366735126925408a9a954); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala62b9ed30b6366735126925408a9a954)): ?>
<?php $component = $__componentOriginala62b9ed30b6366735126925408a9a954; ?>
<?php unset($__componentOriginala62b9ed30b6366735126925408a9a954); ?>
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
        <?php if (isset($component)) { $__componentOriginal82bd72a15c4470838955d1a162271cf3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal82bd72a15c4470838955d1a162271cf3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.popups.scan-option-m','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('popups.scan-option-m'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal82bd72a15c4470838955d1a162271cf3)): ?>
<?php $attributes = $__attributesOriginal82bd72a15c4470838955d1a162271cf3; ?>
<?php unset($__attributesOriginal82bd72a15c4470838955d1a162271cf3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal82bd72a15c4470838955d1a162271cf3)): ?>
<?php $component = $__componentOriginal82bd72a15c4470838955d1a162271cf3; ?>
<?php unset($__componentOriginal82bd72a15c4470838955d1a162271cf3); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginald921fd43384731887b9dc31ad95e7a9e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald921fd43384731887b9dc31ad95e7a9e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.popups.image-edit-m','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('popups.image-edit-m'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald921fd43384731887b9dc31ad95e7a9e)): ?>
<?php $attributes = $__attributesOriginald921fd43384731887b9dc31ad95e7a9e; ?>
<?php unset($__attributesOriginald921fd43384731887b9dc31ad95e7a9e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald921fd43384731887b9dc31ad95e7a9e)): ?>
<?php $component = $__componentOriginald921fd43384731887b9dc31ad95e7a9e; ?>
<?php unset($__componentOriginald921fd43384731887b9dc31ad95e7a9e); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginal6d08e1486124a056109e290fccb7b869 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6d08e1486124a056109e290fccb7b869 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.popups.user-add-submission-m','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('popups.user-add-submission-m'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6d08e1486124a056109e290fccb7b869)): ?>
<?php $attributes = $__attributesOriginal6d08e1486124a056109e290fccb7b869; ?>
<?php unset($__attributesOriginal6d08e1486124a056109e290fccb7b869); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6d08e1486124a056109e290fccb7b869)): ?>
<?php $component = $__componentOriginal6d08e1486124a056109e290fccb7b869; ?>
<?php unset($__componentOriginal6d08e1486124a056109e290fccb7b869); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginal87c03e5dd0422760a8303301967af094 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal87c03e5dd0422760a8303301967af094 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.popups.universal-ok-m','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('popups.universal-ok-m'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal87c03e5dd0422760a8303301967af094)): ?>
<?php $attributes = $__attributesOriginal87c03e5dd0422760a8303301967af094; ?>
<?php unset($__attributesOriginal87c03e5dd0422760a8303301967af094); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal87c03e5dd0422760a8303301967af094)): ?>
<?php $component = $__componentOriginal87c03e5dd0422760a8303301967af094; ?>
<?php unset($__componentOriginal87c03e5dd0422760a8303301967af094); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginalf67816c0716388a8e348f48120a4fece = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf67816c0716388a8e348f48120a4fece = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.popups.universal-x-m','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('popups.universal-x-m'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf67816c0716388a8e348f48120a4fece)): ?>
<?php $attributes = $__attributesOriginalf67816c0716388a8e348f48120a4fece; ?>
<?php unset($__attributesOriginalf67816c0716388a8e348f48120a4fece); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf67816c0716388a8e348f48120a4fece)): ?>
<?php $component = $__componentOriginalf67816c0716388a8e348f48120a4fece; ?>
<?php unset($__componentOriginalf67816c0716388a8e348f48120a4fece); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginal0b711f3ed03f49ce3c6af5356c0d6489 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0b711f3ed03f49ce3c6af5356c0d6489 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.popups.admin-first-time-login-change-pass-m','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('popups.admin-first-time-login-change-pass-m'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0b711f3ed03f49ce3c6af5356c0d6489)): ?>
<?php $attributes = $__attributesOriginal0b711f3ed03f49ce3c6af5356c0d6489; ?>
<?php unset($__attributesOriginal0b711f3ed03f49ce3c6af5356c0d6489); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0b711f3ed03f49ce3c6af5356c0d6489)): ?>
<?php $component = $__componentOriginal0b711f3ed03f49ce3c6af5356c0d6489; ?>
<?php unset($__componentOriginal0b711f3ed03f49ce3c6af5356c0d6489); ?>
<?php endif; ?>

        <div class="mt-10 flex justify-center">

            <div class="grid grid-cols-5 gap-4">
                <button id="open1" class="rounded-lg bg-blue-600 px-6 py-3 text-white transition hover:bg-blue-700">
                    edit account // admin
                </button>

                <button id="open2" class="rounded-lg bg-blue-600 px-6 py-3 text-white transition hover:bg-blue-700">
                    backup download
                </button>

                <button id="open3" class="rounded-lg bg-blue-600 px-6 py-3 text-white transition hover:bg-blue-700">
                    backup successful
                </button>

                <button id="open4" class="rounded-lg bg-blue-600 px-6 py-3 text-white transition hover:bg-blue-700">
                    confirm delete account
                </button>

                <button id="open5" class="rounded-lg bg-blue-600 px-6 py-3 text-white transition hover:bg-blue-700">
                    confirm delete request
                </button>

                <button id="open6" class="rounded-lg bg-blue-600 px-6 py-3 text-white transition hover:bg-blue-700">
                    export file
                </button>

                <button id="open7" class="rounded-lg bg-blue-600 px-6 py-3 text-white transition hover:bg-blue-700">
                    import excell file
                </button>

                <button id="open8" class="rounded-lg bg-blue-600 px-6 py-3 text-white transition hover:bg-blue-700">
                    logout
                </button>

                <button id="open9" class="rounded-lg bg-blue-600 px-6 py-3 text-white transition hover:bg-blue-700">
                    upload tite
                </button>

                <button id="open10" class="rounded-lg bg-blue-600 px-6 py-3 text-white transition hover:bg-blue-700">
                    first time login //user
                </button>

                <button id="open11" class="rounded-lg bg-blue-600 px-6 py-3 text-white transition hover:bg-blue-700">
                    forgot password
                </button>

                <button id="open12" class="rounded-lg bg-blue-600 px-6 py-3 text-white transition hover:bg-blue-700">
                    confirm approval
                </button>

                <button id="open13" class="rounded-lg bg-blue-600 px-6 py-3 text-white transition hover:bg-blue-700">
                    login succ
                </button>

                <button id="open14" class="rounded-lg bg-blue-600 px-6 py-3 text-white transition hover:bg-blue-700">
                    login failed
                </button>

                <button id="open15" class="rounded-lg bg-blue-600 px-6 py-3 text-white transition hover:bg-blue-700">
                    email taken
                </button>

                <button id="open16" class="rounded-lg bg-blue-600 px-6 py-3 text-white transition hover:bg-blue-700">
                    email invalid
                </button>

                <button id="open17" class="rounded-lg bg-blue-600 px-6 py-3 text-white transition hover:bg-blue-700">
                    import restore file
                </button>

                <button id="open18" class="rounded-lg bg-blue-600 px-6 py-3 text-white transition hover:bg-blue-700">
                    acc creation succ
                </button>

                <button id="open19" class="rounded-lg bg-blue-600 px-6 py-3 text-white transition hover:bg-blue-700">
                    add admin
                </button>

                <button id="open20" class="rounded-lg bg-blue-600 px-6 py-3 text-white transition hover:bg-blue-700">
                    email verified
                </button>

                <button id="open21" class="rounded-lg bg-blue-600 px-6 py-3 text-white transition hover:bg-blue-700">
                    invalid code
                </button>

                <button id="open22" class="rounded-lg bg-blue-600 px-6 py-3 text-white transition hover:bg-blue-700">
                    scan pop-up
                </button>

                <button id="open23" class="rounded-lg bg-blue-600 px-6 py-3 text-white transition hover:bg-blue-700">
                    iamge scane
                </button>

                <button id="open24" class="rounded-lg bg-blue-600 px-6 py-3 text-white transition hover:bg-blue-700">
                    user-acc-eidt waaaaaa
                </button>

                <button id="open25" class="rounded-lg bg-blue-600 px-6 py-3 text-white transition hover:bg-blue-700">
                    user add submission
                </button>

                <button id="open26" class="rounded-lg bg-blue-600 px-6 py-3 text-white transition hover:bg-blue-700">
                    ok
                </button>

                <button id="open27" class="rounded-lg bg-blue-600 px-6 py-3 text-white transition hover:bg-blue-700">
                    X
                </button>

                 <button id="open28" class="rounded-lg bg-blue-600 px-6 py-3 text-white transition hover:bg-blue-700">
                    admin ftl
                </button>

            </div>
        </div>
    </body>

</html>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const openBtn1 = document.getElementById('open1');
        const popup1 = document.getElementById('edit-account-popup');

        const openBtn2 = document.getElementById('open2');
        const popup2 = document.getElementById('backup-download-popup');

        const openBtn3 = document.getElementById('open3');
        const popup3 = document.getElementById('backup-successful-popup');

        const openBtn4 = document.getElementById('open4');
        const popup4 = document.getElementById('confirm-delete-account-popup');

        const openBtn5 = document.getElementById('open5');
        const popup5 = document.getElementById('confirm-delete-request-popup');

        const openBtn6 = document.getElementById('open6');
        const popup6 = document.getElementById('export-file-popup');

        const openBtn7 = document.getElementById('open7');
        const popup7 = document.getElementById('import-excel-popup');

        const openBtn8 = document.getElementById('open8');
        const popup8 = document.getElementById('logout-popup');

        const openBtn9 = document.getElementById('open9');
        const popup9 = document.getElementById('upload-thesis-popup');

        const openBtn10 = document.getElementById('open10');
        const popup10 = document.getElementById('first-time-user-login-popup');

        const openBtn11 = document.getElementById('open11');
        const popup11 = document.getElementById('forgot-pass-popup');

        const openBtn12 = document.getElementById('open12');
        const popup12 = document.getElementById('confirm-approval-popup');

        const openBtn13 = document.getElementById('open13');
        const popup13 = document.getElementById('login-succ-popup');

        const openBtn14 = document.getElementById('open14');
        const popup14 = document.getElementById('login-failed-popup');

        const openBtn15 = document.getElementById('open15');
        const popup15 = document.getElementById('email-taken-popup');

        const openBtn16 = document.getElementById('open16');
        const popup16 = document.getElementById('email-invalid-popup');

        const openBtn17 = document.getElementById('open17');
        const popup17 = document.getElementById('import-restore-popup');

        const openBtn18 = document.getElementById('open18');
        const popup18 = document.getElementById('account-creation-succ-popup');

        const openBtn19 = document.getElementById('open19');
        const popup19 = document.getElementById('add-admin-popup');

        const openBtn20 = document.getElementById('open20');
        const popup20 = document.getElementById('email-verified-popup');

        const openBtn21 = document.getElementById('open21');
        const popup21 = document.getElementById('error-code-popup');

        const openBtn22 = document.getElementById('open22');
        const popup22 = document.getElementById('scan-option-popup');

        const openBtn23 = document.getElementById('open23');
        const popup23 = document.getElementById('image-edit-popup');

        const openBtn24 = document.getElementById('open24');
        const popup24 = document.getElementById('user-edit-account-popup');

        const openBtn25 = document.getElementById('open25');
        const popup25 = document.getElementById('user-add-submission-popup');

        const openBtn26 = document.getElementById('open26');
        const popup26 = document.getElementById('universal-ok-popup');

        const openBtn27 = document.getElementById('open27');
        const popup27 = document.getElementById('universal-x-popup');

        const openBtn28 = document.getElementById('open28');
        const popup28 = document.getElementById('admin-ftl-changepass');



        openBtn1.addEventListener('click', () => {
            const step1 = document.getElementById('ea-step1');
            const step2 = document.getElementById('ea-step2');

            step1.classList.remove('hidden');
            step2.classList.add('hidden');
            popup1.style.display = 'flex';
        });

        openBtn2.addEventListener('click', () => {
            popup2.style.display = 'flex';
        });

        openBtn3.addEventListener('click', () => {
            popup3.style.display = 'flex';
        });

        openBtn4.addEventListener('click', () => {
            const step1 = document.getElementById('cda-step1');
            const step2 = document.getElementById('cda-step2');

            step1.classList.remove('hidden');
            step2.classList.add('hidden');
            popup4.style.display = 'flex';
        });

        openBtn5.addEventListener('click', () => {
            const step1 = document.getElementById('cdr-step1');
            const step2 = document.getElementById('cdr-step2');

            step1.classList.remove('hidden');
            step2.classList.add('hidden');
            popup5.style.display = 'flex';
        });

        openBtn6.addEventListener('click', () => {
            popup6.style.display = 'flex';
        });

        openBtn7.addEventListener('click', () => {
            const step1 = document.getElementById('ie-step-1');
            const step2 = document.getElementById('ie-step-2');

            step1.classList.remove('hidden');
            step2.classList.add('hidden');
            popup7.style.display = 'flex';
        });

        openBtn8.addEventListener('click', () => {
            popup8.style.display = 'flex';
        });

        openBtn9.addEventListener('click', () => {
            const step1 = document.getElementById('pt-step-1');
            const step2 = document.getElementById('pt-step-2');

            step1.classList.remove('hidden');
            step2.classList.add('hidden');
            popup9.style.display = 'flex';
        });

        openBtn10.addEventListener('click', () => {
            popup10.style.display = 'flex';
        });

        openBtn11.addEventListener('click', () => {
            const step1 = document.getElementById('fp-step1');
            const step2 = document.getElementById('fp-step2');

            step1.classList.remove('hidden');
            step2.classList.add('hidden');
            popup11.style.display = 'flex';
        });

        openBtn12.addEventListener('click', () => {
            popup12.style.display = 'flex';
        });

        openBtn13.addEventListener('click', () => {
            popup13.style.display = 'flex';
        });

        openBtn14.addEventListener('click', () => {
            popup14.style.display = 'flex';
        });

        openBtn15.addEventListener('click', () => {
            popup15.style.display = 'flex';
        });

        openBtn16.addEventListener('click', () => {
            popup16.style.display = 'flex';
        });

        openBtn17.addEventListener('click', () => {
            const step1 = document.getElementById('ir-step-1');
            const step2 = document.getElementById('ir-step-2');

            step1.classList.remove('hidden');
            step2.classList.add('hidden');
            popup17.style.display = 'flex';
        });

        openBtn18.addEventListener('click', () => {
            popup18.style.display = 'flex';
        });

        openBtn19.addEventListener('click', () => {
            popup19.style.display = 'flex';
        });

        openBtn20.addEventListener('click', () => {
            popup20.style.display = 'flex';
        });

        openBtn21.addEventListener('click', () => {
            popup21.style.display = 'flex';
        });

        openBtn22.addEventListener('click', () => {
            popup22.style.display = 'flex';
        });

        openBtn23.addEventListener('click', () => {
            popup23.style.display = 'flex';
        });

        openBtn24.addEventListener('click', () => {
            popup24.style.display = 'flex';
        });

        openBtn25.addEventListener('click', () => {
            popup25.style.display = 'flex';
        });

        openBtn26.addEventListener('click', () => {
            popup26.style.display = 'flex';
        });

        openBtn27.addEventListener('click', () => {
            popup27.style.display = 'flex';
        });

        openBtn28.addEventListener('click', () => {
            popup28.style.display = 'flex';
        });

    });
</script>
<?php /**PATH /home/vunc/Documents/HR_Repo/HR_Repo/niche-laravel-app/resources/views/buttonCheck.blade.php ENDPATH**/ ?>