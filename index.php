<?php
include("controllers/User.php");
$users = new User();
$users->loadViews();
?>