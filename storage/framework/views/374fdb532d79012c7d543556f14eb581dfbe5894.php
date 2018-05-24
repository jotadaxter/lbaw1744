<?php $__env->startSection('content'); ?>
    <div class="about container panel-limit-margin">
        <h3 class="panel-title">Reset Password Confirmation</h3>
        <div class="container padded">
            <h2 class="terms_title">Reset Password Confirmation</h2>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="col-md-6 col-lg-6 col-lg-offset-3">
                        <form method="POST" action="<?php echo e(route('passwordConfirmation')); ?>" id="pwResetForm" role="form">
                            <?php echo e(csrf_field()); ?>

                            <fieldset>

                                <div class="form-group">
                                    <label for="confirmation_code"> Insert the Confirmation Code Sent to Your Email</label>
                                    <input class="form-control"  id="confirmation_code" type="text" name="confirmation_code" required>
                                    <?php if($errors->has('confirmation_code')): ?>
                                        <span class="error">
                                            <?php echo e($errors->first('confirmation_code')); ?>

                                        </span>
                                    <?php endif; ?>
                                    <?php if(session()->has('email')): ?>
                                        <input class="form-control"  id="email" type="hidden" name="email" value="<?php echo e(session('email')); ?>">
                                    <?php endif; ?>
                                </div>

                                <button class="btn btn-success" type="submit">
                                    Submit
                                </button>
                                <a class="btn btn-success" href="<?php echo e(route('resendConfirmationMail', session('email'))); ?>">Resend email</a>
                                <a class="button button-outline" href="<?php echo e(route('passwordReset')); ?>">Back</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>