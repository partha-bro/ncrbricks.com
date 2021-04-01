<?php
	$title = 'Transport';
	require("../common/header.php");
?>

<!-- partial -->
<script>
	var id;
	function myDelete(id){
		var txt;
		var r = confirm("Are you sure!");
		if (r == true) {
			window.location = "del_transport.php?id="+id;
		  
		} else {

		} 
	}
	document.getElementById('transport').classList.add("bg-primary");
</script>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
					<div class="row">
						<div class="col-lg-3 grid-margin stretch-card">
							<h4 >Transport Details</h4>
						</div>
						<div class="col-lg-4 grid-margin stretch-card">
							
						</div>
						<div class="col-lg-4 grid-margin stretch-card">
							
						</div>
						<div class="col-lg-1 grid-margin stretch-card">
							<a class="btn btn-success" href="add_transport.php">New</a>
						</div>
					</div>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead class="bg-primary text-white">
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            Name
                          </th>
                          <th>
                            M_No.
                          </th>
                          <th>
                            Vehicle No.
                          </th>
                          <th>
                            Optional
                          </th>
						  <th>
                            Report
                          </th>
						  <!--<th>
                            Edit
                          </th>-->
						   <?php 
									if($_SESSION['user_name'] == "admin"){
										echo "<th  >Edit</th>";
										echo "<th  >Delete</th>";
									}else{
										echo "<th  style='display:none'>Edit</th>";
										echo "<th  style='display:none'>Delete</th>";
									}
								?>
                        </tr>
                      </thead>
<?php  
  
			include("../../database/db_conection.php");

			$result = mysqli_query($dbcon,"SELECT * FROM transport")

			or die(mysqli_error());

			while($row = mysqli_fetch_array( $result )) {
				
					  echo "<tbody>";
						echo "<tr>";
						echo  "<th scope='row'>".$row['id']."</th>";
						echo  "<td>".$row['name']."</td>";
						echo  "<td>".$row['m_no']."</td>";
						echo  "<td>".$row['vehicle_no']."</td>";
						echo  "<td>".$row['optional']."</td>";
						echo  "<td ><a class='btn btn-info' href='report.php?name=" . $row['name'] . "&type=transport'>Report</a></td>";
						//echo  "<td ><a href='edit_transport.php?id=" . $row['id'] . "'>Edit</a></td>";
						if($_SESSION['user_name'] == "admin"){
							echo  "<td ><a class='btn btn-success' href='edit_transport.php?id=" . $row['id'] . "'>Edit</a></td>"; 
							echo  "<td ><a class='btn btn-danger text-white' onclick='myDelete(".$row['id'].")'>Delete</a></td>"; 
						}else{
							echo  "<td style='display:none'><a href='edit_transport.php?id=" . $row['id'] . "'>Edit</a></td>";
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