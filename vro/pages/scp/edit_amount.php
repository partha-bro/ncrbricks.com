<?php
	$title = 'Edit Amount';
	require("../common/header.php");
	include("../../database/db_conection.php");
	
	$id = $_GET['id'];
	$type = $_GET['type'];
	$result = mysqli_query($dbcon,"SELECT * FROM amount WHERE id='".$id."'")
		or die(mysqli_error($dbcon));
		$row = mysqli_fetch_array($result);
	
	if(isset($_POST['submit']))  
	{
		$date = $_POST['edit_date'];
		$new_name=$_POST['edit_name'];  
		$new_deposit=$_POST['edit_deposit']; 
		$new_method=$_POST['edit_method'];    
		$new_optional=$_POST['edit_optional']; 
		
		
		$update_data="update `amount` set `date`= '".$date."',`name`= '".$new_name."',`deposit`= '".$new_deposit."',`method`='".$new_method."',`optional`= '".$new_optional."' where id='".$id."'";  
	  
			$run1=mysqli_query($dbcon,$update_data); 
			if($run1 != null)  
			{  
				echo "<script>window.open('amount.php','_self')</script>";    
		  
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
                  <h4 class="card-title"><b>Edit Amount</b></h4>
                  <form class="forms-sample" role="form" method="post" action="">
                    <div class="form-group">
                      <label class="control-label" for="name">Name:</label> 
                      <?php
                      	if($type == 'transport'){
                      		// Run your query
							$result1 = mysqli_query($dbcon,"select vehicle_no from ".$type."")
							or die(mysqli_error($dbcon));
							//$row = mysqli_fetch_array($result);

							echo '<select class="form-control" name="edit_name" required>'; // Open your drop down box
							echo '<option>Select Name</option>';
							// Loop through the query results, outputing the options one by one
							while ($row1 = mysqli_fetch_array($result1)) {
								if($row1['vehicle_no'] == $row['vehicle_no']){
									echo '<option value="'.$row1['vehicle_no'].'" selected>'.$row1['vehicle_no'].'</option>';
								}else{
									echo '<option value="'.$row1['vehicle_no'].'">'.$row1['vehicle_no'].'</option>';
								}
							   
							}

							echo '</select>';
                      	}else{
                      		// Run your query
							$result1 = mysqli_query($dbcon,"select name from ".$type."")
							or die(mysqli_error($dbcon));
							//$row = mysqli_fetch_array($result);

							echo '<select class="form-control" name="edit_name" required>'; // Open your drop down box
							echo '<option>Select Name</option>';
							// Loop through the query results, outputing the options one by one
							while ($row1 = mysqli_fetch_array($result1)) {
								if($row1['name'] == $row['name']){
									echo '<option value="'.$row1['name'].'" selected>'.$row1['name'].'</option>';
								}else{
									echo '<option value="'.$row1['name'].'">'.$row1['name'].'</option>';
								}
							   
							}

							echo '</select>';
                      	}
										
					?>
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="edit_deposit">Deposit:</label> 
                      <input class="form-control" id="edit_deposit" name="edit_deposit" type="text" placeholder="Deposit" value="<?php echo $row['deposit']; ?>" required>
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="edit_method">Method:</label>
                      <input class="form-control" id="edit_method" name="edit_method" type="text" placeholder="Method" value="<?php echo $row['method']; ?>" required>
                    </div>
					<div class="form-group">
                      <label class="control-label" for="edit_optional">Optional</label>
                      <input class="form-control" id="edit_optional" name="edit_optional" type="text" placeholder="Optional" value="<?php echo $row['optional']; ?>">
                    </div>
					<div class="form-group">
                      <label class="control-label" for="edit_date">Date</label>
                      <input class="form-control" id="edit_date" name="date" type="date" value="<?php echo $row['date']; ?>" required>
                    </div>
					<input class="btn btn-success mr-2" type="submit" value="Submit" name="submit" ></button>
					<input class="btn btn-success mr-2" type="reset" value="Reset" name="reset" >
                    <a class="btn btn-success mr-2" href="amount.php" >Back</a>
                  </form>
                </div>
              </div>
            </div>
		</div>	
			<?php } ?>


<?php
	include("../common/footer.php");
?>
