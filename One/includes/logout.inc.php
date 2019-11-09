<?php 
session_start();
session_unset();//clears the session variables
session_destroy();
header('Location: ../index.php');
?>