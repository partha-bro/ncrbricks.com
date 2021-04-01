<?php
	$title = 'Profile';
	include("header.php");
	$name = $_SESSION['user_name'];
	
	include("../../database/db_conection.php");  
	
	//check old password is correct or not
		$check_user="select mail,time from users WHERE name='$name'";		//encrypt password
		
		$run=mysqli_query($dbcon,$check_user);
		
		if ($run->num_rows > 0) 
		{
			// output data of each row
			while($row = $run->fetch_assoc()) {
				$mail = $row["mail"]; 
				$time = $row["time"]; 
			}
			
		}  
?>
<script>
	document.getElementById('profile').classList.add("bg-primary");
</script>
			<div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><b>My Account Profile</b></h4>
				  
                  <form class="forms-control" role="form" method="post" action="profile.php">
                    <div class="form-group">
                      <label for="user">Username:</label>
                      <input type="text" class="form-control" id="user" name="user_name" value="<?php  echo $name; ?>" readonly />
                    </div>
                    <div class="form-group">
                      <label for="o_pwd">Mail</label>
                      <input type="mail" class="form-control" id="mail" name="mail" value="<?php  echo $mail; ?>" required autofocus />
                    </div>
                    <div class="form-group">
                      <label for="n_pwd">New Password:</label>
                      <input type="text" class="form-control" id="time" name="time" value="<?php  echo $time; ?>" readonly/>
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

  
if(isset($_POST['submit']))  
{  

		$user_name=$_POST['user_name'];
		$mail=$_POST['mail'];

		
		//check old password is correct or not
		$check_user="select id from users WHERE name='$user_name'";		
		
		$run=mysqli_query($dbcon,$check_user);
		
		if ($run->num_rows > 0) 
		{
			// output data of each row
			while($row = $run->fetch_assoc()) {
				$id = $row["id"]; 
			}
			
			//change old password to new password
			$check_user="update users set mail= '".$mail."' where id= '".$id."'";  
	  
			$run1=mysqli_query($dbcon,$check_user);  
			if($run1 != null)  
			{  
				echo "<script>window.open('home.php','_self')</script>";    
		  
			}  
			else  
			{  
			  echo "<script>alert('Mail is not Change!')</script>";  
			}
		}  
			

}  
?>  