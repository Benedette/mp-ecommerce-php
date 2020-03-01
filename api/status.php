<?php

session_start();
error_log("Session: ".session_id());
error_log(json_encode($_SESSION));

?>