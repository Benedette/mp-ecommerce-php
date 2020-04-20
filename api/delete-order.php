<?php

http_response_code(200);

$mp_endpoint = 'https://api.mercadopago.com/mpmobile/instore/qr/519628608/caixa01loja01?access_token=APP_USR-7092-012814-71dc5f92829a009096d9bf914a4900d0-519628608';

$ch = curl_init($mp_endpoint);

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);

?>
