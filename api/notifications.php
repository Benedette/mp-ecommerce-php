<?php

session_start();

http_response_code(200);

// Takes raw data from the request
$json = file_get_contents('php://input');
$get = json_encode($_GET);

// Converts it into a PHP object
$data = json_decode($json);

//print_r($data);
error_log($json);
error_log($get);

?>