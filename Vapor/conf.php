<?php
/**
 * Created by PhpStorm.
 * User: Jotadaxter
 * Date: 01-Mar-18
 * Time: 13:53
 */
$root=pathinfo($_SERVER['SCRIPT_FILENAME']);
define ('BASE_FOLDER', basename($root['dirname']));
define ('SITE_ROOT',    realpath(dirname(__FILE__)));
define ('SITE_URL',    'http://'.$_SERVER['HTTP_HOST'].'/'.BASE_FOLDER);


function __autoload($relative_path) {
    include (SITE_ROOT. '/' . $relative_path . '.php');
}
?>