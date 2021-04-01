<?php
	$title = 'Customer';
	require("../common/header.php");
?>
<!-- partial -->
<script>
	var id;
	function myDelete(id){
		var txt;
		var r = confirm("Are you sure!");
		if (r == true) {
			window.location = "del_customer.php?id="+id;
		  
		} else {

		} 
	}
	document.getElementById('customer').classList.add("bg-primary");
</script>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
					<div class="row">
						<div class="col-lg-3 grid-margin stretch-card">
							<h4 >Customer Details</h4>
						</div>
						<div class="col-lg-4 grid-margin stretch-card">
							
						</div>
						<div class="col-lg-4 grid-margin stretch-card">
							
						</div>
						<div class="col-lg-1 grid-margin stretch-card">
							<a class="btn btn-success" href="add_customer.php">New</a>
						</div>
					</div>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead class="bg-primary text-white">
                        <tr>
                         	  <th scope="col">#</th>
							  <th scope="col">Name</th>
							  <th scope="col">Address</th>
							  <th scope="col">M_No.</th>
							  <th scope="col">Legal Name</th>
							  <th scope="col">GST No.</th>
							  <th scope="col">Optional</th>
							  <th scope="col">Report</th>
							  <!--<th scope="col">Edit</th>-->
							   <?php 
									if($_SESSION['user_name'] == "admin"){
										echo "<th scope='col' >Edit</th>";
										echo "<th scope='col' >Delete</th>";
									}else{
										echo "<th scope='col' style='display:none'>Edit</th>";
										echo "<th scope='col' style='display:none'>Delete</th>";
									}
								?>
                        </tr>
                      </thead>
<?php  
  
			include("../../database/db_conection.php");

			$result = mysqli_query($dbcon,"SELECT * FROM customer")

			or die(mysqli_error());

			while($row = mysqli_fetch_array( $result )) {
				
					  echo "<tbody>";
						echo "<tr>";
						echo  "<th scope='row'>".$row['id']."</th>";
						echo  "<td>".$row['name']."</td>";
						echo  "<td>".$row['address']."</td>";
						echo  "<td>".$row['m_no']."</td>";
						echo  "<td>".$row['legal_name']."</td>";
						echo  "<td>".$row['GST_no']."</td>";
						echo  "<td>".$row['optional']."</td>";
						echo  "<td ><a class='btn btn-info' href='report.php?name=" . $row['name'] . "&type=customer'>Report</a></td>";
						//echo  "<td ><a href='edit_customer.php?id=" . $row['id'] . "'>Edit</a></td>";
						if($_SESSION['user_name'] == "admin"){
							echo  "<td ><a class='btn btn-success' href='edit_customer.php?id=" . $row['id'] . "'>Edit</a></td>"; 
							echo  "<td ><a class='btn btn-danger text-white' onclick='myDelete(".$row['id'].")'>Delete</a></td>"; 
						}else{
							echo  "<td style='display:none'><a href='edit_customer.php?id=" . $row['id'] . "'>Edit</a></td>";
							echo  "<td style='display:none'><a onclick='myDelete(".$row['id'].")'>Delete</a></td>";
						}
						echo  "</tr>";
				}
					  echo  "</tbody>";
?>		  
		</table>
		</div>
                </div>
              </div>
            </div>
			</div>
            </div>
          </div>
        </div>
	
	</body>
</html>

<?php
	include("../common/footer.php");
?>