<?php
echo "Hello2";
require_once __DIR__ . ("/autoload.php");

$inputString = file_get_contents('php://input');
error_log($inputString);
?>
