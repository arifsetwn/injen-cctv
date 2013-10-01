<h2>Log</h2>
<i>30 log terakhir dari <?php 

include 'koneksi.php';

$hitunglog = mysql_query("select count(id)as jumlah from log");
$hitunglog2=mysql_fetch_array($hitunglog);
echo "$hitunglog2[jumlah] query";


//ekport log
$host = $_SERVER['HTTP_HOST'];
$backuplog=shell_exec('mysqldump -u root --password=dewi injen log > /www/injen/backuplog/backuplog.sql');
echo "<i class='icon-download-alt'></i> <a href='backuplog/backuplog.sql'>Backup Log</a>";


?></i>
<hr>
<div class="span7">

<?php
//tabel log
$query = mysql_query("select * from log ORDER BY id DESC LIMIT 0,30 ");
echo "<table class='table table-striped'>";
while ($row=mysql_fetch_array($query))
{
echo "<tr><td width='200'>";
echo "$row[date]";
echo "</td><td>";
echo "$row[rincian]";
echo "</td>";


}

?>
</table>



</div>