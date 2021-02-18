<?php
error_reporting(0);
ini_set('display_errors',0);
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','profile');
$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8";
$db = new PDO($dsn,DB_USER,DB_PASS);

?>