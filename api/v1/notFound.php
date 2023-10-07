<?php
include_once "functions.php";
sendHeaders('GET');
header("HTTP/1.0 404 Not Found");
exit();