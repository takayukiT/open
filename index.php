<?php
echo "Hello4";
require_once __DIR__ . 'C:\Users\tsuchida\heroku_project\vendor\autoload.php';

$inputString = file_get_contents('php://input');
error_log($inputString);
?>
