<?php

header("Location: /index");
session_start();
$_SESSION['login'] = '';
$_SESSION = [];
session_destroy();


