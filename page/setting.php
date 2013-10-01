

<div class="span4">
<h2> Setting </h2>
<hr>
<blockquote>Form Ganti Password</blockquote>
<hr>
 <form name="passwdform" method="post" action="" onSubmit="return validateForm()">
 	<fieldset>
 		<label> Masukkan Password Lama</label>
        <input type="password" class="input-block-level" name="passwdlama" placeholder="Password Lama">
        <label> Masukkan Password Baru</label>
        <input type="password" class="input-block-level" name="passwd" placeholder="Password Baru">
        <label> Masukkan Kembali Password Baru</label>
        <input type="password" class="input-block-level" name="passwdbaru" placeholder="Konfirmasi Password Baru">
        <input name="submit" type="submit" class="btn btn-primary" value="Simpan">
    </fieldset>
      </form>


  <?php
     include 'koneksi.php';
        if(isset($_POST['submit']))
           {
           		$passwordlama  = md5($_POST['passwdlama']);
				$passwordbaru1 = md5($_POST['passwd']);
				$passwordbaru2 = md5($_POST['passwdbaru']);

				$query=mysql_query("Select * from user where username='admin'") or die (mysql_error());
				$data = mysql_fetch_array($query);


				if ($data['passwd']== $passwordlama)
				{

					if ($passwordbaru1==$passwordbaru2)
						{
							$query = "UPDATE user SET passwd = '$passwordbaru2' WHERE username = 'admin' ";
							$hasil = mysql_query($query);
						if ($hasil) 
							{
                                 				 $catatlog=mysql_query("insert into log (date,rincian) values (now(),'Password Admin diubah') ");
								 echo "<div class='alert alert-success'>Update Password Admin Sukses</div>";
							}

						}
					else
						 echo "<div class='alert alert-error'> Konfirmasi Password Baru Berbeda </div>";

					}
				
					else
					 {
					  echo "<div class='alert alert-error'>Password Lama Salah</div>";
					 } 

			}

    ?>


  </div>


<script type="text/javascript">


function validateForm()
{
var x=document.forms["passwdform"]["passwdlama"].value;
if (x==null || x=="")
  {
  alert("Password Lama Harus diisi");
  return false;
  }

var x=document.forms["passwdform"]["passwd"].value;
if (x==null || x=="")
  {
  alert("Password Baru Harus diisi");
  return false;
  }

var x=document.forms["passwdform"]["passwdbaru"].value;
if (x==null || x=="")
  {
  alert("Konfirmasi Password Baru Harus diisi");
  return false;
  }

}

</script>
