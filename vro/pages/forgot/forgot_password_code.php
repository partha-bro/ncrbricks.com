<?php  
 
	@$name=$_GET['name'];
	@$mail=$_GET['mail'];
 
include("../../database/db_conection.php");	

		$check_user="select code from users WHERE name='$name'";
		
		$run=mysqli_query($dbcon,$check_user);
		
		if ($run->num_rows > 0) 
		{
			// output data of each row
			while($row = $run->fetch_assoc()) {
				@$code = $row["code"]; 
			}
		}
 $code = base64_decode($code);
 $recipient=@$mail;
 $subject="OTP for forgot password";
 $mail_body="Your OTP is ".$code;
 $headers = "From: support@ncrbricks.com";
 //echo "<script>alert('".$code."')</script>";
 mail($recipient, $subject, $mail_body,$headers);
 
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Forgot Password</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../css/bootstrap.min.css">

  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../img/favicon.png" />
  
</head>

<body id="body_id">
  <div class="container body_div_login">
    <div class="container page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
			<div class="col-lg-4 mx-auto">
				<div class="auto-form-wrapper text-white">
					<p align="center" style="font-family:zefani;font-weight: bold;font-size: 2em;font-style: oblique;">Forgot Password</p>
					<h4 class="footer-text text-center"><b>Please check your mail for OTP.</b></h4>
					
				  <form role="form" class="text-white" method="post" action="">
					<div class="form-group">
					  <label class="label">Username</label>
					  <div class="input-group">
						<input type="text" class="form-control" placeholder="" id="user_name" name="user_name" value="<?php echo $name; ?>" autofocus required readonly>
					  </div>
					</div>
					<div class="form-group">
					  <label class="label">OTP</label>
					  <div class="input-group">
						<input type="text" class="form-control" placeholder="" id="code" name="code" value="" autofocus required>
					  </div>
					</div>
					
					<div class="form-group">
					  <!--<button class="btn btn-primary submit-btn btn-block">Login</button>-->
					  <table>
						<tr>
							<td style="width:100%"><input class="btn btn-primary submit-btn btn-block" type="submit" value="OK" id="send" name="send"/></td>
							<td ><a class="btn btn-warning btn-block" href="../../index.php" >Cancel</a></td>
						</tr>
					  </table>
					</div>
				  </form>
					
				</div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <script src="../../vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/misc.js"></script>
  <!-- endinject -->
</body>

</html>

<?php  

if(isset($_POST['send']))  
{  
	$id=$_POST['code'];
	$id=base64_encode($id);
	//echo "<script>alert('".$id.",".$user_name."')</script>";
	$check_user="select code from users WHERE code='$id' and name='$name'";
		
		$run=mysqli_query($dbcon,$check_user);
		
		if ($run->num_rows > 0) 
		{
			//echo "<script>alert('code is correct!')</script>";
			echo "<script>window.open('forgot_password_change.php?name=".$name."','_self')</script>"; 
			
			$check_user="update users set code= ' ' where name= '$name'";  
	  
			$run1=mysqli_query($dbcon,$check_user); 
	}else{
		echo "<script>alert('code is not correct!')</script>";
	}
	//echo "<script>window.open('pages/common/home.php','_self')</script>";  
  
}

?>