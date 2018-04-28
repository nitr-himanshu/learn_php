<?php
require_once ('../../private/intialize.php');

log_out_admin();
$_SESSION['message']='Logout Successful';
redirect_to(url_for('/staff/login.php'));

?>
