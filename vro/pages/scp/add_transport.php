<?php
	$title = 'Add Transport';
	require("../common/header.php");
	include("../../database/db_conection.php");
?>

<div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><b>Add Transport Details</b></h4>
                  <form class="forms-sample" role="form" method="post" action="add_transport.php">
                    <div class="form-group">
							<label class="control-label" for="name">Name:</label> 
							<input class="form-control" id="name" name="name" type="text" value="" autofocus>
					</div>
					<div class="form-group">
							<label class="control-label" for="m_no">M_No:</label>
							<input class="form-control" id="m_no" name="m_no" type="text" value="" required>
					</div>
					<div class="form-group">
							<label class="control-label" for="vehicle_no">Vehicle No:</label>
							<input class="form-control" id="vehicle_no" name="vehicle_no" type="text" value="" required>
					</div>
					<div class="form-group">
							<label class="control-label" for="optional">Optional</label>
							<input class="form-control" id="optional" name="optional" type="text" value="">
					</div>
					<input class="btn btn-success mr-2" type="submit" value="Submit" name="submit" ></button>
					<input class="btn btn-success mr-2" type="reset" value="Reset" name="reset" >
                    <a class="btn btn-success mr-2" href="transport.php" >Back</a>
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
		$m_no=$_POST['m_no'];   
		$vehicle_no=$_POST['vehicle_no'];  
		$optional=$_POST['optional']; 
		
		$sql = "INSERT INTO transport (name, m_no, vehicle_no, optional)
		VALUES ('$name', '$m_no' , '$vehicle_no', '$optional')";

		if ($dbcon->query($sql) === TRUE) {
			echo "<script>window.open('transport.php','_self')</script>";   
		} else {
			echo "Error: " . $sql . "<br>" . $dbcon->error;
		}
	}
		$dbcon->close();
?>