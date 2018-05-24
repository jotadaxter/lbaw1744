<?php $__env->startSection('content'); ?>
    <div class="about container panel-limit-margin">
        <h3 class="panel-title">Change Password</h3>
        <div class="container padded">
            <h2 class="terms_title">Change Password</h2>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="col-md-6 col-lg-6 col-lg-offset-3">
                        <form method="POST"  action="<?php echo e(route('passwordChange')); ?>" id="pwChangeForm" role="form">
                            <?php echo e(csrf_field()); ?>

                            <fieldset>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input class="form-control" id="password" type="password" name="password" required>
                                    <?php if($errors->has('password')): ?>
                                        <span class="error">
                                            <?php echo e($errors->first('password')); ?>

                                        </span>
                                    <?php endif; ?>
                                    <?php if(session()->has('email')): ?>
                                        <input class="form-control"  id="email" type="hidden" name="email" value="<?php echo e(session('email')); ?>">
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm">Confirm Password</label>
                                    <input class="form-control" id="password-confirm" type="password" name="password_confirmation" required>
                                </div>

                                <button class="btn btn-success" type="submit">
                                    Change
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