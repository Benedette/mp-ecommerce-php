<?php

http_response_code(200);

$mp_endpoint = 'https://api.mercadopago.com/mpmobile/instore/qr/519628608/caixa01loja01?access_token=APP_USR-3703711902928676-012817-ad98593253d083aca15cdd0680a9a52f-519628608';

$ch = curl_init($mp_endpoint);

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);

?>
