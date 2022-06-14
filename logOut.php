<?php
session_start();
session_destroy();

header('Location: http://localhost/Vjezbe/Projekt/index.php');
?>