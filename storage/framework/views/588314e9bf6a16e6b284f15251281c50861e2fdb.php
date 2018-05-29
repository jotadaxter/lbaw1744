<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="panel-limit-margin col-md-8 col-md-offset-2">
                <div class="user-settings">
                    <h1 class="panel-title">Edit Profile</h1>
                    <!-- edit form column -->
                    <div class="col-md-10 col-md-offset-1  personal-info">
                        <h3>Personal info</h3>
                        <form method="POST" action="<?php echo e(url('profile/'.Auth::id().'/edit')); ?>" id="fileForm" role="form">
                            <?php echo e(csrf_field()); ?>

                            <fieldset>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label" for="username"> Username: </label>
                                    <div class="col-lg-8">
                                        <input class="form-control" id="username" type="text" name="username" value=<?=$user->username?> required autofocus>
                                        <?php if($errors->has('username')): ?>
                                            <span class="error">
                                                <?php echo e($errors->first('username')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label" for="username"> Fullname: </label>
                                    <div class="col-lg-8">
                                        <input class="form-control" id="fullname" type="text" name="fullname" value="<?php echo e($user->fullname); ?>" required autofocus>
                                        <?php if($errors->has('fullname')): ?>
                                            <span class="error">
                                                <?php echo e($errors->first('fullname')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="pass" class="col-lg-3 control-label">New Password:</label>
                                    <div class="col-lg-8">
                                        <input id="password" class="form-control" type="password" name="password">
                                        <?php if($errors->has('password')): ?>
                                            <span class="error">
                                                <?php echo e($errors->first('password')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="pass_repeat" class="col-lg-3 control-label">Confirm:</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" id="password-confirm" type="password" name="password_confirmation" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="user_email" class="col-lg-3 control-label">Email:</label>
                                    <div class="col-lg-8">
                                        <input class="form-control"  id="email" type="email" name="email" value=<?=$user->email?> >
                                        <?php if($errors->has('email')): ?>
                                            <span class="error">
                                                <?php echo e($errors->first('email')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="phone_number" class="col-lg-3 control-label">Phone Number:</label>
                                    <div class="col-lg-8">
                                        <input class="form-control"  id="phone_number" type="phone_number" name="phone_number" value=<?=$user->phone_number?> >
                                        <?php if($errors->has('phone_number')): ?>
                                            <span class="error">
                                                <?php echo e($errors->first('phone_number')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nif" class="col-lg-3 control-label">NIF:</label>
                                    <div class="col-lg-8">
                                        <input class="form-control"  id="nif" type="nif" name="nif" value=<?=$user->nif?> >
                                        <?php if($errors->has('nif')): ?>
                                            <span class="error">
                                                <?php echo e($errors->first('nif')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 col-md-offset-4 control-label"></label>
                                    <div class="col-xs-8 col-xs-offset-4 col-sm-8 col-sm-offset-4 col-md-8 col-md-offset-4 col-lg-4 col-lg-offset-4">
                                        <button class="btn btn-success" type="submit">Save Changes</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>