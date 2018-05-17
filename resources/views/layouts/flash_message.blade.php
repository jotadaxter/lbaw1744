@if($flash = session('password_changed_success'))
    <div id="fls_msg_password_changed_success" class="flash_msg container alert alert-success" role="alert">
        {{$flash}};
    </div>
@elseif($flash = session('account_created_success'))
    <div id="fls_msg_account_created_success" class="flash_msg container alert alert-success" role="alert">
        {{$flash}};
    </div>
@elseif($flash = session('account_updated_success'))
    <div id="fls_msg_account_updated_success" class="flash_msg container alert alert-success" role="alert">
        {{$flash}};
    </div>

@endif

<script>

    setTimeout(function () {
        $(".flash_msg").fadeOut(1500);
    }, 3000);

</script>