<?php

session_start();
session_unset();
session_destroy();

setcookie('User', $_COOKIE['User'], time() - (86400 * 30), "/"); // 86400 = 1 day

header("Location: ../index.php");