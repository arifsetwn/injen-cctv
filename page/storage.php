<div class="span8">
<h2> Storage </h2>
<hr>

Kapasitas penyimpanan

<pre>
<?php

$stor=shell_exec('df -h');
echo $stor;

?>
</pre>

<?php
$host = $_SERVER['HTTP_HOST'];
echo "Untuk samba server bisa diakses melalui jaringan lokal dengan alamat ip $host";
?>



</div>