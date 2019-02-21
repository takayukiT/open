<?php
echo "Hello3";
require_once __DIR__ . 'vender/autoload.php';

$inputString = file_get_contents('php://input');
error_log($inputString);
?>
