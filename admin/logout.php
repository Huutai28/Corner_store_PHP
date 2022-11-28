<?php
session_start();
unset($_SESSION['EMAIL']);
unset($_SESSION['PASSWORD']);
session_destroy();
header("Location: login");
?>