<?php

session_start();

if (isset($_POST["id"], $_POST["topic"])) {
    http_response_code(200);

    print_r($_GET["id"]);
    print_r($_GET["topic"]);
    return;


?>