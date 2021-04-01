<?php
	$title = 'Daily Entry';
	require("../common/header.php");
	include("../../database/db_conection.php");
?>

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title"><b>Daily Entry</b></h4>
			<form class="forms-sample" role="form" method="post" action="add_daily_entry.php">
				<div class="row form-group" >
					<div class="col-sm-2">
						<label class="control-label" for="customer">Customer:</label> 
					</div>
					<div class="col-sm-4 form-group">
						<?php
							// Run your query
							$result = mysqli_query($dbcon,"select name from customer")
							or die(mysqli_error($dbcon));
							//$row = mysqli_fetch_array($result);

							echo '<select class="form-control" name="c_name" required>'; // Open your drop down box
							echo '<option selected>Select Customer Name</option>';
							// Loop through the query results, outputing the options one by one
							while ($row = mysqli_fetch_array($result)) {
							   echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
							}

							echo '</select>';
						?>
					</div>
					<div class="col-sm-3">
						<input class="form-control" id="customer" name="c_qty" type="text" value="" placeholder="C_Quantity" autofocus required>
					</div>
					<div class="col-sm-3">
						<input class="form-control" id="customer" name="c_rate" type="text" value="" placeholder="C_Rate" autofocus required>
					</div>
				</div>
				<div class="row form-group" >
					<div class="col-sm-2">
						<label class="control-label" for="transpoter">Transporter:</label> 
					</div>
					<div class="col-sm-4 form-group">
						<?php
							// Run your query
							$result = mysqli_query($dbcon,"select vehicle_no from transport")
							or die(mysqli_error($dbcon));
							//$row = mysqli_fetch_array($result);

							echo '<select class="form-control" name="vehicle_no" required>'; // Open your drop down box
							echo '<option selected>Select Vehicle No.</option>';
							// Loop through the query results, outputing the options one by one
							while ($row = mysqli_fetch_array($result)) {
							   echo '<option value="'.$row['vehicle_no'].'">'.$row['vehicle_no'].'</option>';
							}

							echo '</select>';
						?>
					</div>
					<div class="col-sm-3">
						<input class="form-control" id="transpoter" name="v_qty" type="text" value="" placeholder="V_Quantity" autofocus required> 
					</div>
					<div class="col-sm-3">
						<input class="form-control" id="transpoter" name="v_rate" type="text" value="" placeholder="V_Rate" autofocus required>
					</div>
				</div>
				<div class="row form-group" >
					<div class="col-sm-2">
						<label class="control-label" for="manufacturer">Manufacturer:</label> 
					</div>
					<div class="col-sm-4 form-group">
						<?php
							// Run your query
							$result = mysqli_query($dbcon,"select name from manufacture")
							or die(mysqli_error($dbcon));
							//$row = mysqli_fetch_array($result);

							echo '<select class="form-control" name="m_name" required>'; // Open your drop down box
							echo '<option selected>Select Manufacturer Name</option>';
							// Loop through the query results, outputing the options one by one
							while ($row = mysqli_fetch_array($result)) {
							   echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
							}

							echo '</select>';
						?>
					</div>
					<div class="col-sm-3">
						<input class="form-control" id="manufacturer" name="m_qty" type="text" value="" placeholder="M_Quantity" autofocus required> 
					</div>
					<div class="col-sm-3">
						<input class="form-control" id="manufacturer" name="m_rate" type="text" value="" placeholder="M_Rate" autofocus required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" for="address">Address:</label> 
					</div>
					<div class="col-sm-10">
						<input class="form-control" id="address" name="address" type="text" value="" placeholder="Delivery Address" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" for="date">Date</label>
				  </div>
					<div class="col-sm-10">
						<input class="form-control" id="date" name="date" type="date" value="" required>
				  </div>
				</div>
						
				<input class="btn btn-success mr-2" type="submit" value="Submit" name="submit" ></button>
				<input class="btn btn-success mr-2" type="reset" value="Reset" name="reset" >
				<a class="btn btn-success mr-2" href="../common/home.php" >Back</a>
			</form>
        </div>
    </div>
</div>

<?php
	include("../common/footer.php");
?>
<?php
	  
  
	if(isset($_POST['submit']))  
	{ 
		if(isset($_POST['date'])){
			$date = $_POST['date'];
		}else{
			$date = date("Y-m-d");
		}
		//$date = date("Y-m-d");
		$c_name=$_POST['c_name'];  
		$c_qty=$_POST['c_qty'];  
		$c_rate=$_POST['c_rate'];  
		$vehicle_no=$_POST['vehicle_no'];  
		$v_qty=$_POST['v_qty'];  
		$v_rate=$_POST['v_rate'];  
		$m_name=$_POST['m_name'];  
		$m_qty=$_POST['m_qty'];  
		$m_rate=$_POST['m_rate'];  
		$address=$_POST['address']; 
		
		
		$sql = "INSERT INTO daily_entry (date, c_name, c_qty, c_rate, delivery_adds, vehicle_no, v_qty, v_rate, m_name, m_qty, m_rate)
		VALUES ('$date', '$c_name', '$c_qty', '$c_rate' , '$address', '$vehicle_no', '$v_qty', '$v_rate', '$m_name', '$m_qty', '$m_rate')";

		if ($dbcon->query($sql) === TRUE) {
			//echo "<script>alert('".$date."')</script>";   


			$last_id = $dbcon->insert_id;
			echo "<script>window.open('../common/send_info.php?id=".$last_id."','_self')</script>";  
			//echo "<script>window.open('../common/home.php','_self')</script>";   
		} else {
			echo "Error: " . $sql . "<br>" . $dbcon->error;
		}
	}
		$dbcon->close();
?>