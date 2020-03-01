<?php

session_start();

http_response_code(200);

$data = json_decode(file_get_contents('php://input'), true);

print_r($data);

var_dump($data);

?>