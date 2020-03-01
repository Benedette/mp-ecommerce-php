<?php

session_start();

http_response_code(200);

// Takes raw data from the request
$json = file_get_contents('php://input');

error_log($json);

// Converts it into a PHP object
$data = json_decode($json, true);
error_log($data['topic']);
error_log($_GET['id']);
$topic = $data['topic'];
$id = $_GET['id'];


//$resource = $data['resource'];

if ($topic == "merchant_order") {
    $url_mo = 'https://api.mercadopago.com/merchant_orders/'.$id.'?access_token=APP_USR-8784583960835302-012920-171e94e7f45cc4e31e3cbcd15fb591ef-520255910';
    $ch = curl_init($url_mo);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    error_log($result);
}


?>