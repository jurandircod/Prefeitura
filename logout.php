<?php
session_start();
if(!isset($_SESSION)){
    header("location: index.php");
}else{
    session_destroy();
    header("location: index.php");
}
?>