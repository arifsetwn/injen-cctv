<?php
include 'koneksi.php';
session_start();
$username = $_SESSION['name'];
session_unset();
session_destroy();
$catatlog=mysql_query("insert into log (date,rincian) values (now(),'username $username keluar dari sistem') ");
header ("Location: login.php");

	
?>