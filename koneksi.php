<?php
$host="127.0.0.1";
$user="root";
$passwd="dewi";
$db="injen";

$koneksi=mysql_connect($host,$user,$passwd) or die (mysql_error());
mysql_select_db($db,$koneksi) or die (mysql_error());



?>