<?php
	$title = 'Report';
	require("../common/header.php");
	include("../../database/db_conection.php");
	$name = $_GET['name'];
	$type = $_GET['type'];
?>

<!-- partial -->
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
					<div class="row">
						<div class="col-lg-3 grid-margin stretch-card">
							<h4 ><b><?php echo $name; ?> report</b></h4>
						</div>
						<div class="col-lg-4 grid-margin stretch-card">
							
						</div>
						<div class="col-lg-5 grid-margin stretch-card">
							<form method="post" action='<?php echo "pdf/index.php?id=".$name."&type=".$type; ?> '>
								<span >From:<input type="date" name="date_from" value="" required /></span>&nbsp;&nbsp;&nbsp;&nbsp;
								<span >To:<input type="date" name="date_to" value="" required /></span>&nbsp;&nbsp;&nbsp;&nbsp;
								<input class="btn btn-success mr-2" type="submit" value="Report PDF" name="submit" >
							</form>
						</div>
					</div>
                  
                    <table class="table table-striped">
                      <thead class="bg-primary text-white">
                        <tr>
						  <th >Date(yyyy-mm-dd)</th>
						  <th >Delivery_Address</th>
						  <th >Optional</th>
						  <th >Quantity</th>
						  <th >Rate</th>
						  <th >Total</th>
						  <th >Deposit</th>
						  <th >Balance</th>
                        </tr>
                      </thead>

<?php  
			if($type == "customer"){
				$balance = 0;
				//$result = mysqli_query($dbcon,"SELECT daily_entry.id,daily_entry.date,c_qty,c_rate,deposit,delivery_adds,optional FROM daily_entry INNER join amount ON c_name = name where c_name = '$name' ")
				$result = mysqli_query($dbcon,"SELECT X.date,X.delivery_adds,X.c_qty,X.c_rate,X.deposit,X.optional FROM (SELECT delivery_adds,c_qty,c_rate,deposit,optional,date FROM `daily_entry` WHERE c_name = '$name' UNION SELECT delivery_adds,c_qty,c_rate,deposit,optional,date FROM `amount` WHERE name = '$name') X ORDER BY X.`date`   ")

				or die(mysqli_error($dbcon));

				while($row = mysqli_fetch_array( $result )) {
					$total = $row['c_qty'] * $row['c_rate'];
					if($row['deposit']){
						
					}else{
						$row['deposit'] = 0;
					}
					@$balance =  ($balance + $total) - $row['deposit'];

						  echo "<tbody>";
							echo "<tr>";
							echo  "<td>".$row['date']."</td>";
							echo  "<td>".$row['delivery_adds']."</td>";
							echo  "<td>".$row['optional']."</td>";
							echo  "<td>".$row['c_qty']."</td>";
							echo  "<td>".$row['c_rate']."</td>";
							//echo  "<td>".$total ."</td>";
							if($total == 0){
								echo  "<td>-</td>";
							}else{
								echo  "<td>".$total ."</td>";
							}
							if($row['deposit'] == 0){
								echo  "<td>-</td>";
							}else{
								echo  "<td>".$row['deposit'] ."</td>";
							}
							if($balance < 0){
			                  $balance_pos = abs($balance)." in Advance.";
			                  echo  "<td>".$balance_pos ."</td>";
			                }else{
			                  echo  "<td>".$balance ."</td>";
			                }
							//echo  "<td>".$balance ."</td>";
								
							echo "</tr>";
					}
						  echo  "</tbody>";
						  
			}else if($type == "manufacture"){
				//$result = mysqli_query($dbcon,"SELECT daily_entry.id,daily_entry.date,m_qty,m_rate,deposit,delivery_adds,optional FROM daily_entry INNER join amount ON m_name = name where m_name = '$name'")
				$result = mysqli_query($dbcon,"SELECT X.date,X.delivery_adds,X.m_qty,X.m_rate,X.deposit,X.optional FROM (SELECT delivery_adds,m_qty,m_rate,deposit,optional,date FROM `daily_entry` WHERE m_name = '$name' UNION SELECT delivery_adds,m_qty,m_rate,deposit,optional,date FROM `amount` WHERE name = '$name') X ORDER BY X.`date`   ")

				or die(mysqli_error($dbcon));

				while($row = mysqli_fetch_array( $result )) {
					$total = $row['m_qty'] * $row['m_rate'];
					if($row['deposit']){
						
					}else{
						$row['deposit'] = 0;
					}
					@$balance =  ($balance + $total) - $row['deposit'];

						  echo "<tbody>";
							echo "<tr>";
							echo  "<td>".$row['date']."</td>";
							echo  "<td>".$row['delivery_adds']."</td>";
							echo  "<td>".$row['optional']."</td>";
							echo  "<td>".$row['m_qty']."</td>";
							echo  "<td>".$row['m_rate']."</td>";
							//echo  "<td>".$total ."</td>";
							if($total == 0){
								echo  "<td>-</td>";
							}else{
								echo  "<td>".$total ."</td>";
							}
							if($row['deposit'] == 0){
								echo  "<td>-</td>";
							}else{
								echo  "<td>".$row['deposit'] ."</td>";
							}
							if($balance < 0){
			                  $balance_pos = abs($balance)." in Advance.";
			                  echo  "<td>".$balance_pos ."</td>";
			                }else{
			                  echo  "<td>".$balance ."</td>";
			                }
							echo "</tr>";

					}
						  echo  "</tbody>";
			}else{

				$result_name = mysqli_query($dbcon,"SELECT vehicle_no FROM transport where name = '$name'");
				$row_name = mysqli_fetch_array( $result_name );
				$vehicle_no = $row_name['vehicle_no'];

				$result = mysqli_query($dbcon,"SELECT X.date,X.delivery_adds,X.v_qty,X.v_rate,X.deposit,X.optional FROM (SELECT delivery_adds,v_qty,v_rate,deposit,optional,date FROM `daily_entry` WHERE vehicle_no = '$vehicle_no' UNION SELECT delivery_adds,v_qty,v_rate,deposit,optional,date FROM `amount` WHERE name = '$vehicle_no') X ORDER BY X.`date`   ")

				or die(mysqli_error($dbcon));

				while($row = mysqli_fetch_array( $result )) {
					$total = $row['v_qty'] * $row['v_rate'];
					if($row['deposit']){
						
					}else{
						$row['deposit'] = 0;
					}
					@$balance =  ($balance + $total) - $row['deposit'];
						  echo "<tbody>";
							echo "<tr>";
							echo  "<td>".$row['date']."</td>";
							echo  "<td>".$row['delivery_adds']."</td>";
							echo  "<td>".$row['optional']."</td>";
							echo  "<td>".$row['v_qty']."</td>";
							echo  "<td>".$row['v_rate']."</td>";
							//echo  "<td>".$total ."</td>";
							if($total == 0){
								echo  "<td>-</td>";
							}else{
								echo  "<td>".$total ."</td>";
							}
							if($row['deposit'] == 0){
								echo  "<td>-</td>";
							}else{
								echo  "<td>".$row['deposit'] ."</td>";
							}
							if($balance < 0){
			                  $balance_pos = abs($balance)." in Advance.";
			                  echo  "<td>".$balance_pos ."</td>";
			                }else{
			                  echo  "<td>".$balance ."</td>";
			                }
							echo "</tr>";
							
					}
						  echo  "</tbody>";
			}
			
		?>		  
		</table>
		
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