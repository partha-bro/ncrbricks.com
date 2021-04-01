<?php
	$title = 'Add Amount';
	require("../common/header.php");
	include("../../database/db_conection.php");
	$type = $_GET['type'];
?>

<div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><b>Add Amount Details</b></h4>
                  <form class="forms-sample" role="form" method="post" action="">
                    <div class="form-group">
                      <label class="control-label" for="name">Name:</label> 
                      <?php
                      	if($type == 'transport'){
                      		// Run your query
							$result = mysqli_query($dbcon,"select vehicle_no from ".$type."")  
							or die(mysqli_error($dbcon));
							//$row = mysqli_fetch_array($result);

							echo '<select class="form-control" name="name" required>'; // Open your drop down box
							echo '<option selected>Select Name</option>';
							// Loop through the query results, outputing the options one by one
							while ($row = mysqli_fetch_array($result)) {
							   echo '<option value="'.$row['vehicle_no'].'">'.$row['vehicle_no'].'</option>';
							}

							echo '</select>';
                      	}else{
	                  		// Run your query
							$result = mysqli_query($dbcon,"select name from ".$type."")  
							or die(mysqli_error($dbcon));
							//$row = mysqli_fetch_array($result);

							echo '<select class="form-control" name="name" required>'; // Open your drop down box
							echo '<option selected>Select Name</option>';
							// Loop through the query results, outputing the options one by one
							while ($row = mysqli_fetch_array($result)) {
							   echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
							}

							echo '</select>';
                      	}
											
						?>
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="deposit">Deposit:</label> 
                      <input class="form-control" id="deposit" name="deposit" type="text" value="" required>
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="method">Method:</label>
                      <input class="form-control" id="method" name="method" type="text" value="" required>
                    </div>
					<div class="form-group">
                      <label class="control-label" for="optional">Optional</label>
                      <input class="form-control" id="optional" name="optional" type="text" value="">
                    </div>
					<div class="form-group">
                      <label class="control-label" for="date">Date</label>
                      <input class="form-control" id="date" name="date" type="date" value="" required>
                    </div>
					<input class="btn btn-success mr-2" type="submit" value="Submit" name="submit" ></button>
					<input class="btn btn-success mr-2" type="reset" value="Reset" name="reset" >
                    <a class="btn btn-success mr-2" href="amount.php" >Back</a>
                  </form>
                </div>
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
		$name=$_POST['name'];  
		$deposit=$_POST['deposit']; 
		$method=$_POST['method'];    
		$optional=$_POST['optional']; 
		$type = $_GET['type'];
		
		$sql = "INSERT INTO amount (name_type, name, deposit, method, date, optional)
		VALUES ('$type', '$name', '$deposit', '$method' , '$date', '$optional')";

		if ($dbcon->query($sql) === TRUE) {
			echo "<script>console.log('try send msg');</script>";
			$message = "";
			if($type == 'customer'){
				$message = "Dear ".$name.", you have deposit Rs".$deposit." by cash/chqeque due amount Rs ";
			}else if($type == 'transport'){
				$message = "Dear ".$name.", you have received Rs".$deposit." by cash/chqeque due amount Rs ";
			}else{
				$message = "Dear ".$name.", you have received Rs".$deposit." by cash/chqeque due amount Rs ";
			}
			echo "<script>window.open('send_add_deposite.php?op=add&type=".$type."&name=".$name."&msg=".$message."','_self')</script>";  
			//echo "<script>window.open('amount.php','_self')</script>";   
		} else {
			echo "Error: " . $sql . "<br>" . $dbcon->error;
		}
	}
		$dbcon->close();
?>
