<?php

http_response_code(200);

// Takes raw data from the request
$json = file_get_contents('php://input');
error_log($json);

// Converts it into a PHP object
$data = json_decode($json, true);
$topic = $data['topic'];

if ($topic == "payments") {
    return;
}

//error_log($data['topic']);
//error_log($_GET['id']);
$session_id = $_GET['session_id'];

session_id($session_id);
session_start();

//$resource = $data['resource'];

if ($topic == "merchant_order") {
    $id = $_GET['id'];    
    $url_mo = 'https://api.mercadopago.com/merchant_orders/'.$id.'?access_token=APP_USR-3703711902928676-012817-ad98593253d083aca15cdd0680a9a52f-519628608';
    $ch = curl_init($url_mo);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    error_log($result);

    $response_mo = json_decode($result, true);
    error_log($response_mo['external_reference']);
    error_log($response_mo['status']);
    $external_reference = $response_mo['external_reference'];
    $status = $response_mo['status'];

    error_log(json_encode($_SESSION));
    
    if (!isset($_SESSION['db'])) {
        error_log("aca entre");
        $_SESSION['db'] = array();
    }

    // appendear/updatear el estado de la external reference
    /*
        session = {
            db: {
                niclas-1231: closed,
                niclas-3421412: opened,
            }
        }
    */
    $_SESSION['db'][$external_reference] = $status;
    error_log(json_encode($_SESSION));

    // $db = array($external_reference => $status);
    // $_SESSION["db"]=$db;
    // error_log(json_encode($db, true));
}

?>
