<?php
include 'koneksi.php';
?>
<h2>Pengaturan Level Keamanan</h2>
<hr>
<div class="span5">
Mode Keamanan Aktif level : <span class="badge badge-success"><?php $query=mysql_query("select * from level where id='1'"); $data=mysql_fetch_array($query); echo $data['level'];  ?></span>
<a href="#levelmodal" role="button" class="btn" data-toggle="modal">Ganti Level</a> 

<p>
<div class="alert alert-block">	
Ket : <br>
Level 0 = Nonaktifkan Sistem (default)<br>
Level 1 = Streaming  <br>
Level 2 = Streaming + Alarm <br>
Level 3 = Streaming + Alarm + Notifikasi SMS<br>
</p>
</div>

<?php
 if(isset($_POST['submit']))
 {
  $level=$_POST['level'];

  	if ($level==0)
  	{
  		$jalankan=shell_exec('sh /www/injen/script/level0.sh');
		$catatlog=mysql_query("insert into log (date,rincian) values (now(),'Level keamanan diubah ke level 0') ");
        	echo "<meta http-equiv='refresh' content='0;url=index.php?page=konfig'>";
       	$update0=mysql_query("UPDATE level SET level = '0' WHERE id = '1'");

  	}
  
  	if ($level==1)
  	{
  		$jalankan=shell_exec('sh /www/injen/script/level1.sh');
		$catatlog=mysql_query("insert into log (date,rincian) values (now(),'Level keamanan diubah ke level 1') ");
  		echo "<meta http-equiv='refresh' content='0;url=index.php?page=konfig'>";
       	$update1=mysql_query("UPDATE level SET level = '1' WHERE id = '1'");

  	}
	if ($level==2)
	{
		$jalankan=shell_exec('sh /www/injen/script/level2.sh');
		$catatlog=mysql_query("insert into log (date,rincian) values (now(),'Level keamanan diubah ke level 2') ");
		echo "<meta http-equiv='refresh' content='0;url=index.php?page=konfig'>";
		$update2=mysql_query("UPDATE level SET level = '2' WHERE id = '1'");
	}
	
	if ($level==3)
	{
		$jalankan=shell_exec('sh /www/injen/script/level3.sh');
		$catatlog=mysql_query("insert into log (date,rincian) values (now(),'Level keamanan diubah ke level 3') ");
		echo "<meta http-equiv='refresh' content='0;url=index.php?page=konfig'>";
		$update2=mysql_query("UPDATE level SET level = '3' WHERE id = '1'");
	}

}

?>


 
<!-- Modal Level-->
<div id="levelmodal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="Levelmodal" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
<h3 id="myModalLabel">Level Keamanan</h3>
</div>
<div class="modal-body">
	<p>Pilih Tingkat Level Keamanan</p>
	<form method="post" action="">
		<ul class="unstyled">
	<li><input type="radio" name="level" value="0" checked="checked" > Level 0 </input></li>
	<li><input type="radio" name="level" value="1" > Level 1 </input></li>
	<li><input type="radio" name="level" value="2" > Level 2 </input></li>
	<li><input type="radio" name="level" value="3" > Level 3 </input></li>
	</ul>
		
</div>
<div class="modal-footer">
<input name="submit" type="submit" class="btn btn-primary" value="Simpan">
</form>
</div>
</div>
</div>