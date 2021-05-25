<?php

$i=0;
require_once 'php/DBConnect.php';
$db = new DBConnect();
$users = $db->getUsers();

$bg_background="bg-warning";
$title = "Members Details";
$setMemberActive = "active";
include 'layout/_header.php';

include 'layout/navbar.php';
?>

<?php include 'layout/_member_layout.php'; ?>

<?php include 'layout/_footer.php'; ?>
