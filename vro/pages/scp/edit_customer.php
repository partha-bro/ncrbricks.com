<?php
	$title = 'Edit Customer';
	require("../common/header.php");
	include("../../database/db_conection.php");
	
	$id = $_GET['id'];
		$result = mysqli_query($dbcon,"SELECT * FROM customer WHERE id='".$id."'")
		or die(mysqli_error($dbcon));
		$row = mysqli_fetch_array($result);
	
	if(isset($_POST['submit']))  
	{
		$new_name=$_POST['edit_name'];  
		$new_address=$_POST['edit_address']; 
		$new_m_no=$_POST['edit_m_no'];  
		$new_legal_name=$_POST['edit_legal_name']; 
		$new_gst_no=$_POST['edit_gst_no'];  
		$new_optional=$_POST['edit_optional'];
		
		$update_data="update `customer` set `name`= '".$new_name."',`address`= '".$new_address."',`m_no`='".$new_m_no."',`legal_name`= '".$new_legal_name."',`GST_no`= '".$new_gst_no."', `optional`= '".$new_optional."' where id='".$id."'";  
	  
			$run1=mysqli_query($dbcon,$update_data); 
			if($run1 != null)  
			{  
				echo "<script>window.open('customer.php','_self')</script>";    
		  
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
                  <h4 class="card-title"><b>Edit Customer Details</b></h4>
                  <form class="forms-sample" role="form" method="post" action="">
                    <div class="form-group">
                      <label class="control-label" for="name">Name:</label> 
                      <input class="form-control" id="name" name="edit_name" type="text" value="<?php echo $row['name']; ?>" autofocus>
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="address">Address:</label> 
						<input class="form-control" id="address" name="edit_address" type="text" value="<?php echo $row['address'];  ?>" required>
                     </div>
					<div class="form-group">
						<label class="control-label" for="m_no">M_No:</label>
						<input class="form-control" id="m_no" name="edit_m_no" type="text" value="<?php echo $row['m_no']; ?>" required>
					</div>
					<div class="form-group">
						<label class="control-label" for="legal_name">Legal Name:</label>
						<input class="form-control" id="legal_name" name="edit_legal_name" type="text" value="<?php echo $row['legal_name']; ?>" required>
					</div>
					<div class="form-group">
						<label class="control-label" for="gst_no">GST No:</label>
						<input class="form-control" id="gst_no" name="edit_gst_no" type="text" value="<?php echo $row['GST_no']; ?>" required>
					</div>
					<div class="form-group">
						<label class="control-label" for="optional">Optional</label>
						<input class="form-control" id="optional" name="edit_optional" type="text" value="<?php echo $row['optional']; ?>">
                    </div>
					
					<input class="btn btn-success mr-2" type="submit" value="Submit" name="submit" ></button>
					<input class="btn btn-success mr-2" type="reset" value="Reset" name="reset" >
                    <a class="btn btn-success mr-2" href="customer.php" >Back</a>
                  </form>
                </div>
              </div>
            </div>
			
			<?php } ?>
	

<?php
	include("../common/footer.php");
?>
