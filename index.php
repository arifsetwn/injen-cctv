<?php
//$_SESSION['name']= 'admin';
session_start();

if ($_SESSION["name"]== "admin"){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>i-njen CCTV Control Panel</title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
<style >
 body {
padding-top: 60px
 }
</style>
 <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
 <script type="text/javascript" src="js/bootstrap.js"></script>

<link href="css/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
    	  <div class="navbar-inner">
        	<div class="container">
                 <a class="brand" href="index.php?page=home">i-njen CCTV</a>
                    <div class="nav-collapse collapse">
          			  <ul class="nav">
              			<li <?php if ($_GET[page] == "home") { echo "class='active'" ;} ?> ><a href="index.php?page=home"><i class="icon-home icon-white"></i>Home</a></li>
              			<li <?php if ($_GET[page] == "about") { echo "class='active'" ;} ?> ><a href="index.php?page=about">About</a></li>
              			               			
            		</ul>
          			</div>

          			 <div class="nav-collapse collapse">
          			  <ul class="nav pull-right">
              			  <li class="dropdown">
					                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['name'] ;?> <i class="icon-user icon-white"> </i>  <b class="caret"></b></a>
					                <ul class="dropdown-menu">
					                  <li><a href="index.php?page=setting">Setting</a></li>
					                  <li><a href="logout.php">Logout</a></li>
					                  </ul>
					              </li>
              			
            		</ul>
          			</div>
          			      	
           </div>
      </div>
    </div

    
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header"><h4>Menu</h4></li>
              <li <?php if ($_GET[page] == "konfig") { echo "class='active'" ;} ?> ><a href="index.php?page=konfig">Level Keamanan</a></li>
              <li <?php if ($_GET[page] == "kamera") { echo "class='active'" ;} ?> ><a href="index.php?page=kamera">Kamera</a></li>
              <li <?php if ($_GET[page] == "notif") { echo "class='active'" ;} ?> ><a href="index.php?page=notif">Notifikasi</a></li>
      		<li <?php if ($_GET[page] == "storage") { echo "class='active'" ;} ?> ><a href="index.php?page=storage">Storage</a></li>
    	       <li <?php if ($_GET[page] == "alarm") { echo "class='active'" ;} ?> ><a href="index.php?page=alarm">Alarm</a></li>
              <li <?php if ($_GET[page] == "log") { echo "class='active'" ;} ?>><a href="index.php?page=log">Log</a></li>
            </ul>
          </div><!--/.well -->
      </div>
 		<div class="span9">
 			
      <?php
    if ($_GET[page] != "" && file_exists("page/$_GET[page].php")) {
      include ("page/$_GET[page].php");
    } else {
      include ("page/home.php");
    }
    ?> 
  


 		</div>
  </div>


  <?php
  include ('include/footer.php');
  ?>
  </div>


 
</body>
</html>

<?php
}
else
{
  header("location:login.php");
}

?>