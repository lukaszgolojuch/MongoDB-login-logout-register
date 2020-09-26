<?php
session_start();
session_destroy();
$_SESSION['log']=0;
exit;
?>
