<?php
include 'koneksi.php';
$host = $_SERVER['HTTP_HOST'];

//membaca alarm
$bacaalarm=shell_exec('cat /www/injen/script/sound.txt');
$bacaalarm2=explode("/",$bacaalarm);

//membaca waktu
$bacawaktu=shell_exec('cat /www/injen/script/waktusound.txt');
$bacawaktu2=0;
//konvert alarm
if ($bacawaktu==1)
$bacawaktu2='default';
 elseif ($bacawaktu==5)
  $bacawaktu2=1;
   elseif ($bacawaktu==25)
     $bacawaktu2=5;
       elseif ($bacawaktu==50)
         $bacawaktu2=10;

?>
<div class="span6">

<h2>Pengaturan Alarm</h2>
<hr>
<?php echo "<div class='alert alert-success'>Bunyi Alarm aktif saat ini $bacaalarm2[4] dengan waktu $bacawaktu2 menit</div>"; ?>

<ul class="unstyled">
<form method="post" action="">
<li> <input type="radio" name="alarm" value="1" checked > Alarm 1 </input>
<audio controls="controls">
<source src="http://<?php echo "$host"; ?>/injen/sound/alarm.mp3" type="audio/mp3">
<source src="http://<?php echo "$host"; ?>/injen/sound/alarm.ogg" type="audio/ogg">
Your browser does not support this audio format.
</audio> (default)
</li><br>

<li><input type="radio" name="alarm" value="2"  > Alarm 2 </input>
<audio controls="controls">
<source src="http://<?php echo "$host"; ?>/injen/sound/alarm2.mp3" type="audio/mp3">
<source src="http://<?php echo "$host"; ?>/injen/sound/alarm2.ogg" type="audio/ogg">
Your browser does not support this audio format.
</audio>
</li><br>

<li><input type="radio" name="alarm" value="3"  > Alarm 3 </input>
<audio controls="controls">
<source src="http://<?php echo "$host"; ?>/injen/sound/alarm3.mp3" type="audio/mp3">
<source src="http://<?php echo "$host"; ?>/injen/sound/alarm3.ogg" type="audio/ogg">
Your browser does not support this audio format.
</audio>
</li><br>
<li> Waktu Alarm berbunyi :</li>
<ul class="unstyled" >
	<li><input type="radio" name="wktsound" value="1" <?php if ($bacawaktu==1) echo "checked"; ?> > default </input></li>
	<li><input type="radio" name="wktsound" value="5" <?php if ($bacawaktu==5) echo "checked"; ?> > 1 menit </input></li>
	<li><input type="radio" name="wktsound" value="25" <?php if ($bacawaktu==25) echo "checked"; ?>> 5 menit </input></li>
	<li><input type="radio" name="wktsound" value="50" <?php if ($bacawaktu==50) echo "checked"; ?>> 10 menit </input></li>
</ul><br>
<li><input name="submit" type="submit" class="btn btn-primary" value="Simpan"></li>
</form>

</ul>



 <?php
 if(isset($_POST['submit']))
 {
  $alarm=$_POST['alarm'];
  $waktu=$_POST['wktsound'];
     //rubah waktu    
     $hapuswaktu=shell_exec('rm /www/injen/script/waktusound.txt'); //hapus file biar tidak terduplikasi	
     $fh=fopen("/www/injen/script/waktusound.txt","a"); //create/buat file
     fwrite($fh,$waktu); //isi file dengan variable 
     fclose($fh); //tutup file  



  $catatlog=mysql_query("insert into log (date,rincian) values (now(),'Bunyi Alarm diubah ') ");
  
  if ($alarm==1){
  		$bashalarm1="/www/injen/sound/alarm.mp3
					";

  	$hapusalarm=shell_exec('rm /www/injen/script/sound.txt'); //hapus file biar tidak terduplikasi	
  	$fh=fopen("/www/injen/script/sound.txt","a"); //create/buat file
  	fwrite($fh,$bashalarm1); //isi file dengan variable 
  	fclose($fh); //tutup file
  	echo "<meta http-equiv='refresh' content='0;url=index.php?page=alarm'>";
  }
	  elseif ($alarm==2) {
	  		$bashalarm2="/www/injen/sound/alarm2.mp3
						";

	  	$hapusalarm=shell_exec('rm /www/injen/script/sound.txt'); //hapus file biar tidak terduplikasi	
	  	$fh=fopen("/www/injen/script/sound.txt","a"); //create/buat file
	  	fwrite($fh,$bashalarm2); //isi file dengan variable 
	  	fclose($fh); //tutup file
	  	echo "<meta http-equiv='refresh' content='0;url=index.php?page=alarm'>";

	  }
		  	elseif ($alarm==3) {
		  		$bashalarm3="/www/injen/sound/alarm3.mp3
							";

		  	$hapusalarm=shell_exec('rm /www/injen/script/sound.txt'); //hapus file biar tidak terduplikasi	
		  	$fh=fopen("/www/injen/script/sound.txt","a"); //create/buat file
		  	fwrite($fh,$bashalarm3); //isi file dengan variable 
		  	fclose($fh); //tutup file
		  	
		  	echo "<meta http-equiv='refresh' content='0;url=index.php?page=alarm'>";

		  }
  }

 
        
  

 ?>

</div>