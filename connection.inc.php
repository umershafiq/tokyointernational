<?php
session_start();
$con = mysqli_connect("localhost","root","","tokyo");
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/tokyointernational/');
define('SITE_PATH','http://127.0.0.1/tokyointernational/');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'media/stock/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'media/stock/');

define('DESTINATION_IMAGE_SERVER_PATH',SERVER_PATH.'media/flags/');
define('DESTINATION_IMAGE_SITE_PATH',SITE_PATH.'media/flags/');
?>