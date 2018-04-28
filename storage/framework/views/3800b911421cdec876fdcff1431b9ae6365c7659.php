<?php if($user = Auth::user())
{
    ?> <?php echo $__env->make('layouts.header_registed', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?><?php
} else {
	?> <?php echo $__env->make('layouts.header_unregisted', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?><?php
}
?>

<?php echo $__env->yieldContent('content'); ?>

<?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
