<?php  
session_start();//session starts here  

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="img/favicon.png" />
  
  <script>
	function forgot_pwd(){
		var url = "pages/forgot/forgot_password.php";
		window.open(url,'_self');
	}
  </script>
</head>

<body id="body_id">
  <div class="container body_div_login">
    <div class="container page-body-wrapper full-page-wrapper auth-page">
      <div class="container page-body-wrapper full-page-wrapper auth-page">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">
				<div class="">
				<img src="img/favicon.png" height="30%" width="30%"/>
				<p class="text-white" style="font-family:zefani;font-weight: bold;font-size: 3em;font-style: oblique; float:right">Login Portal</p>
				</div>
              <form role="form" method="post">
                <div class="form-group">
                  <label class="label text-white">Username</label>
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="" name="user_name" id="user_name" autofocus required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="label text-white">Password</label>
                  <div class="input-group">
                    <input type="password" class="form-control" placeholder=""  name="pass_word" value="" required>
                  </div>
                </div>
                <div class="form-group">
                  <!--<button class="btn btn-primary submit-btn btn-block">Login</button>-->
				  <table>
					<tr>
						<td style="width:80%"><input class="btn btn-primary submit-btn btn-block" type="submit" value="Login" name="login" /></td>
						<td ><a class="btn btn-warning btn-block text-dark" onclick='forgot_pwd()'  >Forgot Password</a></td>
					</tr>
				  </table>
                </div>
            
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
   <!--JavaScript at end of body for optimized loading-->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/jquery.min.js"></script>
</body>

</html>

<?php  
  
include("database/db_conection.php");  
  
if(isset($_POST['login']))  
{  
    $user_name=$_POST['user_name'];  
    $user_pass=$_POST['pass_word'];  
  
    $check_user="select * from users WHERE name='$user_name'AND password='".md5($user_pass)."'";  	//encrypt password
  
    $run=mysqli_query($dbcon,$check_user);  
  
    if(mysqli_num_rows($run))  
    {  
        echo "<script>window.open('pages/common/home.php','_self')</script>";  
  
        $_SESSION['user_name']=$user_name;//here session is used and value of $user_name store in $_SESSION.  
  
    }  
    else  
    {  
		echo "<script>alert('username or password is incorrect!')</script>";  
    }  
}  
?>  