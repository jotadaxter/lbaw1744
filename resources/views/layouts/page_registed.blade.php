<?php if($user = Auth::user())
{
    ?> @include('layouts.header_registed')<?php
} else {
	?> @include('layouts.header_unregisted')<?php
}
?>

@yield('content')

@include('layouts.footer')
