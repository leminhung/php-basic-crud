<?php

define('DB_SERVER', "localhost");
define('DB_USERNAME', "root");
define('DB_PASSWORD', "12345678");
define('DB_NAME', "basic_crud");

$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME) or die(mysqli_error($mysqli));

// Check the connection
if ($mysqli === false) {
  dir("Error: Cannot connect");
}
