<?php $__env->startSection('content'); ?>

        <img class="vapor-mail-banner" src="https://i.imgur.com/yYYEEW8.jpg" width="460" height="40" border="0">
        <pre>
        Welcome <?php echo e($username); ?>!

        Your Vapor account has been created.
        We hope we enjoy our store!

        Life. Love. Aesthetics.
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