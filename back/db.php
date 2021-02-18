<?php
error_reporting(0);
ini_set('display_errors',0);
define('DB_HOST','us-cdbr-east-03.cleardb.com');
define('DB_USER','b7128fd89bab29');
define('DB_PASS','3a256df6');
define('DB_NAME','heroku_762e10c496e19f9');
$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8";
$db = new PDO($dsn,DB_USER,DB_PASS);

?>
