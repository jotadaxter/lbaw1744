<?php $__env->startSection('content'); ?>
    <div class="about container panel-limit-margin">
        <h3 class="panel-title">Reset Password</h3>
        <div class="container padded">
            <h2 class="terms_title">Reset Password</h2>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="col-md-6 col-lg-6 col-lg-offset-3">
                        <form method="POST" action="<?php echo e(route('passwordReset')); ?>" id="pwResetForm" role="form">
                            <?php echo e(csrf_field()); ?>

                            <fieldset>

                                <div class="form-group">
                                    <label for="email">E-Mail Address</label>
                                    <input class="form-control"  id="email" type="email" name="email" value="<?php echo e(old('email')); ?>" required>
                                    <?php if($errors->has('email')): ?>
                                        <span class="error">
                                            <?php echo e($errors->first('email')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>

                                <button class="btn btn-success" type="submit">
                                    Send Email
                                </button>
                                <a class="button button-outline" href="<?php echo e(route('login')); ?>">Cancel</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>