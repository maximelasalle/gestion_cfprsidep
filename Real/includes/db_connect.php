<?php

include_once 'psl-config.php';   // As functions.php is not included

$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}