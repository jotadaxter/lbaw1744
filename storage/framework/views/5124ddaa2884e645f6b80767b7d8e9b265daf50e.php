<?php $__env->startSection('content'); ?>

        <img class="vapor-mail-banner" src="https://i.imgur.com/yYYEEW8.jpg" width="460" height="40" border="0">
        <pre class ="pw-reset-message">
        Dear user, 

        This is an automated message generated by the Vapor account administration to help you reset your Steam password.

        Please enter the following code into the 'Verification Code' field of the 'Forgotten Password' dialog.
        (Enter the code exactly as written. You can use copy/paste operations to enter the code):

        <?php echo $code; ?>

        
        IMPORTANT: Please do not reply to this message to attempt to reset your password -- that won't work.
                   You must enter the above information into the Vapor website.
        </pre>

        <div>
                <p style="color:black;">The Vapor support team</p>
                <a href="http://lbaw1744.lbaw-prod.fe.up.pt/contacts">http://lbaw1744.lbaw-prod.fe.up.pt/contacts</a>
                <br>
                <br>
                <br>
                <br>
                <span style="color:#333333;font-size:9px;font-family:Trebuchet MS,Verdana,Arial,Helvetica,sans-serif">
                This notification has been sent to the email address associated with your Vapor account.
                <br>
                For information on Vapor's privacy policy, visit
                <a href="http://lbaw1744.lbaw-prod.fe.up.pt/privacy">http://lbaw1744.lbaw-prod.fe.up.pt/privacy</a>
                <br>
                This email message was auto-generated. Please do not respond.
                </span>
        </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/email', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>