<!-- Register Form -->
<div class="container">
    <div class="row" style="background-color: white; border-radius: 10px;">
        <h1 style="text-align: center">Register</h1>
        <div class="col-md-6 col-lg-6 col-lg-offset-3">
            <form action="" method="post" id="fileForm" role="form">
                <fieldset><legend class="text-center">Valid information is required to register. <span class="req"><small> required *</small></span></legend>
                    <div class="form-group">
                        <label for="phonenumber"><span class="req">* </span> Phone Number: </label>
                        <input required type="text" name="phonenumber" id="phone" class="form-control phone" maxlength="28" onkeyup="validatephone(this);"/>
                    </div>

                    <div class="form-group">
                        <label for="firstname"><span class="req">* </span> First name: </label>
                        <input class="form-control" type="text" name="firstname" id = "txt" onkeyup = "Validate(this)" required />
                        <div id="errFirst"></div>
                    </div>

                    <div class="form-group">
                        <label for="lastname"><span class="req">* </span> Last name: </label>
                        <input class="form-control" type="text" name="lastname" id = "txt" onkeyup = "Validate(this)" required />
                        <div id="errLast"></div>
                    </div>

                    <div class="form-group">
                        <label for="email"><span class="req">* </span> Email Address: </label>
                        <input class="form-control" required type="text" name="email" id = "email"  onchange="email_validate(this.value);" />
                        <div class="status" id="status"></div>
                    </div>

                    <div class="form-group">
                        <label for="username"><span class="req">* </span> User name:  <small>This will be your login user name</small> </label>
                        <input class="form-control" type="text" name="username" id = "txt" required />
                        <div id="errLast"></div>
                    </div>

                    <div class="form-group">
                        <label for="password"><span class="req">* </span> Password: </label>
                        <input required name="password" type="password" class="form-control inputpass" minlength="4" maxlength="16"  id="pass1" /> </p>

                        <label for="password"><span class="req">* </span> Password Confirm: </label>
                        <input required name="password" type="password" class="form-control inputpass" minlength="4" maxlength="16" id="pass2" />
                        <span id="confirmMessage" class="confirmMessage"></span>
                    </div>

                    <div class="form-group">
                        <input type="hidden" value="" name="dateregistered">
                        <input type="hidden" value="0" name="activate" />
                        <hr>

                        <input type="checkbox" required name="terms" id="field_terms">  
                        <label for="terms">I agree with the
                            <a href="terms.php" title="You may read our terms and conditions by clicking on this link">terms and conditions</a>
                            for Registration.
                        </label>
                        <span class="req">* </span>
                    </div>

                    <div class="form-group">
                        <input class="btn btn-success" type="submit" name="submit_reg" value="Register">
                    </div>
                    <h5>You will receive an email to complete the registration and validation process. </h5>
                    <h5>Be sure to check your spam folders. </h5>


                </fieldset>
            </form>
        </div>


    </div>
</div>
