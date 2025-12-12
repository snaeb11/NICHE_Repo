<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('childContent'); ?>
    <?php if(session('show_admin_pass_reminder')): ?>
        <?php if (isset($component)) { $__componentOriginala32997e5e9e5e70f2b51148863b4699b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala32997e5e9e5e70f2b51148863b4699b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.popups.admin-change-pass-reminder','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('popups.admin-change-pass-reminder'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala32997e5e9e5e70f2b51148863b4699b)): ?>
<?php $attributes = $__attributesOriginala32997e5e9e5e70f2b51148863b4699b; ?>
<?php unset($__attributesOriginala32997e5e9e5e70f2b51148863b4699b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala32997e5e9e5e70f2b51148863b4699b)): ?>
<?php $component = $__componentOriginala32997e5e9e5e70f2b51148863b4699b; ?>
<?php unset($__componentOriginala32997e5e9e5e70f2b51148863b4699b); ?>
<?php endif; ?>
    <?php endif; ?>

    <?php if (isset($component)) { $__componentOriginal1d8378fb0f5cbfb57531d07c30bf72b8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1d8378fb0f5cbfb57531d07c30bf72b8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout-partials.top-gradbar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout-partials.top-gradbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1d8378fb0f5cbfb57531d07c30bf72b8)): ?>
<?php $attributes = $__attributesOriginal1d8378fb0f5cbfb57531d07c30bf72b8; ?>
<?php unset($__attributesOriginal1d8378fb0f5cbfb57531d07c30bf72b8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1d8378fb0f5cbfb57531d07c30bf72b8)): ?>
<?php $component = $__componentOriginal1d8378fb0f5cbfb57531d07c30bf72b8; ?>
<?php unset($__componentOriginal1d8378fb0f5cbfb57531d07c30bf72b8); ?>
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

    <!-- Edit Account Modals -->
    <?php if (isset($component)) { $__componentOriginal65eec4cfaaf8266445a06a66d0824843 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal65eec4cfaaf8266445a06a66d0824843 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.popups.edit-acc','data' => ['user' => $user]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('popups.edit-acc'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['user' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($user)]); ?>
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
    <?php if (isset($component)) { $__componentOriginal855a4587e8e607d3d9f2a81ecd47090e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal855a4587e8e607d3d9f2a81ecd47090e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.popups.edit-admin-perms-m','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('popups.edit-admin-perms-m'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal855a4587e8e607d3d9f2a81ecd47090e)): ?>
<?php $attributes = $__attributesOriginal855a4587e8e607d3d9f2a81ecd47090e; ?>
<?php unset($__attributesOriginal855a4587e8e607d3d9f2a81ecd47090e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal855a4587e8e607d3d9f2a81ecd47090e)): ?>
<?php $component = $__componentOriginal855a4587e8e607d3d9f2a81ecd47090e; ?>
<?php unset($__componentOriginal855a4587e8e607d3d9f2a81ecd47090e); ?>
<?php endif; ?>

    <!-- Submissions Modals -->
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
    <?php if (isset($component)) { $__componentOriginal3754d680210081b938df5aefb003817d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3754d680210081b938df5aefb003817d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.popups.decline-approval-m','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('popups.decline-approval-m'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3754d680210081b938df5aefb003817d)): ?>
<?php $attributes = $__attributesOriginal3754d680210081b938df5aefb003817d; ?>
<?php unset($__attributesOriginal3754d680210081b938df5aefb003817d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3754d680210081b938df5aefb003817d)): ?>
<?php $component = $__componentOriginal3754d680210081b938df5aefb003817d; ?>
<?php unset($__componentOriginal3754d680210081b938df5aefb003817d); ?>
<?php endif; ?>

    <!-- Forms Submissions Modals -->
    <?php if (isset($component)) { $__componentOriginal50f8aaa887828a534e35d09739758ce1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal50f8aaa887828a534e35d09739758ce1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.popups.forms-confirm-approval-m','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('popups.forms-confirm-approval-m'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal50f8aaa887828a534e35d09739758ce1)): ?>
<?php $attributes = $__attributesOriginal50f8aaa887828a534e35d09739758ce1; ?>
<?php unset($__attributesOriginal50f8aaa887828a534e35d09739758ce1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal50f8aaa887828a534e35d09739758ce1)): ?>
<?php $component = $__componentOriginal50f8aaa887828a534e35d09739758ce1; ?>
<?php unset($__componentOriginal50f8aaa887828a534e35d09739758ce1); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal7e519c1f062b29ba844ab4eecc528702 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7e519c1f062b29ba844ab4eecc528702 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.popups.forms-decline-approval-m','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('popups.forms-decline-approval-m'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7e519c1f062b29ba844ab4eecc528702)): ?>
<?php $attributes = $__attributesOriginal7e519c1f062b29ba844ab4eecc528702; ?>
<?php unset($__attributesOriginal7e519c1f062b29ba844ab4eecc528702); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7e519c1f062b29ba844ab4eecc528702)): ?>
<?php $component = $__componentOriginal7e519c1f062b29ba844ab4eecc528702; ?>
<?php unset($__componentOriginal7e519c1f062b29ba844ab4eecc528702); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal901bb7de0925dccf7872a1ec35e98b04 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal901bb7de0925dccf7872a1ec35e98b04 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.popups.forms-forward-m','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('popups.forms-forward-m'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal901bb7de0925dccf7872a1ec35e98b04)): ?>
<?php $attributes = $__attributesOriginal901bb7de0925dccf7872a1ec35e98b04; ?>
<?php unset($__attributesOriginal901bb7de0925dccf7872a1ec35e98b04); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal901bb7de0925dccf7872a1ec35e98b04)): ?>
<?php $component = $__componentOriginal901bb7de0925dccf7872a1ec35e98b04; ?>
<?php unset($__componentOriginal901bb7de0925dccf7872a1ec35e98b04); ?>
<?php endif; ?>

    <!-- Inventory Modals -->
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

    <!-- User Management Modals -->
    <?php if (isset($component)) { $__componentOriginala62b9ed30b6366735126925408a9a954 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala62b9ed30b6366735126925408a9a954 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.popups.add-admin-m','data' => ['user' => $user]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('popups.add-admin-m'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['user' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($user)]); ?>
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

    <!-- Backup Modals -->
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
    <?php if (isset($component)) { $__componentOriginal7b716f72d141b9f9f5a0e3976a5bc919 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7b716f72d141b9f9f5a0e3976a5bc919 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.popups.confirm-textbox-m','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('popups.confirm-textbox-m'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7b716f72d141b9f9f5a0e3976a5bc919)): ?>
<?php $attributes = $__attributesOriginal7b716f72d141b9f9f5a0e3976a5bc919; ?>
<?php unset($__attributesOriginal7b716f72d141b9f9f5a0e3976a5bc919); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7b716f72d141b9f9f5a0e3976a5bc919)): ?>
<?php $component = $__componentOriginal7b716f72d141b9f9f5a0e3976a5bc919; ?>
<?php unset($__componentOriginal7b716f72d141b9f9f5a0e3976a5bc919); ?>
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

    <!-- Logout modal -->
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

    <!-- Fail modal -->
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

    <!-- pages -->
    <?php if (isset($component)) { $__componentOriginal5ae48147d75378fded5ce1d1d396ae0d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5ae48147d75378fded5ce1d1d396ae0d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-pages.inventory-page','data' => ['undergraduate' => $undergraduate,'graduate' => $graduate,'advisers' => $advisers]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-pages.inventory-page'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['undergraduate' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($undergraduate),'graduate' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($graduate),'advisers' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($advisers)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5ae48147d75378fded5ce1d1d396ae0d)): ?>
