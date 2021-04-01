<?php  

	@$name=$_GET['name'];
	@$id=$_GET['id'];
	$id=base64_decode($id);
 
include("../../database/db_conection.php");	

		$check_user="select mail from users WHERE name='$name'";
		
		$run=mysqli_query($dbcon,$check_user);
		
		if ($run->num_rows > 0) 
		{
			// output data of each row
			while($row = $run->fetch_assoc()) {
				@$mail = $row["mail"]; 
			}
		}
 //$recipient=@$mail;
 //$subject="OTP for forgot password";
 //$mail_body="Your OTP is ".$id;
 //mail($recipient, $subject, $mail_body);
 
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
      <div class="content d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
			<div class="col-lg-4 mx-auto">
				<div class="auto-form-wrapper text-white">
					<p align="center" style="font-family:zefani;font-weight: bold;font-size: 2em;font-style: oblique;">Forgot Password</p>
					
					
				  <form role="form" class="text-white" method="post" action="forgot_password.php">
					<div class="form-group">
					  <label class="label">Username</label>
					  <div class="input-group">
						<input type="text" class="form-control" placeholder="" id="user_name" name="user_name" value="" autofocus required>
					  </div>
					</div>
					<div class="form-group">
					  <label class="label">Mail</label>
					  <div class="input-group">
						<input type="text" class="form-control" placeholder="" id="mail" name="mail" value="" autofocus required>
					  </div>
					</div>
					
					<div class="form-group">
					  <!--<button class="btn btn-primary submit-btn btn-block">Login</button>-->
					  <table>
						<tr>
							<td style="width:100%"><input class="btn btn-primary submit-btn btn-block" type="submit" value="send" id="send" name="send"/></td>
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
  <script src="js/bootstrap.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/jquery.min.js"></script>
  <!-- endinject -->
</body>

</html>

<?php  

if(isset($_POST['send']))  
{  
	$user_name=$_POST['user_name'];
	$mail=$_POST['mail'];
	
	$check_user="select name,mail from users WHERE name='$user_name' and mail='$mail'";
		
		$run=mysqli_query($dbcon,$check_user);
		
		if ($run->num_rows > 0) 
		{
			$id = rand(0000,9999);
			$id = base64_encode($id);
			//change old password to new password
			$check_user="update users set code= '".$id."' where name= '".$user_name."'";  
	  
			$run1=mysqli_query($dbcon,$check_user); 
			echo "<script>window.open('forgot_password_code.php?name=".$user_name."&mail=".$mail."','_self')</script>";  
		}else{
			echo "<script>alert('Wrong username or email!')</script>";
		}
	
	//echo "<script>window.open('pages/common/home.php','_self')</script>";  
  
}

?>