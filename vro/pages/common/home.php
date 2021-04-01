<?php
	$title = 'Dashboard';
	include("header.php");
	
?>
	<!-- main body devlopmant -->
<!-- partial -->
<script>
	var id;
	function myDelete(id){
		var txt;
		var r = confirm("Are you sure!");
		if (r == true) {
			window.location = "../scp/del_daily_entry.php?id="+id;
		  
		} else {

		} 
	}
	document.getElementById('dashboard').classList.add("bg-primary");
</script>


<!-- main data -->
<div class='row mt-1'>
      <div class='col-md-2'>
        <h2 class='text-dark'>Daily Entry</h2>
      </div>
	  <div class="col-md-8">
		<form method="post" action=''>
			<span>From:<input type="date" name="date_from" value="" required /></span>
			<span >To:<input type="date" name="date_to" value="" required /></span>
			<input class="btn btn-success mr-2" type="submit" value="Check" name="submit">
		</form>
      </div>
	  <div class="col-md-1">
		<a class="btn btn-success" href="../tables/export.php">Export</a>
	  </div>
	  <div class="col-md-1">
		<a class="btn btn-success" href="../scp/add_daily_entry.php">New</a>
	  </div>
	 </div>
      <div class='col-lg-12'>
        <div class="table-responsive">
          <table class="table-bordered col-lg-12 text-center">
            <thead class="bg-primary text-white">
              <tr>
                <th >Trans_ID</th>
				  <th >Date(yyyy-mm-dd)</th>
				  <th >Customer</th>
				  <th >C_Quantity</th>
				  <th >C_Rate</th>
				  <th >Delivery_Adds.</th>
				  <th >Vehicle</th>
				  <th >V_Quantity</th>
				  <th >V_Rate</th>
				  <th >Manufacturer</th>
				  <th >M_Quantity</th>
				  <th >M_Rate</th>
				  <th >SMS Panel</th>
				  <!-- <th >Edit</th> -->
				  <?php 
							if($_SESSION['user_name'] == "admin"){
								echo "<th >Edit</th>";
								echo "<th >Delete</th>";
							}else{
								echo "<th  style='display:none'>Edit</th>";
								echo "<th  style='display:none'>Delete</th>";
							}
						?>
				</tr>
              </tr>
            </thead>

<?php  
  
			include("../../database/db_conection.php");
			
			if(isset($_POST['submit']))  
			{
					$date_from = $_POST['date_from'];
					$date_to = $_POST['date_to'];
					
					$result1 = mysqli_query($dbcon,"SELECT * FROM daily_entry where date >= '$date_from' and date <= '$date_to' ORDER BY date DESC");

				while($row1 = mysqli_fetch_array( $result1 )) {
					
						  echo "<tbody>";
							echo "<tr>";
							echo  "<th scope='row'>".$row1['id']."</th>";
							echo  "<td>".$row1['date']."</td>";
							echo  "<td>".$row1['c_name']."</td>";
							echo  "<td>".$row1['c_qty']."</td>";
							echo  "<td>".$row1['c_rate']."</td>";
							echo  "<td>".$row1['delivery_adds']."</td>";
							echo  "<td>".$row1['vehicle_no']."</td>";
							echo  "<td>".$row1['v_qty']."</td>";
							echo  "<td>".$row1['v_rate']."</td>";
							echo  "<td>".$row1['m_name']."</td>";
							echo  "<td>".$row1['m_qty']."</td>";
							echo  "<td>".$row1['m_rate']."</td>";
							echo  "<td ><a class='btn btn-info' href='send_info.php?id=" . $row1['id'] . "'>msg</a></td>";
							//echo  "<td ><a href='../scp/edit_daily_entry.php?id=" . $row1['id'] . "'>Edit</a></td>";
							if($_SESSION['user_name'] == "admin"){
								echo  "<td ><a class='btn btn-success' href='../scp/edit_daily_entry.php?id=" . $row1['id'] . "'>Edit</a></td>"; 
								echo  "<td ><a class='btn btn-danger text-white' onclick='myDelete(".$row1['id'].")'>Delete</a></td>"; 
							}else{
								echo  "<td style='display:none'><a class='btn btn-success' href='../scp/edit_daily_entry.php?id=" . $row1['id'] . "'>Edit</a></td>";
								echo  "<td style='display:none'><a class='btn btn-danger text-white' onclick='myDelete(".$row1['id'].")'>Delete</a></td>";
							}
							echo  "</tr>";
					}
						  echo  "</tbody>";
			}else {
		
				$result = mysqli_query($dbcon,"SELECT * FROM daily_entry ORDER BY date DESC")

				or die(mysqli_error());

				while($row = mysqli_fetch_array( $result )) {
					
						  echo "<tbody>";
							echo "<tr>";
							echo  "<th scope='row'>".$row['id']."</th>";
							echo  "<td>".$row['date']."</td>";
							echo  "<td>".$row['c_name']."</td>";
							echo  "<td>".$row['c_qty']."</td>";
							echo  "<td>".$row['c_rate']."</td>";
							echo  "<td>".$row['delivery_adds']."</td>";
							echo  "<td>".$row['vehicle_no']."</td>";
							echo  "<td>".$row['v_qty']."</td>";
							echo  "<td>".$row['v_rate']."</td>";
							echo  "<td>".$row['m_name']."</td>";
							echo  "<td>".$row['m_qty']."</td>";
							echo  "<td>".$row['m_rate']."</td>";
							echo  "<td ><a class='btn btn-info' href='send_info.php?id=" . $row['id'] . "'>msg</a></td>";
							if($_SESSION['user_name'] == "admin"){
								echo  "<td ><a class='btn btn-success' href='../scp/edit_daily_entry.php?id=" . $row['id'] . "'>Edit</a></td>"; 
								echo  "<td ><a class='btn btn-danger text-white' onclick='myDelete(".$row['id'].")'>Delete</a></td>"; 
							}else{
								echo  "<td style='display:none'><a class='btn btn-success' href='../scp/edit_daily_entry.php?id=" . $row['id'] . "'>Edit</a></td>";
								echo  "<td style='display:none'><a class='btn btn-danger text-white' onclick='myDelete(".$row['id'].")'>Delete</a></td>";
							}
							echo  "</tr>";
					}
						  echo  "</tbody>";
						  
			}
?>		  
				    </table>
				  </div>
                </div>
              </div>
	</body>
</html>					  
			
<?php
	include("footer.php");
?>