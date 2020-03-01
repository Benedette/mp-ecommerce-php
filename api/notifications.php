<?php

session_start();

http_response_code(200);

// Takes raw data from the request
$json = file_get_contents('php://input');

error_log($json);

// Converts it into a PHP object
$data = json_decode($json, true);
var_dump($data['topic']);
var_dump($_GET['id']);

// $topic = $data->topic;
// //$resource = $data['resource'];

// if ($topic == "merchant_order") {
//     $url_mo = 'https://api.mercadopago.com/merchant_orders/'.$data['id'];
//     $ch = curl_init($url_mo);
//     curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     $result = curl_exec($ch);
//     curl_close($ch);
//     error_log($result);
// }


?>