<?php
session_start();
$_SESSION['user_id']='';
$_SESSION['name']='';
echo "<script>window.location='http://mdce.dockmaster.dev/';</script>";
?>