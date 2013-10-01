<?php
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>i-njen CCTV Control Panel</title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
 <link href="css/datepicker.css" rel="stylesheet" type="text/css" />
<style >
 body {
padding-top: 60px;
}
.warnabg {
background-color:#959394;
  }
 
</style>
 <link href="css/bootstrap-responsive.css" rel="stylesheet" type="text/css" />

  <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
 <script type="text/javascript" src="js/bootstrap.js"></script>
 <script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
 <script type="text/javascript">
$(function(){
      
  $('#date').datepicker();
    
    });
 </script>
</head>
<body class="warnabg">
<div class="container">




<div class="span7">
  <img src="img/cctv2.jpg">
  </div>
  <?php

$cektgl=shell_exec('cat /www/injen/date.txt');

if ($cektgl == 1 )
{
?>
 <div class="span3 hero">
  <form method="post" action="" >
  <fieldset>
    <h2>Setting Tanggal</h2>
    <hr>
    <label> Tahun</label>
    <input type="text" name="tgl" value="2013-1-1" data-date-format="yyyy-mm-dd" id="date" >
    <label> Waktu</label>
    <input type="text"  name="wkt" placeholder="hh:mm">
    <input name="submit" type="submit" class="btn btn-primary" value="Simpan">
    </fieldset>
      </form>

 </div>
                
<?php
  if(isset($_POST['submit']))
  {
    $tgl=$_POST["tgl"];
    $wkt=$_POST["wkt"];
    $cektgl=shell_exec(`date -s "$tgl $wkt"`);
    $aturdate=shell_exec(`echo "$tgl $wkt"0 > /www/injen/date.txt`); 
    $backuplogcam=shell_exec('sh /www/injen/script/backuplogin.sh');
    echo "<meta http-equiv='refresh' content='0;url=index.php'>";

  }


}
else
{

?>

  <div class="span3 hero">
      <form class="form-signin" method="post" action="">
        <h2 class="form-signin-heading">Silahkan Login</h2>
        <hr>
        <input type="text" class="input-block-level" name="username" placeholder="Username">
        <input type="password" class="input-block-level" name="passwd" placeholder="Password">
        <input name="submit" type="submit" class="btn btn-primary" value="Login">
      </form>
    <?php
     include 'koneksi.php';
        if(isset($_POST['submit']))
           {
           
            $username=$_POST['username'];
            $passwd=md5($_POST['passwd']);
		
          $login=mysql_query("select * from user where username='$username' and passwd='$passwd'")or die (mysql_error());
          $rowcount = mysql_num_rows($login);
          if ($rowcount==1){
	   
	   $_SESSION['name'] = $username;
   	   $updatelog=mysql_query("insert into log (date,rincian) values (now(),'username $username masuk ke sistem') ");
 				
	   echo "<meta http-equiv='refresh' content='1;url=index.php'>";
          echo "<div class='alert alert-block'><img src='img/loader.gif'> Processing..</div>";
          }
          else
            {
		$updatelog=mysql_query("insert into log (date,rincian) values (now(),'percobaan login gagal') ");
              echo "<div class='alert alert-block'>Username / Password Salah </div>";
            }
          }
           ?>
    </div>
     

    </div> 
 


</body>
</html>

<?php
}
?>