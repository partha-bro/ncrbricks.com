<?php
	$title = 'Edit Transport';
	require("../common/header.php");
	include("../../database/db_conection.php");
	
	$id = $_GET['id'];
		$result = mysqli_query($dbcon,"SELECT * FROM transport WHERE id='".$id."'")
		or die(mysqli_error($dbcon));
		$row = mysqli_fetch_array($result);
	
	if(isset($_POST['submit']))  
	{
		$new_name=$_POST['edit_name'];   
		$new_m_no=$_POST['edit_m_no'];   
		$new_vehicle_no=$_POST['edit_vehicle_no'];  
		$new_optional=$_POST['edit_optional'];
		
		$update_data="update `transport` set `name`= '".$new_name."',`m_no`='".$new_m_no."',`vehicle_no`= '".$new_vehicle_no."', `optional`= '".$new_optional."' where id='".$id."'";  
	  
			$run1=mysqli_query($dbcon,$update_data); 
			if($run1 != null)  
			{  
				echo "<script>window.open('transport.php','_self')</script>";    
		  
			}  
			else  
			{  
			  echo "<script>alert('Error!')</script>";  
			}
	}
	else{
		

?>

<div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><b>Edit Transport Details</b></h4>
                  <form class="forms-sample" role="form" method="post" action="">
                    <div class="form-group">
						<label class="control-label" for="name">Name:</label> 
						<input class="form-control" id="name" name="edit_name" type="text" value="<?php echo $row['name']; ?>" autofocus>
					</div>
					<div class="form-group">
						<label class="control-label" for="m_no">M_No:</label>
						<input class="form-control" id="m_no" name="edit_m_no" type="text" value="<?php echo $row['m_no']; ?>" required>
					</div>
					<div class="form-group">
						<label class="control-label" for="vehicle_no">Vehicle No:</label>
						<input class="form-control" id="vehicle_no" name="edit_vehicle_no" type="text" value="<?php echo $row['vehicle_no']; ?>" required>
					</div>
					<div class="form-group">
						<label class="control-label" for="optional">Optional</label>
						<input class="form-control" id="optional" name="edit_optional" type="text" value="<?php echo $row['optional']; ?>">
					</div>

					<input class="btn btn-success mr-2" type="submit" value="Submit" name="submit" ></button>
					<input class="btn btn-success mr-2" type="reset" value="Reset" name="reset" >
                    <a class="btn btn-success mr-2" href="transport.php" >Back</a>
                  </form>
                </div>
              </div>
            </div>
			<?php } ?>
	
<?php
	include("../common/footer.php");
?>
