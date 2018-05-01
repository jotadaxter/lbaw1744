<?php $user = auth()->user();?>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-xs-offset-0 col-sm-12 col-sm-offset-0 col-md-8 col-md-offset-2 col-lg-10 col-lg-offset-1" >
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><?=$user->fullname?></h3>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 " align="center">
                            <img alt="User Pic" src="/profile_picture.png"
                                 class="img-circle img-responsive"> </div>
                        <div class=" col-md-9 col-lg-9 ">
                            <table class="table table-user-information">
                                <tbody>
                                <tr>
                                    <td>Username:</td>
                                    <td><?=$user->username?></td>
                                </tr>
                                <tr>
                                    <td>Join date:</td>
                                    <td><?=$user->admission_date?></td>
                                </tr>
                                <tr>
                                    <td>Date of Birth</td>
                                    <td><?=$user->birth_date?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?=$user->email?></td>
                                </tr>
                                <tr>
                                    <td>Phone Number</td>
                                    <td><?=$user->phone_number?><br></td>
                                </tr>
                                <tr>
                                    <td>NIF</td>
                                    <td><?=$user->nif?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <a href="{{ url('/profile/'.$user->user_id.'/edit') }}" id="edit_profile_btn">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>