<?php
include_once '../settings.php';
include("lib/userscontroller.php");

$newuser = new UsersController();
$newuser->Logout();

?>