<?php $attributes = $__attributesOriginal5ae48147d75378fded5ce1d1d396ae0d; ?>
<?php unset($__attributesOriginal5ae48147d75378fded5ce1d1d396ae0d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5ae48147d75378fded5ce1d1d396ae0d)): ?>
<?php $component = $__componentOriginal5ae48147d75378fded5ce1d1d396ae0d; ?>
<?php unset($__componentOriginal5ae48147d75378fded5ce1d1d396ae0d); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal471532a86847c2431de9fa5a40e50121 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal471532a86847c2431de9fa5a40e50121 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-pages.theses-submission-page','data' => ['undergraduate' => $undergraduate,'graduate' => $graduate]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-pages.theses-submission-page'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['undergraduate' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($undergraduate),'graduate' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($graduate)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal471532a86847c2431de9fa5a40e50121)): ?>
<?php $attributes = $__attributesOriginal471532a86847c2431de9fa5a40e50121; ?>
<?php unset($__attributesOriginal471532a86847c2431de9fa5a40e50121); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal471532a86847c2431de9fa5a40e50121)): ?>
<?php $component = $__componentOriginal471532a86847c2431de9fa5a40e50121; ?>
<?php unset($__componentOriginal471532a86847c2431de9fa5a40e50121); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginalc10d721f5d40d35a9389170b874171d5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc10d721f5d40d35a9389170b874171d5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-pages.forms-submission-page','data' => ['undergraduate' => $undergraduate,'graduate' => $graduate]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-pages.forms-submission-page'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['undergraduate' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($undergraduate),'graduate' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($graduate)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc10d721f5d40d35a9389170b874171d5)): ?>
<?php $attributes = $__attributesOriginalc10d721f5d40d35a9389170b874171d5; ?>
<?php unset($__attributesOriginalc10d721f5d40d35a9389170b874171d5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc10d721f5d40d35a9389170b874171d5)): ?>
<?php $component = $__componentOriginalc10d721f5d40d35a9389170b874171d5; ?>
<?php unset($__componentOriginalc10d721f5d40d35a9389170b874171d5); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal2bc9b777dfc183b9db07ef2289d4d018 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2bc9b777dfc183b9db07ef2289d4d018 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-pages.programs-management-page','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-pages.programs-management-page'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2bc9b777dfc183b9db07ef2289d4d018)): ?>
<?php $attributes = $__attributesOriginal2bc9b777dfc183b9db07ef2289d4d018; ?>
<?php unset($__attributesOriginal2bc9b777dfc183b9db07ef2289d4d018); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2bc9b777dfc183b9db07ef2289d4d018)): ?>
<?php $component = $__componentOriginal2bc9b777dfc183b9db07ef2289d4d018; ?>
<?php unset($__componentOriginal2bc9b777dfc183b9db07ef2289d4d018); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal443d4d115728f9f5625f596d77ad7422 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal443d4d115728f9f5625f596d77ad7422 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-pages.advisers-management-page','data' => ['programs' => $programs,'undergraduate' => $undergraduate,'graduate' => $graduate]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-pages.advisers-management-page'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['programs' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($programs),'undergraduate' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($undergraduate),'graduate' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($graduate)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal443d4d115728f9f5625f596d77ad7422)): ?>
<?php $attributes = $__attributesOriginal443d4d115728f9f5625f596d77ad7422; ?>
<?php unset($__attributesOriginal443d4d115728f9f5625f596d77ad7422); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal443d4d115728f9f5625f596d77ad7422)): ?>
<?php $component = $__componentOriginal443d4d115728f9f5625f596d77ad7422; ?>
<?php unset($__componentOriginal443d4d115728f9f5625f596d77ad7422); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal1e89e5d78d90a2be6a7227613f3eca59 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1e89e5d78d90a2be6a7227613f3eca59 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-pages.downloadable-forms-management-page','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-pages.downloadable-forms-management-page'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1e89e5d78d90a2be6a7227613f3eca59)): ?>
<?php $attributes = $__attributesOriginal1e89e5d78d90a2be6a7227613f3eca59; ?>
<?php unset($__attributesOriginal1e89e5d78d90a2be6a7227613f3eca59); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1e89e5d78d90a2be6a7227613f3eca59)): ?>
<?php $component = $__componentOriginal1e89e5d78d90a2be6a7227613f3eca59; ?>
<?php unset($__componentOriginal1e89e5d78d90a2be6a7227613f3eca59); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal93d0ea608293761dec82a50f453ebc90 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal93d0ea608293761dec82a50f453ebc90 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-pages.user-page','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-pages.user-page'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal93d0ea608293761dec82a50f453ebc90)): ?>
<?php $attributes = $__attributesOriginal93d0ea608293761dec82a50f453ebc90; ?>
<?php unset($__attributesOriginal93d0ea608293761dec82a50f453ebc90); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal93d0ea608293761dec82a50f453ebc90)): ?>
<?php $component = $__componentOriginal93d0ea608293761dec82a50f453ebc90; ?>
<?php unset($__componentOriginal93d0ea608293761dec82a50f453ebc90); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal0a41afc4efcaa1e59aa65c36e4aaf9c7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0a41afc4efcaa1e59aa65c36e4aaf9c7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-pages.logs-page','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-pages.logs-page'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0a41afc4efcaa1e59aa65c36e4aaf9c7)): ?>
<?php $attributes = $__attributesOriginal0a41afc4efcaa1e59aa65c36e4aaf9c7; ?>
<?php unset($__attributesOriginal0a41afc4efcaa1e59aa65c36e4aaf9c7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0a41afc4efcaa1e59aa65c36e4aaf9c7)): ?>
<?php $component = $__componentOriginal0a41afc4efcaa1e59aa65c36e4aaf9c7; ?>
<?php unset($__componentOriginal0a41afc4efcaa1e59aa65c36e4aaf9c7); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal791e640f01045becb2de1a2f9522a77f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal791e640f01045becb2de1a2f9522a77f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-pages.backup-page','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-pages.backup-page'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal791e640f01045becb2de1a2f9522a77f)): ?>
<?php $attributes = $__attributesOriginal791e640f01045becb2de1a2f9522a77f; ?>
<?php unset($__attributesOriginal791e640f01045becb2de1a2f9522a77f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal791e640f01045becb2de1a2f9522a77f)): ?>
<?php $component = $__componentOriginal791e640f01045becb2de1a2f9522a77f; ?>
<?php unset($__componentOriginal791e640f01045becb2de1a2f9522a77f); ?>
<?php endif; ?>

    <script>
        //for data summoning
        document.addEventListener("DOMContentLoaded", () => {
            function generateRows(count, generatorFn) {
                return Array.from({
                    length: count
                }, () => generatorFn()).join("");
            }

            function randomName() {
                const fn = ["Juan", "Maria", "Pedro", "Ana", "Jose", "Kyla"];
                const ln = ["Santos", "Reyes", "Dela Cruz", "Garcia", "Lopez", "Torres"];
                return `${fn[Math.floor(Math.random() * fn.length)]} ${ln[Math.floor(Math.random() * ln.length)]}`;
            }

            function randomProgram() {
                return ["BSIT", "BSCS", "BSCpE"][Math.floor(Math.random() * 3)];
            }

            function randomYear() {
                return 2021 + Math.floor(Math.random() * 4);
            }

            function randomDate() {
                const d = new Date(2021 + Math.floor(Math.random() * 4), Math.floor(Math.random() * 12), Math.floor(
                    Math.random() * 28) + 1, 9, 30);
                return d.toLocaleString("en-US", {
                    month: "long",
                    day: "2-digit",
                    year: "numeric",
                    hour: "2-digit",
                    minute: "2-digit"
                });
            }

            // Logs table - fetch real data
            // NOTE: Logs are now managed by logs-page.blade.php component
            // This function is kept for backward compatibility but auto-refresh is disabled
            // to prevent flicker. The logs-page component handles its own auto-refresh.
            async function fetchLogsData() {
                // Delegate to logs-page component if it exists
                if (window.reloadLogs) {
                    window.reloadLogs();
                    return;
                }

                const tbody = document.getElementById('logs-table-body');
                if (!tbody) return;

                try {
                    const res = await fetch('/logs/data?ts=' + Date.now(), {
                        method: 'GET',
                        credentials: 'same-origin',
                        headers: {
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest',
                            'Cache-Control': 'no-store'
                        },
                        cache: 'no-store'
                    });
                    if (!res.ok) throw new Error(`HTTP ${res.status}`);
                    const data = await res.json();

                    tbody.innerHTML = '';
                    if (!Array.isArray(data) || data.length === 0) {
                        tbody.innerHTML = `
                            <tr>
                                <td colspan="5" class="text-center py-4 text-gray-500 italic">No logs found.</td>
                            </tr>`;
                        return;
                    }

                    data.forEach(item => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td class="px-6 py-4 whitespace-nowrap">${item.name || '—'}</td>
                            <td class="px-6 py-4 whitespace-nowrap">${item.action || '—'}</td>
                            <td class="px-6 py-4 whitespace-nowrap">${item.target_table || '—'}</td>
                            <td class="px-6 py-4 whitespace-nowrap">${item.target_id || '—'}</td>
                            <td class="px-6 py-4 whitespace-nowrap">${formatDate(item.performed_at)}</td>
                        `;
                        tbody.appendChild(tr);
                    });

                    showPage('logs', 1);
                } catch (e) {
                    console.error('Failed to load logs:', e);
                }
            }

            // Initial load - logs-page component will handle its own loading
            // fetchLogsData();

            // Auto-refresh disabled - logs-page component handles its own auto-refresh
            // to prevent flicker and maintain consistent styling
            // setInterval(() => {
            //     const logsSection = document.getElementById('logs-table');
            //     if (!logsSection) return;
            //     const isVisible = !logsSection.classList.contains('hidden');
            //     if (isVisible) {
            //         fetchLogsData();
            //     }
            // }, 3000); // refresh every 3s when visible

            // Re-show correct page
            ['submission', 'inventory', 'users', 'logs', 'backup'].forEach(key => showPage(key, 1));
        });
        //for data summoning
        document.addEventListener('DOMContentLoaded', () => {
            const tabs = [{
                    baseId: 'submission',
                    sectionId: 'submission-table'
                },
                // map new thesis/forms tabs to submissions section
                {
                    baseId: 'thesis-submissions',
                    sectionId: 'submission-table'
                },
                {
                    baseId: 'forms-submissions',
                    sectionId: 'forms-submission-table'
                },
                {
                    baseId: 'inventory',
                    sectionId: 'inventory-table'
                },
                {
                    baseId: 'users',
                    sectionId: 'users-table'
                },
                {
                    baseId: 'logs',
                    sectionId: 'logs-table'
                },
                {
                    baseId: 'backup',
                    sectionId: 'backup-table'
                }
            ];

            const showSection = (idToShow) => {
                tabs.forEach(({
                    sectionId
                }) => {
                    const section = document.getElementById(sectionId);
                    if (section) {
                        section.classList.toggle('hidden', sectionId !== idToShow);
                    }
                });

                const key = idToShow.replace('-table', '');
                if (document.getElementById(`${key}-table-body`)) {
                    showPage(key, 1);
                }
            };

            tabs.forEach(({
                baseId,
                sectionId
            }) => {
                // Add event listeners for both desktop and mobile buttons
                const buttonVariants = [
                    document.getElementById(`${baseId}-tab`),
                    document.getElementById(`${baseId}-tab-mobile`)
                ];

                buttonVariants.forEach(btn => {
                    if (btn) {
                        btn.addEventListener('click', (e) => {
                            e.preventDefault();
                            showSection(sectionId);
                        });
                    }
                });
            });

            showSection('submission-table');
        });
    </script>
    <script>
        window.user = {
            name: "<?php echo e(Auth::user()->decrypted_first_name); ?> <?php echo e(Auth::user()->decrypted_last_name); ?>",
            first_name: "<?php echo e(Auth::user()->decrypted_first_name); ?>",
            last_name: "<?php echo e(Auth::user()->decrypted_last_name); ?>",
            email: "<?php echo e(Auth::user()->email); ?>",
            type: "<?php echo e(Auth::user()->account_type === 'super_admin'
                ? 'Super Admin'
                : (Auth::user()->account_type === 'admin'
                    ? 'Admin'
                    : Auth::user()->account_type)); ?>"
        };

        //side bar
        const usernameBtn = document.querySelector('.edit-admin');
        const usernameBtns = document.querySelectorAll('.edit-admin');
        const editAccountPopup = document.getElementById('edit-account-popup');

        usernameBtns.forEach(usernameBtn => {
            usernameBtn.addEventListener('click', () => {
                const step1 = document.getElementById('aea-step1');
                const editAccountPopup = document.getElementById(
                    'edit-account-popup');

                step1.classList.remove('hidden');
                editAccountPopup.style.display = 'flex';

                document.getElementById('first-name').value = window.user.first_name || '';
                document.getElementById('last-name').value = window.user.last_name || '';
                document.getElementById('usep-email').value = window.user.email || '';

                // Clear password fields
                document.getElementById('new-password').value = '';
                document.getElementById('confirm-password').value = '';
                document.getElementById('current-password').value = '';
            });
        });

        //sidebar name
        if (window.user) {
            document.querySelectorAll('.username-admin').forEach(nameEl => {
                const titleEl = nameEl.nextElementSibling;

                if (nameEl) nameEl.textContent = window.user.name;
                if (titleEl) titleEl.textContent = window.user.type;
            });
        }

        function sortTable(header) {
            const table = header.closest("table");
            const tbody = table.querySelector("tbody");
            const rows = Array.from(tbody.querySelectorAll("tr"));
            const colIndex = [...header.parentNode.children].indexOf(header);
            const currentOrder = header.getAttribute("data-order") || "asc";
            const newOrder = currentOrder === "asc" ? "desc" : "asc";
            header.setAttribute("data-order", newOrder);

            const normalize = (str) =>
                str.toLowerCase()
                .replace(/[^a-z]/g, '')
                .replace(/grad(ua|uae)?t(e|)/, 'graduate')
                .replace(/undergrad(uate)?/, 'undergrad');

            rows.sort((a, b) => {
                const aText = a.children[colIndex]?.textContent.trim() || '';
                const bText = b.children[colIndex]?.textContent.trim() || '';

                const aDate = Date.parse(aText);
                const bDate = Date.parse(bText);

                if (!isNaN(aDate) && !isNaN(bDate)) {
                    return newOrder === "asc" ? aDate - bDate : bDate - aDate;
                }

                if (!isNaN(aText) && !isNaN(bText)) {
                    return newOrder === "asc" ? parseFloat(aText) - parseFloat(bText) : parseFloat(bText) -
                        parseFloat(aText);
                }

                const aNorm = normalize(aText);
                const bNorm = normalize(bText);
                return newOrder === "asc" ? aNorm.localeCompare(bNorm) : bNorm.localeCompare(aNorm);
            });

            tbody.innerHTML = '';
            rows.forEach(row => tbody.appendChild(row));

            const tableKey = tbody.id.replace('-table-body', '');
            showPage(tableKey, 1);
        }

        const rowsPerPage = 18;
        const currentPages = {};

        function showPage(tableKey, page) {
            const tbody = document.getElementById(`${tableKey}-table-body`);
            const rows = tbody?.querySelectorAll('tr') || [];
            const totalPages = Math.ceil(rows.length / rowsPerPage);
            if (page < 1) page = 1;
            if (page > totalPages) page = totalPages;
            currentPages[tableKey] = page;

            rows.forEach((row, i) => {
                row.style.display = (i >= (page - 1) * rowsPerPage && i < page * rowsPerPage) ? '' : 'none';
            });

            const info = document.getElementById(`pagination-info-${tableKey}`);
            if (info) info.textContent = `Page ${page} of ${totalPages}`;
        }

        function changePage(tableKey, offset) {
            const current = currentPages[tableKey] || 1;
            showPage(tableKey, current + offset);
        }

        document.addEventListener('DOMContentLoaded', () => {
            const logoutBtns = document.querySelectorAll('.logout-btn');
            const logoutPopup = document.getElementById('logout-popup');

            console.log('Logout buttons found:', logoutBtns.length);

            logoutBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    logoutPopup.style.display = 'flex';
                });
            });
        });

        // DOM Ready
        document.addEventListener('DOMContentLoaded', () => {

            let inventoryLoaded = false;
            let submissionLoaded = false;
            let usersLoaded = false;
            let historyLoaded = false;

            const allTabs = ['submission-table', 'forms-submission-table', 'inventory-table', 'users-table',
                'logs-table', 'backup-table',
                'history-table', 'forms-history-table', 'add-inventory-page', 'edit-inventory-page',
                'programs-management-page', 'advisers-management-page', 'downloadable-forms-management-page'
            ];

            function showOnly(idToShow) {
                localStorage.setItem('admin-active-tab', idToShow);
                allTabs.forEach(id => {
                    const section = document.getElementById(id);
                    if (section) section.classList.toggle('hidden', id !== idToShow);
                });

                // Pagination for every table
                const key = idToShow.replace('-table', '');
                if (document.getElementById(`${key}-table-body`)) {
                    showPage(key, 1);
                }

                // Immediately refresh logs when switching to logs tab
                if (idToShow === 'logs-table') {
                    try {
                        fetchLogsData && fetchLogsData();
                    } catch (e) {}
                    try {
                        window.reloadLogs && window.reloadLogs();
                    } catch (e) {}
                }

                // Populate Inventory only the first time it is opened
                if (idToShow === 'inventory-table' && !inventoryLoaded) {
                    fetchInventoryData();
                    inventoryLoaded = true;
                }

                if (idToShow === 'submission-table' && !submissionLoaded) {
                    fetchSubmissionData();
                    submissionLoaded = true;
                }

                if (idToShow === 'users-table' && !usersLoaded) {
                    fetchUserData();
                    usersLoaded = true;
                }

                if (idToShow === 'history-table' && !historyLoaded) {
                    fetchHistoryData();
                    historyLoaded = true;
                }
            }


            // Sidebar Tab Buttons
            const tabs = [{
                    buttonId: 'submission-tab',
                    sectionId: 'submission-table'
                },
                // theses/forms tabs
                {
                    buttonId: 'thesis-submissions-tab',
                    sectionId: 'submission-table'
                },
                {
                    buttonId: 'thesis-submissions-tab-mobile',
                    sectionId: 'submission-table'
                },
                {
                    buttonId: 'forms-submissions-tab',
                    sectionId: 'forms-submission-table'
                },
                {
                    buttonId: 'forms-submissions-tab-mobile',
                    sectionId: 'forms-submission-table'
                },
                {
                    buttonId: 'inventory-tab',
                    sectionId: 'inventory-table'
                },
                // programs/advisers map to management pages
                {
                    buttonId: 'programs-list-tab',
                    sectionId: 'programs-management-page'
                },
                {
                    buttonId: 'advisers-list-tab',
                    sectionId: 'advisers-management-page'
                },
                {
                    buttonId: 'programs-list-tab-mobile',
                    sectionId: 'programs-management-page'
                },
                {
                    buttonId: 'advisers-list-tab-mobile',
                    sectionId: 'advisers-management-page'
                },
                {
                    buttonId: 'downloadable-forms-tab',
                    sectionId: 'downloadable-forms-management-page'
                },
                {
                    buttonId: 'downloadable-forms-tab-mobile',
                    sectionId: 'downloadable-forms-management-page'
                },
                {
                    buttonId: 'users-tab',
                    sectionId: 'users-table'
                },
                {
                    buttonId: 'logs-tab',
                    sectionId: 'logs-table'
                },
                {
                    buttonId: 'backup-tab',
                    sectionId: 'backup-table'
                }
            ];

            tabs.forEach(({
                buttonId,
                sectionId
            }) => {
                const btn = document.getElementById(buttonId);
                if (btn) {
                    btn.addEventListener('click', (e) => {
                        e.preventDefault();
                        showOnly(sectionId);
                    });
                }
            });

            // Show default on load
            const savedTab = localStorage.getItem('admin-active-tab') || 'submission-table';
            showOnly(savedTab);

            // History tab logic
            const historyBtn = document.getElementById('history-btn');
            if (historyBtn) {
                historyBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    showOnly('history-table');
                });
            }
            const formsHistoryBtn = document.getElementById('forms-history-btn');
            if (formsHistoryBtn) {
                formsHistoryBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    showOnly('forms-history-table');
                });
            }

            // Forms History: All button -> back to Forms Submissions table
            const formsPendingBtn = document.getElementById('forms-pending-btn');
            if (formsPendingBtn) {
                formsPendingBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    showOnly('forms-submission-table');
                });
            }

            // add inventory btn
            const addInventoryBtn = document.getElementById('add-inventory-btn');
            if (addInventoryBtn) {
                addInventoryBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    showOnly('add-inventory-page')
                });
            }

            const addInvSubmitBtn = document.getElementById('submit-inventory');
            if (addInvSubmitBtn) {
                addInvSubmitBtn.addEventListener('click', (e) => {
                    showOnly('inventory-table')
                });
            }


            //back to inventory
            document.querySelectorAll('.backto-inventory-btn').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.preventDefault();
                    showOnly('inventory-table');
                });
            });

            //pending switch
            const pendingBtn = document.getElementById('pending-btn');
            if (pendingBtn) {
                pendingBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    showOnly('submission-table');
                });
            }

            //side bar
            const usernameBtn = document.querySelector('.username-admin');
            const editAccountPopup = document.getElementById('edit-account-popup');

            usernameBtn.addEventListener('click', () => {
                const step1 = document.getElementById('ea-step1');
                const step2 = document.getElementById('ea-step2');

                step1.classList.remove('hidden');
                step2.classList.add('hidden');
                editAccountPopup.style.display = 'flex';
            });
            //Submission buttons
            //approve
            const approvePopup = document.getElementById('confirm-approval-popup');

            document.querySelectorAll('.approve-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    step1.classList.remove('hidden');
                    step2.classList.add('hidden');
                    approvePopup.style.display = 'flex';
                });
            });


            //decline
            const declinePopup = document.getElementById('confirm-rejection-popup');

            document.querySelectorAll('.decline-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    step1.classList.remove('hidden');
                    step2.classList.add('hidden');
                    declinePopup.style.display = 'flex';
                });
            });

            //Submission==============================================================================================

            console.log('All status selects:', document.querySelectorAll('select[name="subs-dd-status"]'))
            const programSelectSubs = document.querySelector('select[name="subs-dd-program"]');
            const statusSelect = document.querySelector('select[name="subs-dd-status"]');
            const searchInput = document.getElementById('submission-search');

            searchInput.addEventListener('input', fetchSubmissionData);
            programSelectSubs.addEventListener('change', fetchSubmissionData);
            statusSelect.addEventListener('change', fetchSubmissionData);

            fetchSubmissionData()

            //populate subs tabke
            function fetchSubmissionData() {
                const program = document.querySelector('select[name="subs-dd-program"]').value;
                const status = document.querySelector('select[name="subs-dd-status"]').value;
                const search = document.getElementById('submission-search').value;

                const params = new URLSearchParams({
                    program,
                    status,
                    search
                });

                fetch(`/submission/data?${params.toString()}`)
                    .then(res => res.json())
                    .then(data => {
                        const tbody = document.getElementById('submission-table-body');
                        if (!tbody) return;
                        tbody.innerHTML = ''; // Clear previous rows

                        if (data.length === 0) {
                            const noDataRow = document.createElement('tr');
                            noDataRow.innerHTML = `
                                <td colspan="9" class="text-center py-4 text-gray-500 italic">
                                    No matching results found.
                                </td>
                            `;
                            tbody.appendChild(noDataRow);
                            return;
                        }

                        data.forEach((item, idx) => {
                            const rowColor = idx % 2 === 0 ? 'bg-[#fdfdfd]' : 'bg-orange-50';
                            const abstractRowId = `submission-abstract-row-${idx}`;
                            const toggleBtnId = `submission-toggle-btn-${idx}`;

                            // Main row
                            const row = document.createElement('tr');
                            const color = {
                                accepted: 'bg-green-100 text-green-800',
                                pending: 'bg-yellow-100 text-yellow-800',
                                rejected: 'bg-red-100   text-red-800',
                            } [item.status.toLowerCase()] || 'bg-gray-100 text-gray-800';

                            const manuscriptHtml = item.manuscript_filename ? `
                                <td class="px-6 py-4 whitespace-nowrap min-w-[200px] max-w-[300px]">
                                    <div class="flex items-center gap-2">
                                        <button type="button"
                                            class="preview-btn text-[#9D3E3E] hover:underline text-sm font-bold"
                                            data-url="/submissions/${item.id}/view"
                                            data-filename="${item.manuscript_filename}">
                                            <svg class="w-4 h-4 mr-1 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            Preview
                                        </button>
                                        <span class="text-gray-400">|</span>
                                        <a href="/submissions/${item.id}/download" class="flex items-center font-semibold text-sm text-[#9D3E3E] hover:underline truncate">
                                            <svg class="w-4 h-4 mr-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                            </svg>
                                            <span class="truncate" title="${item.manuscript_filename}">${item.manuscript_filename}</span>
                                        </a>
                                    </div>
                                </td>
                            ` : `
                                <td class="px-6 py-4 whitespace-nowrap min-w-[200px]">
                                    <div class="flex items-center justify-center text-gray-500">No manuscript uploaded</div>
                                </td>
                            `;

                            const statusColumn =
                                `<td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${color} capitalize">
                                        ${item.status}
                                    </span>
                                </td>`;
                            let actionButtons = '';
                            if (item.status === 'Pending') {
                                actionButtons = `
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <button class="text-green-600 hover:underline approve-btn" data-id="${item.id}">Approve</button>
                                            <button class="text-red-600 hover:underline ml-2 decline-btn" data-id="${item.id}">Decline</button>
                                        </td>
                                    `;
                            } else {
                                actionButtons = `
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="text-gray-500">—</span>
                                        </td>
                                    `;
                            }
                            row.innerHTML = `
                                <td class="px-6 py-4 text-justify min-w-[300px] max-w-[350px]">${item.title || 'No title'}</td>
                                <td class="px-6 py-4 min-w-[230px] max-w-[280px]">
                                    ${item.authors
                                        ? item.authors.split(',').map(author =>
                                            `<div class="block truncate" title="${author.trim()}">${author.trim()}</div>`
                                        ).join('')
                                        : 'No authors'
                                    }
                                </td>
                                <td class="items-center px-4 py-2">
                                    <button type="button"
                                            id="${toggleBtnId}"
                                            class="flex items-center font-semibold text-sm text-[#9D3E3E] hover:underline cursor-pointer"
                                            onclick="toggleAbstract('${abstractRowId}', '${toggleBtnId}')">
                                        View Abstract
                                    </button>
                                </td>
                                ${manuscriptHtml}
                                <td class="px-6 py-4 whitespace-nowrap">${item.adviser}</td>
                                <td class="px-6 py-4">${item.program || ''}</td>
                                <td class="px-6 py-4 whitespace-nowrap">${new Date(item.submitted_at).getFullYear()}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    ${item.submitted_by ?? '—'}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">${formatDate(item.submitted_at)}</td>
                                ${statusColumn}
                                <?php if(auth()->user() &&
                                        (auth()->user()->hasPermission('acc-rej-thesis-submissions') ||
                                            auth()->user()->hasPermission('acc-rej-submissions'))): ?>
                                    ${actionButtons}
                                <?php endif; ?>
                            `;
                            tbody.appendChild(row);

                            // Abstract row
                            const abstractRow = document.createElement('tr');
                            abstractRow.id = abstractRowId;
                            abstractRow.className = 'hidden';
                            abstractRow.innerHTML = `
                                <td colspan="11" class="min-w-[20vw] max-w-[20vw] px-6 py-3 text-base text-gray-700 bg-gray-50 ${rowColor}">
                                    <div class="break-words overflow-wrap-break-word text-justify"> ${item.abstract} </div>
                                </td>
                            `;
                            tbody.appendChild(abstractRow);

                            tbody.addEventListener('click', e => {
                                const btn = e.target;
                                const id = btn.dataset.id;
                                document.getElementById('submission-id-holder').value = id;

                                if (!btn.classList.contains('approve-btn') && !btn.classList
                                    .contains('decline-btn')) {
                                    return;
                                }

                                const step1 = document.getElementById(btn.classList.contains(
                                    'approve-btn') ? 'ca-step1' : 'cr-step1');
                                const step2 = document.getElementById(btn.classList.contains(
                                    'approve-btn') ? 'ca-step2' : 'cr-step2');

                                if (step1 && step2) {
                                    step1.classList.remove('hidden');
                                    step2.classList.add('hidden');
                                }

                                const popup = document.getElementById(btn.classList.contains(
                                        'approve-btn') ? 'confirm-approval-popup' :
                                    'confirm-rejection-popup');
                                if (popup) popup.style.display = 'flex';
                            });
                        });

                        showPage('submission', 1);
                    })
                    .catch(err => {
                        console.error('Failed to fetch submission data:', err);
                    });
            }


            document.addEventListener('click', e => {
                const btn = e.target.closest('.preview-btn');
                if (!btn) return;

                const url = btn.dataset.url;
                const pdfPreviewModal = document.getElementById('pdf-preview-modal');
                const pdfPreviewIframe = document.getElementById('pdf-preview-iframe');
                const closePreviewModal = document.getElementById('close-preview-modal');
                const filenamePrev = btn.dataset.filename || 'Document Preview';
                const filenameFrame = document.getElementById('pdf-prev-fn');

                // Set the iframe source to the PDF URL
                pdfPreviewIframe.src = url;

                if (filenamePrev) {
                    filenameFrame.textContent = filenamePrev;
                }

                // Show the modal
                pdfPreviewModal.classList.remove('hidden');
                pdfPreviewModal.classList.add('flex');

                closePreviewModal.addEventListener('click', () => {
                    pdfPreviewModal.classList.add('hidden');
                    pdfPreviewModal.classList.remove('flex');
                    pdfPreviewIframe.src = '';
                });
            });


            const programSelectHistory = document.querySelector('select[name="history-dd-program"]');
            const yearSelectHistory = document.querySelector('select[name="history-dd-academic_year"]');

            if (programSelectHistory) {
                programSelectHistory.addEventListener('change', fetchHistoryData);
            }

            if (yearSelectHistory) {
                yearSelectHistory.addEventListener('change', fetchHistoryData);
            }

            fetchHistoryData()

            function fetchHistoryData() {
                const program = document.querySelector('select[name="history-dd-program"]').value;
                const params = new URLSearchParams({
                    program
                });
                fetch(`/submission/history?${params.toString()}`)
                    .then(res => res.json())
                    .then(data => {
                        const tbody = document.getElementById('history-table-body');
                        if (!tbody) return;
                        tbody.innerHTML = '';

                        if (data.length === 0) {
                            tbody.innerHTML = `
                                <tr>
                                    <td colspan="12" class="text-center py-4 text-gray-500 italic">
                                        No history entries found.
                                    </td>
                                </tr>`;
                            return;
                        }

                        data.forEach((item, idx) => {
                            const rowColor = idx % 2 === 0 ? 'bg-[#fdfdfd]' : 'bg-orange-50';
                            const abstractRowId = `history-abstract-row-${idx}`;
                            const toggleBtnId = `history-toggle-btn-${idx}`;
                            const remarksRowId = `history-remarks-row-${idx}`;
                            const remarksBtnId = `history-remarks-btn-${idx}`;

                            const row = document.createElement('tr');
                            row.className = rowColor;
                            row.innerHTML = `
                                <td class="px-6 py-4 text-justify min-w-[300px] max-w-[350px]">${item.title || 'No title'}</td>
                                <td class="px-6 py-4 min-w-[230px] max-w-[280px]">
                                    ${item.authors
                                        ? item.authors.split(',').map(author =>
                                            `<div class="block truncate" title="${author.trim()}">${author.trim()}</div>`
                                        ).join('')
                                        : 'No authors'
                                    }
                                </td>
                                <td class="items-center px-4 py-2">
                                    <button type="button"
                                            id="${toggleBtnId}"
                                            class="flex items-center font-semibold text-sm text-[#9D3E3E] hover:underline cursor-pointer"
                                            onclick="toggleAbstract('${abstractRowId}', '${toggleBtnId}')">
                                        View Abstract
                                    </button>
                                </td>
                                <td class="px-6 py-4">${item.adviser}</td>
                                <td class="px-6 py-4">${item.program || ''}</td>
                                <td class="px-6 py-4">${item.submitted_by}</td>
                                <td class="px-6 py-4">${formatDate(item.submitted_at)}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                        ${({accepted:'bg-green-100 text-green-800',
                                            pending :'bg-yellow-100 text-yellow-800',
                                            rejected:'bg-red-100   text-red-800'
                                        }[item.status.toLowerCase()] || 'bg-gray-100 text-gray-800')} capitalize">
                                        ${item.status}
                                    </span>
                                </td>
                                <td class="px-6 py-4">${item.reviewed_by}</td>
                                <td class="items-center px-4 py-2">
                                    ${item.remarks && item.remarks.trim() !== ''
                                        ? `<button type="button"
                                                                                                                        id="${remarksBtnId}"
                                                                                                                        class="flex items-center font-semibold text-sm text-[#9D3E3E] hover:underline cursor-pointer"
                                                                                                                        onclick="toggleRemarks('${remarksRowId}', '${remarksBtnId}')">View Remarks</button>`
                                        : '<span class="text-gray-500">N/A</span>'
                                    }
                                </td>
                                <td class="px-6 py-4">${formatDate(item.reviewed_at)}</td>
                            `;
                            tbody.appendChild(row);

                            const abstractRow = document.createElement('tr');
                            abstractRow.id = abstractRowId;
                            abstractRow.className = 'hidden';
                            abstractRow.innerHTML = `
                                <td colspan="12" class="px-6 py-3 text-base text-gray-700 bg-gray-50 ${rowColor}">
                                    <div class="text-justify break-words overflow-wrap-break-word">${item.abstract}</div>
                                </td>
                            `;
                            tbody.appendChild(abstractRow);

                            // Remarks row
                            const remarksRow = document.createElement('tr');
                            remarksRow.id = remarksRowId;
                            remarksRow.className = 'hidden';
                            remarksRow.innerHTML = `
                                <td colspan="12" class="px-6 py-3 text-base text-gray-700 bg-gray-50 ${rowColor}">
                                    <div class="text-justify break-words overflow-wrap-break-word">${item.remarks || ''}</div>
                                </td>
                            `;
                            tbody.appendChild(remarksRow);
                        });

                        showPage('history', 1);
                    });
            }

            //Inventory ==============================================================================================

            const yearSelect = document.querySelector('select[name="inv-dd-academic_year"]');
            const programSelect = document.querySelector('select[name="inv-dd-program"]');
            const inventorySearchInput = document.getElementById('inventory-search');

            if (yearSelect) {
                yearSelect.addEventListener('change', () => {
                    fetchInventoryData(); // re-fetch table when year changes
                });
            }

            if (programSelect) {
                programSelect.addEventListener('change', () => {
                    fetchInventoryData(); // re-fetch table when program changes
                });
            }

            if (inventorySearchInput) {
                let searchTimeout;
                inventorySearchInput.addEventListener('input', () => {
                    clearTimeout(searchTimeout); // reset old timer
                    searchTimeout = setTimeout(() => {
                        fetchInventoryData(); // call only after 300ms pause
                    }, 300);
                });
            }

            // popluate inv table
            function fetchInventoryData() {
                const program = document.querySelector('select[name="inv-dd-program"]').value;
                const search = document.getElementById('inventory-search').value.trim();

                const params = new URLSearchParams({
                    program,
                    search
                });

                fetch(`/inventory/data?${params.toString()}`)
                    .then(res => res.json())
                    .then(data => {
                        const tbody = document.getElementById('inventory-table-body');
                        if (!tbody) return;
                        tbody.innerHTML = ''; // Clear old rows

                        if (data.length === 0) {
                            // Show "No matching results" if no data
                            const noDataRow = document.createElement('tr');
                            noDataRow.innerHTML = `
                        <td colspan="9" class="text-center py-4 text-gray-500 italic">
                            No matching results found.
                        </td>
                    `;
                            tbody.appendChild(noDataRow);
                            return;
                        }


                        data.forEach((itemInv, idx) => {
                            const rowColor = idx % 2 === 0 ? 'bg-[#fdfdfd]' : 'bg-orange-50';
                            const abstractRowId = `abstract-row-${idx}`;
                            const toggleBtnId = `toggle-btn-${idx}`;

                            // Main row
                            const row = document.createElement('tr');
                            //row.className = rowColor;

                            const manuscriptHtml = itemInv.manuscript_filename ? `
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="items-center gap-3 mt-1">
                                        <div class="flex">
                                            <button type="button"
                                                class="flex items-center font-semibold text-sm text-[#9D3E3E] hover:underline cursor-pointer preview-btn-inv"
                                                data-url="/inventory/${itemInv.id}/view"
                                                data-filename="${itemInv.manuscript_filename}">
                                                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                </svg>
                                                Preview
                                            </button>
                                            <p class="ml-2 mr-2">|</p>
                                            <a href="${itemInv.download_url}"
                                                download="${itemInv.manuscript_filename}"
                                                class="flex items-center font-semibold text-sm text-[#9D3E3E] hover:underline">
                                                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoins="round" stroke-width="2"
                                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                                    </svg>
                                                    ${itemInv.manuscript_filename}
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            ` : `<td class="h-16">
                                    <div class="flex items-center justify-center text-gray-500 h-full">
                                        No manuscript uploaded
                                    </div>
                                </td>`;
                            row.innerHTML = `
                                <td class="px-6 py-4 whitespace-normal max-w-[10vw] break-words">${itemInv.inventory_number}</td>
                                <td class="px-6 py-4 text-justify min-w-[300px] max-w-[350px]">${itemInv.title || 'No title'}</td>
                                <td class="px-6 py-4 min-w-[230px] max-w-[280px]">
                                    ${itemInv.authors
                                        ? itemInv.authors.split(',').map(author =>
                                            `<div class=\"block truncate\" title=\"${author.trim()}\">${author.trim()}</div>`
                                        ).join('')
                                        : 'No authors'
                                    }
                                </td>
                                <td class="items-center px-4 py-2">
                                    <button type="button"
                                            id="${toggleBtnId}"
                                            class="flex items-center font-semibold text-sm text-[#9D3E3E] hover:underline cursor-pointer"
                                            onclick="toggleAbstract('${abstractRowId}', '${toggleBtnId}')">
                                        View Abstract
                                    </button>
                                </td>
                                ${manuscriptHtml}
                                <td class="px-6 py-4 whitespace-nowrap">${itemInv.adviser}</td>
                                <td class="px-6 py-4 whitespace-nowrap">${itemInv.program || ''}</td>
                                <td class="px-6 py-4 whitespace-nowrap">${itemInv.academic_year}</td>
                                <td class="px-6 py-4 whitespace-nowrap">${itemInv.submitted_by || ''}</td>
                                <td class="px-6 py-4 whitespace-nowrap">${formatDate(itemInv.archived_at)}</td>
                                <td class="px-6 py-4 whitespace-nowrap">${itemInv.reviewed_by || ''}</td>
                                ${itemInv.can_edit
                                ? `<td class="px-6 py-4 whitespace-nowrap">
                                                                                                                                                                                                    <button id="edit-inventory-btn-${itemInv.id}"
                                                                                                                                                                                                        class="ml-4 text-red-600 hover:underline cursor-pointer edit-inventory-btn"
                                                                                                                                                                                                        data-item='${JSON.stringify(itemInv).replace(/'/g, "&apos;")}'>
                                                                                                                                                                                                            Edit
                                                                                                                                                                                                    </button>
                                                                                                                                                                                                     </td>`
                                : ''}
                            `;
                            tbody.appendChild(row);

                            // Abstract row (initially hidden)
                            const abstractRow = document.createElement('tr');
                            abstractRow.id = abstractRowId;
                            abstractRow.className = `hidden`;
                            abstractRow.innerHTML = `
                                <td colspan="12" class="min-w-[20vw] max-w-[20vw] px-6 py-3 text-base text-gray-700 bg-gray-50">
                                    <div class="break-words overflow-wrap-break-word text-justify"> ${itemInv.abstract}</div>
                                </td>
                            `;
                            tbody.appendChild(abstractRow);
                            showPage('inventory', 1);
                        });
                    });
            }

            document.addEventListener('click', e => {
                const btn = e.target.closest('.preview-btn-inv');
                if (!btn) return;

                const url = btn.dataset.url;
                const pdfPreviewModal = document.getElementById('pdf-preview-modal-inv');
                const pdfPreviewIframe = document.getElementById('pdf-preview-iframe-inv');
                const closePreviewModal = document.getElementById('close-preview-modal-inv');
                const filenamePrev = btn.dataset.filename || 'Document Preview';
                const filenameFrame = document.getElementById('pdf-prev-fn-inv');

                // Set the iframe source to the PDF URL
                pdfPreviewIframe.src = url;

                if (filenamePrev) {
                    filenameFrame.textContent = filenamePrev;
                }

                // Show the modal
                pdfPreviewModal.classList.remove('hidden');
                pdfPreviewModal.classList.add('flex');

                closePreviewModal.addEventListener('click', () => {
                    pdfPreviewModal.classList.add('hidden');
                    pdfPreviewModal.classList.remove('flex');
                    pdfPreviewIframe.src = '';
                });
            });

            //inventory edit

            document.addEventListener('click', function(e) {
                const target = e.target;
                if (target.classList.contains('edit-inventory-btn')) {
                    e.preventDefault();
                    const itemData = target.getAttribute('data-item');
                    try {
                        const item = JSON.parse(itemData.replace(/&apos;/g, "'"));
                        editArchiver(item);
                    } catch (err) {
                        console.error("Failed to parse item data:", err);
                    }
                }
            });

            window.editArchiver = function(item) {
                console.log("Editing inventory item:", item);

                // 1. Show the edit form first
                showOnly('edit-inventory-page');

                // 2. Wait for the form to be visible and dropdowns to be rendered
                setTimeout(() => {
                    // Set the ID first
                    const idField = document.getElementById('edit-item-id');
                    if (idField) idField.value = item.id;

                    // Set text fields
                    document.getElementById('edit-thesis-title').value = item.title || '';
                    document.getElementById('edit-authors').value = item.authors || '';
                    document.getElementById('edit-abstract').value = item.abstract || '';

                    // Set adviser dropdown
                    const adviserSelect = document.querySelector(
                        '#edit-inventory-form select[name="adviser"]');
                    if (adviserSelect) {
                        adviserSelect.value = item.adviser || '';
                        // If the value is not found, try to match by text (for cases where value/text differ)
                        if (adviserSelect.value !== item.adviser) {
                            Array.from(adviserSelect.options).forEach(opt => {
                                if (opt.text === item.adviser) adviserSelect.value = opt.value;
                            });
                        }
                    }

                    // Set program dropdown
                    const programSelect = document.getElementById('edit-program-select');
                    if (programSelect) {
                        // Try by id first, then by text
                        programSelect.value = item.program_id || '';
                        if (programSelect.value !== item.program_id && item.program) {
                            Array.from(programSelect.options).forEach(opt => {
                                if (opt.text === item.program) programSelect.value = opt.value;
                            });
                        }
                    }

                    // Set academic year dropdown
                    const yearSelect = document.querySelector(
                        '#edit-inventory-form select[name="academic_year"]');
                    if (yearSelect) {
                        yearSelect.value = item.academic_year || '';
                        if (yearSelect.value !== String(item.academic_year)) {
                            Array.from(yearSelect.options).forEach(opt => {
                                if (opt.value == item.academic_year) yearSelect.value = opt
                                    .value;
                            });
                        }
                    }

                    // Set file display
                    const fileNameSpanEdit = document.getElementById('adminEdit-file-name');
                    const uploadedFileContainerEdit = document.getElementById(
                        'edit-admin-uploaded-file');
                    if (item.manuscript_filename) {
                        fileNameSpanEdit.textContent = item.manuscript_filename;
                        uploadedFileContainerEdit.classList.remove('hidden');
                        uploadedFileContainerEdit.classList.add('flex');
                    } else {
                        fileNameSpanEdit.textContent = '';
                        uploadedFileContainerEdit.classList.add('hidden');
                        uploadedFileContainerEdit.classList.remove('flex');
                    }
                }, 50); // Give a bit more time for DOM to update
            };


            // update/edit form submission handler
            document.getElementById('edit-inventory-form')?.addEventListener('submit', async function(e) {
                e.preventDefault();

                const form = e.target;
                const formData = new FormData(form);
                const itemId = formData.get('id');

                if (!itemId) {
                    alert('Error: No inventory item selected');
                    return;
                }

                try {
                    const response = await fetch(`/inventories/${itemId}`, {
                        method: 'POST', // Laravel will treat as PUT due to _method field
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .content,
                            'Accept': 'application/json',
                        },
                        body: formData
                    });

                    const result = await response.json();

                    if (response.ok) {
                        const kpopup = document.getElementById('universal-ok-popup');
                        const kTopText = document.getElementById('OKtopText');
                        const kSubText = document.getElementById('OKsubText');
                        const kButton = document.getElementById('uniOK-confirm-btn');
                        //test push
                        kTopText.textContent = "Update Sucessful!";
                        kSubText.textContent = "Thesis has been updated successfully.";
                        kpopup.style.display = 'flex';

                        kButton.addEventListener('click', () => {
                            kpopup.style.display = 'none';
                            fetchInventoryData(); // Refresh inventory data
                            showOnly('inventory-table');
                            // Also refresh logs to reflect the update
                            try {
                                window.reloadLogs && window.reloadLogs();
                            } catch (e) {}
                        });

                    } else {
                        throw new Error(result.message || 'Failed to update thesis');
                    }
                } catch (error) {
                    console.error('Error updating thesis:', error);
                }
            });




            const scanOptionPopup = document.getElementById('scan-option-popup');
            const scanDocuBtn = document.getElementById('scan-docu-upload-btn');
            const editImagePopup = document.getElementById('image-edit-popup');
            const popupTitle = document.getElementById('popup-title');
            const ocrOutput = document.getElementById('ocrInput');

            let currentSubmissionId = null;
            let selectedScanTitle = "";

            document.querySelectorAll('.scan-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    console.log('selectedScanTitle:', window.selectedScanTitle);
                    window.selectedScanTitle = btn.getAttribute('data-title');
                    window.selectedInputId = btn.getAttribute('data-input');
                    scanOptionPopup.style.display = 'flex';
                });
            });


            //import
            const importExcelFileBtn = document.getElementById('import-excel-file');
            const importExcelFilePopup = document.getElementById('import-excel-popup');

            importExcelFileBtn.addEventListener('click', () => {
                const step1 = document.getElementById('ie-step-1');
                const step2 = document.getElementById('ie-step-2');

                step1.classList.remove('hidden');
                step2.classList.add('hidden');
                importExcelFilePopup.style.display = 'flex';
            });

            //export
            const exportFileBtn = document.getElementById('export-file-btn');
            const exportFilePopup = document.getElementById('export-file-popup');

            exportFileBtn.addEventListener('click', () => {
                exportFilePopup.style.display = 'flex';
            });

            /**
             * Add Admin Button handler
             */

            const addAdminBtn = document.getElementById('add-admin-btn');
            const addAdminPopup = document.getElementById('add-admin-popup');

            addAdminBtn.addEventListener('click', () => {
                addAdminPopup.style.display = 'flex';
                console.log('Add Admin Button Clicked');
            });

            // Load filter options
            fetch('/users/data')
                .then(res => res.json())
                .then(data => {
                    const accountSelect = document.querySelector('select[name="accounts-dd"]');
                    const accountTypes = [...new Set(data.map(u => u.account_type))]; // unique account types

                    accountTypes.forEach(type => {
                        const opt = document.createElement('option');
                        opt.value = type;
                        opt.textContent = type.replace('_', ' ');
                        accountSelect.appendChild(opt);
                    });
                });

            // Filter when dropdown changes
            const accountSelect = document.querySelector('select[name="accounts-dd"]');
            if (accountSelect) {
                accountSelect.addEventListener('change', () => {
                    fetchUserData();
                });
            }

            const userSearchInput = document.getElementById('user-search');
            if (userSearchInput) {
                userSearchInput.addEventListener('input', () => {
                    fetchUserData();
                });
            }

            // Populate users table
            function fetchUserData() {
                const searchQuery = document.getElementById('user-search').value.trim();
                const selectedType = document.querySelector('select[name="accounts-dd"]').value;

                let url = '/users/data?with_permissions=1';

                if (searchQuery) url += `&search=${encodeURIComponent(searchQuery)}`;
                if (selectedType) url += `&account_type=${encodeURIComponent(selectedType)}`;

                fetch(url)
                    .then(res => res.json())
                    .then(data => {
                        const tbody = document.getElementById('users-table-body');
                        tbody.innerHTML = '';

                        if (data.length === 0) {
                            tbody.innerHTML =
                                `<tr><td colspan="7" class="text-center py-4 text-gray-500 italic">No users found.</td></tr>`;
                            return;
                        }

                        data.forEach((user, idx) => {
                            const rowColor = idx % 2 === 0 ? 'bg-[#fdfdfd]' : 'bg-orange-50';
                            const fullName = `${user.first_name || ''} ${user.last_name || ''}`;
                            const program = user.program || '—';
                            const degree = user.degree || '—';
                            const actions = user.account_type.toLowerCase() === 'admin' ?
                                `<button class="ml-4 text-red-600 hover:underline cursor-pointer edit-admin-account" data-user-id="${user.id}">Edit</button>` :
                                '';

                            const row = document.createElement('tr');
                            row.className = rowColor;
                            row.innerHTML = `
                    <td class="px-6 py-4">${fullName}</td>
                    <td class="px-6 py-4">${user.email}</td>
                    <td class="px-6 py-4">${user.account_type.replace('_', ' ')}</td>
                    <td class="px-6 py-4">${program}</td>
                    <td class="px-6 py-4">${degree}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                            ${user.status.toLowerCase() === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'}">
                            ${user.status}
                        </span>
                    </td>
                    <td class="px-6 py-4">${actions}</td>
                `;
                            tbody.appendChild(row);
                        });

                        showPage('users', 1);
                    });
            }


            //edit addmin account
            const editPermsPopup = document.getElementById('edit-admin-perms-popup');
            const permissionCheckboxes = {
                'view-dashboard': document.getElementById('edit-perms-view-dashboard'),
                'view-thesis-submissions': document.getElementById('edit-perms-view-thesis-submissions'),
                'view-forms-submissions': document.getElementById('edit-perms-view-forms-submissions'),
                'acc-rej-thesis-submissions': document.getElementById('edit-perms-acc-rej-thesis-submissions'),
                'acc-rej-forms-submissions': document.getElementById('edit-perms-acc-rej-forms-submissions'),
                'view-inventory': document.getElementById('edit-perms-view-inventory'),
                'add-inventory': document.getElementById('edit-perms-add-inventory'),
                'edit-inventory': document.getElementById('edit-perms-edit-inventory'),
                'import-inventory': document.getElementById('edit-perms-import-inventory'),
                'export-inventory': document.getElementById('edit-perms-export-inventory'),
                'view-accounts': document.getElementById('edit-perms-view-accounts'),
                'edit-permissions': document.getElementById('edit-perms-edit-permissions'),
                'add-admin': document.getElementById('edit-perms-add-admin'),
                'modify-programs-list': document.getElementById('edit-perms-modify-programs-list'),
                'modify-advisers-list': document.getElementById('edit-perms-modify-advisers-list'),
                'view-logs': document.getElementById('edit-perms-view-logs'),
                'view-backup': document.getElementById('edit-perms-view-backup'),
                'download-backup': document.getElementById('edit-perms-download-backup'),
                'allow-restore': document.getElementById('edit-perms-allow-restore')
            };

            document.addEventListener('click', function(e) {
                const editBtn = e.target.closest('.edit-admin-account');
                if (editBtn) {
                    e.preventDefault();
                    const userId = editBtn.dataset.userId;
                    const adminName = editBtn.dataset.adminName || '';
                    const adminEmail = editBtn.dataset.adminEmail || '';

                    if (!userId) {
                        console.error('No user ID found on edit button');
                        return;
                    }

                    const form = document.querySelector('#edit-admin-perms-popup form');
                    if (form) {
                        form.dataset.userId = userId;
                    }

                    editAdminAccount(userId, adminName, adminEmail);
                }
            });
            async function editAdminAccount(userId, adminName = '', adminEmail = '') {
                if (!userId) {
                    alert('Error: No user selected');
                    return;
                }

                const editPermsPopup = document.getElementById('edit-admin-perms-popup');
                if (!editPermsPopup) {
                    console.error('Edit permissions popup not found');
                    return;
                }

                // Set admin info if provided
                const nameDisplay = document.getElementById('eap-admin-name-display');
                const emailDisplay = document.getElementById('eap-admin-email-display');
                if (nameDisplay) nameDisplay.textContent = `Name: ${adminName}`;
                if (emailDisplay) emailDisplay.textContent = `Email: ${adminEmail}`;

                editPermsPopup.style.display = 'flex';

                try {
                    const response = await fetch(`/admin/users/${userId}/permissions`);
                    if (!response.ok) throw new Error(`HTTP ${response.status}`);

                    const data = await response.json();
                    console.log('Permissions data:', data);

                    // Reset all checkboxes first
                    document.querySelectorAll('.permission-checkbox').forEach(checkbox => {
                        checkbox.checked = false;
                    });

                    // Update checkboxes based on received permissions
                    data.permissions.forEach(perm => {
                        const formattedPerm = perm.replace(/_/g, '-');
                        const checkboxId = `edit-perms-${formattedPerm}`;
                        const checkbox = document.getElementById(checkboxId);

                        if (checkbox) {
                            checkbox.checked = true;
                            // Trigger change event to update dependent checkboxes
                            const event = new Event('change');
                            checkbox.dispatchEvent(event);
                        } else {
                            console.warn(
                                `No checkbox found for permission: ${perm} (looked for ${checkboxId})`
                            );
                        }
                    });

                } catch (error) {
                    console.error('Error loading permissions:', error);
                    const popup = document.getElementById('universal-x-popup');
                    const xTopText = document.getElementById('x-topText');
                    const xSubText = document.getElementById('x-subText');
                    xTopText.textContent = "Error!";
                    xSubText.textContent = 'Failed to load permissions. Please try again.';
                    popup.style.display = 'flex';
                    editPermsPopup.style.display = 'none';
                }
            }


            //Backup buttons =======================================================================================================
            //download backup popup
            const downloadBackupPopup = document.getElementById('backup-download-popup');
            document.querySelectorAll('.download-backup-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    step1?.classList.remove('hidden');
                    step2?.classList.add('hidden');
                    if (downloadBackupPopup) downloadBackupPopup.style.display = 'flex';
                });
            });


            const backupDownloadForm = document.getElementById('backup-form');
            const button = document.getElementById('backup-btn');
            const backupPopup = document.getElementById('backup-download-popup');

            backupDownloadForm.addEventListener('submit', function(e) {
                const now = new Date();
                const formatted = now.toISOString().replace(/T/, '_').replace(/:/g, '-').split('.')[0];
                const filename = `backup_${formatted}.sqlite`;
                const fileNameInput = document.getElementById('bds-file-name');
                const confirmBtn = document.getElementById('bds-confirm-btn');

                e.preventDefault();
                fileNameInput.textContent = filename;
                backupPopup.style.display = 'flex';

                confirmBtn.addEventListener('click', () => {
                    backupPopup.style.display = 'none';
                    backupDownloadForm.submit();
                });
            });

            const backupAndResetForm = document.getElementById('backupAndResetForm');
            const backupAndResetBtn = document.getElementById('backup-and-reset-btn');

            const CTPmodal = document.getElementById('confirm-textbox-popup');
            const CTPconfirmInput = document.getElementById('confirm-textbox-input');
            const CTPnameInput = document.getElementById('ctp-confirm-name-input');
            const CTPconfirmBtn = document.getElementById('ctp-confirm-submit-btn');
            const CTPcancelBtn = document.getElementById('ctp-cancel-confirm-btn');

            backupAndResetForm.addEventListener('submit', function(e) {
                e.preventDefault();
                console.log('Backup and reset form submitted');
                CTPmodal.style.display = 'flex';

                function updateConfirmButtonState() {
                    const isConfirmed = CTPconfirmInput.value === 'BACKUPANDRESET';
                    const hasName = CTPnameInput.value.trim().length > 0;
                    CTPconfirmBtn.disabled = !(isConfirmed && hasName);
                }

                CTPconfirmInput.addEventListener('input', updateConfirmButtonState);
                CTPnameInput.addEventListener('input', updateConfirmButtonState);

                CTPconfirmBtn.addEventListener('click', function(e) {
                    backupAndResetForm.submit();

                    setTimeout(() => {
                        location.reload();
                    }, 3000);
                });

                updateConfirmButtonState();
            });


            // Init pagination for all
            ['users', 'submission', 'forms-submission', 'inventory', 'logs', 'backup', 'history', 'forms-history']
            .forEach(id => showPage(id, 1));

            const adminChangePassReminderBtn = document.getElementById('changepass-confirm-btn');
            adminChangePassReminderBtn?.addEventListener('click', () => {
                editAccountPopup.style.display = 'flex';
            });
        });

        // Toggle function to show/hide abstract
        function toggleAbstract(rowId, btnId) {
            const row = document.getElementById(rowId);
            const btn = document.getElementById(btnId);

            if (row.classList.contains('hidden')) {
                row.classList.remove('hidden');
                btn.innerText = 'Hide Abstract';
            } else {
                row.classList.add('hidden');
                btn.innerText = 'View Abstract';
            }
        }

        function toggleRemarks(rowId, btnId) {
            const row = document.getElementById(rowId);
            const btn = document.getElementById(btnId);

            if (row.classList.contains('hidden')) {
                row.classList.remove('hidden');
                btn.innerText = 'Hide Remarks';
            } else {
                row.classList.add('hidden');
                btn.innerText = 'View Remarks';
            }
        }

        function formatDate(dateStr) {
            const date = new Date(dateStr);
            return date.toLocaleString("en-US", {
                month: "long",
                day: "2-digit",
                year: "numeric",
                hour: "2-digit",
                minute: "2-digit"
            });
        }
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template.base', ['cssClass' => 'bg-[#fdfdfd] text-gray-900'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/vunc/Documents/HR_Repo/HR_Repo/niche-laravel-app/resources/views/layouts/admin-layout/admin-dashboard.blade.php ENDPATH**/ ?>