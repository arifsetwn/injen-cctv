<?php
include 'koneksi.php';

?>

<div class="span6">
<h2> Notifikasi </h2>
<hr>
<blockquote>SMS</blockquote>

<p>Isikan No HP tujuan untuk pengiriman notifikasi SMS</p>
<p> 
	<?php 
		//baca no hp
		$baca=shell_exec('cat /www/injen/script/nohp.txt');
		//baca waktu
		$wkt=shell_exec('cat /www/injen/script/timer.txt');
		$wkt2=$wkt/60;

		echo "<div class='alert alert-success'>No HP saat ini +62$baca <br> Waktu kirim sms $wkt2 menit</div>";

	?>
</p>
<form method="post" action="" name="FrmSMS" onsubmit="return validateForm()" >
+62 <input type="text" name="hp" placeholder="masukkan no hp" onkeypress="return Angka();"> </input> <br>
<p> Jarak waktu antar sms ketika terdeteksi gerakan</p>
<ul class="unstyled" >
	<li><input type="radio" name="wktsms" value="1" <?php if ($wkt2==1) echo "checked"; ?> > 1 menit </input></li>
	<li><input type="radio" name="wktsms" value="3" <?php if ($wkt2==3) echo "checked"; ?>> 3 menit </input></li>
	<li><input type="radio" name="wktsms" value="5" <?php if ($wkt2==5) echo "checked"; ?>> 5 menit </input></li>
	<li><input type="radio" name="wktsms" value="10" <?php if ($wkt2==10) echo "checked"; ?>> 10 menit </input></li>
</ul>

<input name="submit" type="submit" class="btn btn-primary" value="Simpan">

</form>



 <?php
 if(isset($_POST['submit']))
 {
  $hp=$_POST['hp'];
  $wktsms=$_POST['wktsms'];
  
  //proses sms	
  $hapussms=shell_exec('rm /www/injen/script/nohp.txt'); //hapus file biar tidak terduplikasi	
  $fh=fopen("/www/injen/script/nohp.txt","a"); //create/buat file
  fwrite($fh,$hp); //isi file dengan variable $hp
  fclose($fh); //tutup file
  $updatelog=mysql_query("insert into log (date,rincian) values (now(),'nomor penerima sms di ubah') ");

  //matikan timer
  $matitimer=shell_exec('killall sleep');	   

  //proses waktu
  if ($wktsms==1)
	{ 
		$waktu1="60";
		$hapusalarm=shell_exec('rm /www/injen/script/timer.txt'); //hapus file biar tidak terduplikasi	
	  	$fh=fopen("/www/injen/script/timer.txt","a"); //create/buat file
	  	fwrite($fh,$waktu1); //isi file dengan variable $
	  	fclose($fh); //tutup file
	} 
   else if ($wktsms==3)
	{
	$waktu3="180";
	$hapusalarm=shell_exec('rm /www/injen/script/timer.txt'); //hapus file biar tidak terduplikasi	
	$fh=fopen("/www/injen/script/timer.txt","a"); //create/buat file
	fwrite($fh,$waktu3); //isi file dengan variable $
	fclose($fh); //tutup file
	} 

	else if ($wktsms==5)
	{
	$waktu3="300";
	$hapusalarm=shell_exec('rm /www/injen/script/timer.txt'); //hapus file biar tidak terduplikasi	
	$fh=fopen("/www/injen/script/timer.txt","a"); //create/buat file
	fwrite($fh,$waktu3); //isi file dengan variable $
	fclose($fh); //tutup file
	} 

	else if ($wktsms==10)
	{
	$waktu10="600";
	$hapusalarm=shell_exec('rm /www/injen/script/timer.txt'); //hapus file biar tidak terduplikasi	
	$fh=fopen("/www/injen/script/timer.txt","a"); //create/buat file
	fwrite($fh,$waktu10); //isi file dengan variable $
	fclose($fh); //tutup file
	} 

	
  echo "<meta http-equiv='refresh' content='0;url=index.php?page=notif'>";
}
 ?>

<br>
<hr>
<blockquote>E-mail</blockquote>

<p>Isikan alamat E-mail tujuan untuk pengiriman Log harian</p>
<p> 
	<?php 
		$baca2=shell_exec('cat /www/injen/script/email.txt');
		echo "<div class='alert alert-success'>Alamat e-mail saat ini $baca2</div>";

	?>
</p>
<form method="post" action="" name="FormEmail" onsubmit="return ValidasiEmail();">
<input type="text" name="email" placeholder="masukkan alamat email"> </input> <br>
<input name="submit2" type="submit" class="btn btn-primary" value="Simpan">

</form>



 <?php
 if(isset($_POST['submit2']))
 {
  $email=$_POST['email'];
  $hapusemail=shell_exec('rm /www/injen/script/email.txt'); //hapus file biar tidak terduplikasi	
  $fh=fopen("/www/injen/script/email.txt","a"); //create/buat file
  fwrite($fh,$email); //isi file dengan variable $hp
  fclose($fh); //tutup file
  $updatelog=mysql_query("insert into log (date,rincian) values (now(),'alamat email di ubah') ");
  echo "<meta http-equiv='refresh' content='0;url=index.php?page=notif'>";
}
 ?>

</div>

<script  type="text/javascript">

function ValidasiEmail()
{
var x=document.forms["FormEmail"]["email"].value;
var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
  {
  alert("Alamat Email Salah");
  return false;
  }


}

function Angka(evt)
{
	var e = event || evt; 
	var charCode = e.which || e.keyCode;

	if (charCode > 31 && (charCode < 48 || charCode > 57))
		return false;

	return true;

}

function validateForm()
{
var x=document.forms["FrmSMS"]["hp"].value;
if (x==null || x=="")
  {
  alert("No HP harus diisi");
  return false;
  }
}
</script>