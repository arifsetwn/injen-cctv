<h2>Kamera CCTV</h2>
<hr>

<?php
$host = $_SERVER['HTTP_HOST'];
$cekmjpg=shell_exec('sh /www/injen/script/cekmjpg.sh');
$cekmotion=shell_exec('sh /www/injen//script/cekmotion.sh');

if ($cekmjpg==1)
 	{
	echo "<iframe src='http://$host:8080/?action=stream' width='640' height='480'></iframe>";
	}
elseif ($cekmotion==1)
	{
	echo "<script type='text/javascript'>
	alert('Menjalankan Streaming pada mode ini akan memperlambat Sistem');
	</script>";
	
	echo "<iframe src='http://$host:8080' width='640' height='480'></iframe>";
	}
else
	{
		echo "kamera tidak berjalan";
	}
?>



