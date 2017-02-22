<?php
/*
Author: Sean Tucker
Student #: 200352573
File Name: logout.php
Description: logs out from website by destroying the session
 */
session_start();
session_unset('userid');
session_destroy();
header('Location: index.php');
?>

