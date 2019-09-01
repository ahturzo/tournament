<?php 
session_start();
if(isset($_SESSION['login']) && !empty($_SESSION['login']))
{
    unset($_SESSION["email"]);
    session_destroy();
}
    header('Location: index.php');
?>