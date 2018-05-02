;

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="panel-limit-margin col-md-10 col-md-offset-1">
            <h1 class="panel-title">Register</h1>
            <div class="col-md-6 col-lg-6 col-lg-offset-3">
                <form method="POST" action="<?php echo e(route('register')); ?>" id="fileForm" role="form">
                    <?php echo e(csrf_field()); ?>

                    <fieldset>

                        <div class="form-group">    
                            <label for="username"><span class="req">* </span> Username: </label>
                            <input class="form-control" id="username" type="text" name="username" value="<?php echo e(old('username')); ?>" required autofocus>
                            <?php if($errors->has('username')): ?>
                            <span class="error">
                                <?php echo e($errors->first('username')); ?>

                            </span>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">    
                            <label for="fullname"><span class="req">* </span> Full Name: </label>
                            <input class="form-control" id="fullname" type="text" name="fullname" value="<?php echo e(old('fullname')); ?>" required autofocus>
                            <?php if($errors->has('fullname')): ?>
                            <span class="error">
                                <?php echo e($errors->first('fullname')); ?>

                            </span>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">  
                            <label for="email">E-Mail Address</label>
                            <input class="form-control"  id="email" type="email" name="email" value="<?php echo e(old('email')); ?>" required>
                            <?php if($errors->has('email')): ?>
                            <span class="error">
                                <?php echo e($errors->first('email')); ?>

                            </span>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">  
                            <label for="password">Password</label>
                            <input class="form-control" id="password" type="password" name="password" required>
                            <?php if($errors->has('password')): ?>
                            <span class="error">
                                <?php echo e($errors->first('password')); ?>

                            </span>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">  
                            <label for="password-confirm">Confirm Password</label>
                            <input class="form-control" id="password-confirm" type="password" name="password_confirmation" required>
                        </div>

                        <div class="form-group">    
                            <label for="birth_date"><span class="req">* </span> Birthday: </label>
                            <input class="form-control" id="birth_date" type="date" name="birth_date" value="<?php echo e(old('birth_date')); ?>" required data-date-format="yyyy/mm/dd" autofocus>
                            <?php if($errors->has('birth_date')): ?>
                            <span class="error">
                                <?php echo e($errors->first('birth_date')); ?>

                            </span>
                            <?php endif; ?>
                        </div>

                        

                        <button class="btn btn-success" type="submit">
                        Register
                        </button>
                        <a class="button button-outline" href="<?php echo e(route('login')); ?>">Login</a>
                    </fieldset>
                </form>                
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.page_unregisted', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>