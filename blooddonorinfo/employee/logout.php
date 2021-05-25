<?php
require_once 'php/DBConnect.php';

$db = new DBConnect();
$db->logout();
session_start ();
session_destroy();
header("location:../index.php");
?>