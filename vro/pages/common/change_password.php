<?php
	$title = 'Change Password';
	include("header.php");
?>
<script>
	document.getElementById('ch_pwd').classList.add("bg-primary");
</script>
			<div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><b>My Account Profile</b></h4>
				  
                  <form class="forms-sample" role="form" method="post" action="change_password.php">
                    <div class="form-group">
                      <label for="user">Username:</label>
                      <input type="text" class="form-control" id="user" name="user_name" placeholder="<?php  echo $_SESSION['user_name']; ?>"  value="<?php  echo $_SESSION['user_name']; ?>" readonly />
                    </div>
                    <div class="form-group">
                      <label for="o_pwd">Old Password:</label>
                      <input type="password" class="form-control" id="o_pwd" name="o_pwd" value="" required autofocus />
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
                    <a class="btn btn-success mr-2" href="home.php" >Back</a>
                  </form>
                </div>
              </div>
            </div>	
	</body>
</html>	
<?php
	include("footer.php");
?>
<?php
include("../../database/db_conection.php");  
  
if(isset($_POST['submit']))  
{  
	if($_POST['n_pwd'] === $_POST['r_pwd']){
		//echo "<script>alert('Match')</script>";
		$user_name=$_POST['user_name'];
		$old_pass=$_POST['o_pwd'];
		
		//encrypt password
		$new_pass=$_POST['n_pwd'];
		$enc_new_pass = md5($new_pass);
		
		//check old password is correct or not
		$check_user="select id from users WHERE name='$user_name'AND password='".md5($old_pass)."'";		//encrypt password
		
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