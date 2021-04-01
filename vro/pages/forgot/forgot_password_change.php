<?php  
 
	@$name=$_GET['name'];
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
				  
                  <form class="forms-sample text-white" role="form" method="post" action="forgot_password_change.php">
                    <div class="form-group">
                      <label for="user">Username:</label>
                      <input type="text" class="form-control" id="user" name="user_name" value="<?php echo $name; ?>" readonly />
                    </div>
                    <div class="form-group">
                      <label for="n_pwd">New Password:</label>
                      <input type="password" class="form-control" id="n_pwd" name="n_pwd" value="" required />
                    </div>
					<div class="form-group">
                      <label for="n_pwd">Confirm Password:</label>
                      <input type="password" class="form-control" id="r_pwd" name="r_pwd" value="" required />
                    </div>
					<input class="btn btn-success mr-2" type="submit" value="Submit" name="submit" ></button>
					<input class="btn btn-success mr-2" type="reset" value="Reset" name="reset" >
                    <a class="btn btn-warning mr-2" href="../../index.php" >Back</a>
                  </form>
                </div>
              </div>
            </div>
		</div>	
	  </div>
	</body>
</html>	
<?php
include("../../database/db_conection.php");  
  
if(isset($_POST['submit']))  
{  
	if($_POST['n_pwd'] === $_POST['r_pwd']){
		//echo "<script>alert('Match')</script>";
		$user_name=$_POST['user_name'];
		
		//encrypt password
		$new_pass=$_POST['n_pwd'];
		$enc_new_pass = md5($new_pass);
		
		//check old password is correct or not
		$check_user="select id from users WHERE name='$user_name'";		//encrypt password
		
		$run=mysqli_query($dbcon,$check_user);
		
		if ($run->num_rows > 0) 
		{
			// output data of each row
			while($row = $run->fetch_assoc()) {
				$id = $row["id"]; 
			}
			
			//change old password to new password
			$check_user="update users set password= '".$enc_new_pass."' where id= '".$id."'";  
	  
			$run1=mysqli_query($dbcon,$check_user);  
			if($run1 != null)  
			{  
				session_unset();
				echo "<script>window.open('../../index.php','_self')</script>";    
		  
			}  
			else  
			{  
			  echo "<script>alert('New password is not Change!')</script>";  
			}
		}  
			
		else  
		{  
		  echo "<script>alert('Old password is incorrect!')</script>";  
		} 
		
		
		
	}else{
		echo "<script>alert('New password is mismatch.')</script>";
	}
  
}  
?>  