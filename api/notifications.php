<?php

session_start();

if (isset($_POST["id"], $_POST["topic"])) {
    http_response_code(200);

    print_r($_POST["id"]);
    print_r($_POST["topic"]);

    var_dump($_POST["id"]);
    var_dump($_POST["topic"]);
    return;


?>