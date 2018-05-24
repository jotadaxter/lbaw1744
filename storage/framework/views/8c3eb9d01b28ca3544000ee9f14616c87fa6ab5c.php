<?php $__env->startSection('content'); ?>

        <img class="vapor-mail-banner" src="/mail_banner.jpg" width="430" height="40" border="0">
        <pre>
        Welcome <?php echo e($username); ?>!

        Your Vapor account has been created.
        </pre>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/email', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>