<?php
	$title = 'Add Manufacture';
	require("../common/header.php");
	include("../../database/db_conection.php");
?>
	<div class="col-md-12 grid-margin stretch-card">
        <div class="card">
			<div class="card-body">
			  <h4 class="card-title"><b>Add Manufacture Details</b></h4>
				<form class="forms-sample" role="form" method="post" action="add_manufacture.php">
						<div class="form-group" >
							<label class="control-label" for="name">Name:</label> 
							<input class="form-control" id="name" name="name" type="text" value="" autofocus>
						</div>
						<div class="form-group">
							<label class="control-label" for="address">Address:</label> 
							<input class="form-control" id="address" name="address" type="text" value="" required>
						</div>
						<div class="form-group">
							<label class="control-label" for="m_no">M_No:</label>
							<input class="form-control" id="m_no" name="m_no" type="text" value="" required>
						</div>
						<div class="form-group">
							<label class="control-label" for="legal_name">Legal Name:</label>
							<input class="form-control" id="legal_name" name="legal_name" type="text" value="" required>
						</div>
						<div class="form-group">
							<label class="control-label" for="gst_no">GST No:</label>
							<input class="form-control" id="gst_no" name="gst_no" type="text" value="" required>
						</div>
						<div class="form-group">
							<label class="control-label" for="optional">Optional</label>
							<input class="form-control" id="optional" name="optional" type="text" value="">
						</div>
					<input class="btn btn-success mr-2" type="submit" value="Submit" name="submit" ></button>
					<input class="btn btn-success mr-2" type="reset" value="Reset" name="reset" >
					<a class="btn btn-success mr-2"  href="manufacture.php" >Back</a>
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
		$name=$_POST['name'];  
		$address=$_POST['address']; 
		$m_no=$_POST['m_no'];  
		$legal_name=$_POST['legal_name']; 
		$gst_no=$_POST['gst_no'];  
		$optional=$_POST['optional']; 
		
		$sql = "INSERT INTO manufacture (name, address, m_no, legal_name, GST_no, optional)
		VALUES ('$name', '$address', '$m_no' , '$legal_name', '$gst_no', '$optional')";

		if ($dbcon->query($sql) === TRUE) {
			echo "<script>window.open('manufacture.php','_self')</script>";   
		} else {
			echo "Error: " . $sql . "<br>" . $dbcon->error;
		}
	}
		$dbcon->close();
?>