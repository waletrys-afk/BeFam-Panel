<?php

$seervername = 'MySQL-8.0';
$username = 'root';
$passw = '';
$dbname = 'BeFamBD';

$conn = new mysqli($seervername, $username, $passw, $dbname);


if (!$conn) {
  echo 'ошибка подключения';
}