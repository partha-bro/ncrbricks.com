<?php
	$title = 'Edit Daily Entry';
	require("../common/header.php");
	include("../../database/db_conection.php");
	
	$id = $_GET['id'];
		$result = mysqli_query($dbcon,"SELECT * FROM daily_entry WHERE id='".$id."'")
		or die(mysqli_error($dbcon));
		$row = mysqli_fetch_array($result);
	
	if(isset($_POST['submit']))  
	{
		$date = $_POST['edit_date'];
		
		$new_c_name=$_POST['edit_c_name'];  
		$new_c_qty=$_POST['edit_c_qty'];  
		$new_c_rate=$_POST['edit_c_rate'];  
		$new_vehicle_no=$_POST['edit_vehicle_no'];  
		$new_v_qty=$_POST['edit_v_qty'];  
		$new_v_rate=$_POST['edit_v_rate'];  
		$new_m_name=$_POST['edit_m_name'];  
		$new_m_qty=$_POST['edit_m_qty'];  
		$new_m_rate=$_POST['edit_m_rate'];  
		$new_address=$_POST['edit_address'];
		
		
		$update_data="update `daily_entry` set `date`= '".$date."',`c_name`= '".$new_c_name."',`c_qty`= '".$new_c_qty."',`c_rate`='".$new_c_rate."',`delivery_adds`= '".$new_address."',`vehicle_no`= '".$new_vehicle_no."', `v_qty`= '".$new_v_qty."', `v_rate`= '".$new_v_rate."', `m_name`= '".$new_m_name."', `m_qty`= '".$new_m_qty."', `m_rate`= '".$new_m_rate."' where id='".$id."'";  
	  
			$run1=mysqli_query($dbcon,$update_data); 
			if($run1 != null)  
			{  
				echo "<script>window.open('../common/home.php','_self')</script>";    
		  
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
                  <h4 class="card-title"><b>Edit Daily Entry</b></h4>
                  <form class="forms-sample" role="form" method="post" action="">
                            <div class="row form-group" >
								<div class="col-sm-2">
									<label class="control-label" for="customer">Customer:</label> 
								</div>
								<div class="col-sm-4 form-group">
									<?php
										// Run your query
										$result1 = mysqli_query($dbcon,"select name from customer")
										or die(mysqli_error($dbcon));
										//$row = mysqli_fetch_array($result);

										echo '<select class="form-control" name="edit_c_name" required>'; // Open your drop down box
										echo '<option>Select Customer Name</option>';
										// Loop through the query results, outputing the options one by one
										while ($row1 = mysqli_fetch_array($result1)) {
											if($row1['name'] == $row['c_name']){
												echo '<option value="'.$row1['name'].'" selected>'.$row1['name'].'</option>';
											}else{
												echo '<option value="'.$row1['name'].'">'.$row1['name'].'</option>';
											}
										   
										}

										echo '</select>';
									?>
								</div>
								
								<div class="col-sm-3">
									<input class="form-control" id="customer" name="edit_c_qty" type="text" placeholder="C_Quantity" value="<?php echo $row['c_qty']; ?>" autofocus required>
								</div>
								<div class="col-sm-3">
									<input class="form-control" id="customer" name="edit_c_rate" type="text" placeholder="C_Rate" value="<?php echo $row['c_rate']; ?>" autofocus required>
								</div>
                            </div>
							<div class="row form-group" >
								<div class="col-sm-2">
									<label class="control-label" for="transpoter">Transporter:</label> 
								</div>
								<!--<div class="col-sm-4">
									<input class="form-control" id="transpoter" name="edit_vehicle_no" type="text" value="<?php echo $row['vehicle_no']; ?>" placeholder="Vehicle No." autofocus required>
								</div-->
								<div class="col-sm-4 form-group">
									<?php
										// Run your query
										$result1 = mysqli_query($dbcon,"select vehicle_no from transport")
										or die(mysqli_error($dbcon));
										//$row = mysqli_fetch_array($result);

										echo '<select class="form-control" name="edit_vehicle_no" required>'; // Open your drop down box
										echo '<option>Select Vehicle No.</option>';
										// Loop through the query results, outputing the options one by one
										while ($row1 = mysqli_fetch_array($result1)) {
											if($row1['vehicle_no'] == $row['vehicle_no']){
												echo '<option value="'.$row1['vehicle_no'].'" selected>'.$row1['vehicle_no'].'</option>';
											}else{
												echo '<option value="'.$row1['vehicle_no'].'">'.$row1['vehicle_no'].'</option>';
											}
										   
										}

										echo '</select>';
									?>
								</div>
								<div class="col-sm-3">
									<input class="form-control" id="transpoter" name="edit_v_qty" type="text" value="<?php echo $row['v_qty']; ?>" placeholder="V_Quantity" autofocus required>
								</div>
								<div class="col-sm-3">
									<input class="form-control" id="transpoter" name="edit_v_rate" type="text" value="<?php echo $row['v_rate']; ?>" placeholder="V_Rate" autofocus required>
								</div>
                            </div>
							<div class="row form-group" >
								<div class="col-sm-2">
									<label class="control-label" for="manufacturer">Manufacturer:</label> 
								</div>
								<!--<div class="col-sm-4">
									<input class="form-control" id="manufacturer" name="edit_m_name" type="text" value="<?php echo $row['m_name']; ?>" placeholder="Manufacturer Name" autofocus required>
								</div>-->
								<div class="col-sm-4 form-group">
									<?php
										// Run your query
										$result1 = mysqli_query($dbcon,"select name from manufacture")
										or die(mysqli_error($dbcon));
										//$row = mysqli_fetch_array($result);

										echo '<select class="form-control" name="edit_m_name" required>'; // Open your drop down box
										echo '<option selected>Select Manufacturer Name</option>';
										// Loop through the query results, outputing the options one by one
										while ($row1 = mysqli_fetch_array($result1)) {
										   if($row1['name'] == $row['m_name']){
												echo '<option value="'.$row1['name'].'" selected>'.$row1['name'].'</option>';
											}else{
												echo '<option value="'.$row1['name'].'">'.$row1['name'].'</option>';
											}
										}

										echo '</select>';
									?>
								</div>
								<div class="col-sm-3">
									<input class="form-control" id="manufacturer" name="edit_m_qty" type="text" value="<?php echo $row['m_qty']; ?>" placeholder="M_Quantity" autofocus required>
								</div>
								<div class="col-sm-3">
									<input class="form-control" id="manufacturer" name="edit_m_rate" type="text" value="<?php echo $row['m_rate']; ?>" placeholder="M_Rate" autofocus required>
								</div>
                            </div>
                            <div class="row form-group">
								<div class="col-sm-2">
									<label class="control-label" for="address">Address:</label> 
								</div>
								<div class="col-sm-10">
									<input class="form-control" id="address" name="edit_address" type="text" value="<?php echo $row['delivery_adds']; ?>" placeholder="Delivery Address" required>
								</div>
                            </div>
							<div class="row form-group">
								<div class="col-sm-2">
									<label class="control-label" for="edit_date">Date</label>
							  </div>
								<div class="col-sm-10">
									<input class="form-control" id="edit_date" name="edit_date" type="date" value="<?php echo $row['date']; ?>" required>
							  </div>
							</div>

							<div>
								<input class="btn btn-success mr-2" type="submit" value="Submit" name="submit" >
								<input class="btn btn-success mr-2" type="reset" value="Reset" name="reset" >
								<a class="btn btn-success mr-2" href="../common/home.php" >Back</a>
							</div>
                      </form>
                </div>
              </div>
            </div>
			<?php } ?>
	
<?php
	include("../common/footer.php");
?>
