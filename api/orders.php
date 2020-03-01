<?php

http_response_code(200);

$mp_endpoint = 'https://api.mercadopago.com/mpmobile/instore/qr/520255910/pythontest?access_token=APP_USR-8784583960835302-012920-171e94e7f45cc4e31e3cbcd15fb591ef-520255910';

$title = $_POST['title'];
$quantity = $_POST['quantity'];
$unit_price = $_POST['unit_price'];
$currency_id = 'ARS';

$fecha = date_create();
$time_stamp = date_timestamp_get($fecha);

$external_reference = 'niclas-' + $time_stamp;
$notification_url = 'https://flask-example-niclas.herokuapp.com/notifications';

$items = array('title' => $title, 'currency_id' => $currency_id ,'quantity' => $quantity, 'unit_price' => $unit_price);

$json = array('external_reference' => $external_reference, 'notification_url' => $notification_url, 'items' => $items);

// use key 'http' even if you send the request to https://...
// $options = array(
//     'http' => array(
//         'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
//         'method'  => 'POST',
//         'content' => http_build_query($json)
//     )
// );

// build the urlencoded data
$postvars = http_build_query($json);

// open connection
$ch = curl_init();

// set the url, number of POST vars, POST data
curl_setopt($ch, CURLOPT_URL, $mp_endpoint);
curl_setopt($ch, CURLOPT_POST, count($json));
curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);

// execute post
$result = curl_exec($ch);

// close connection
curl_close($ch);

?>