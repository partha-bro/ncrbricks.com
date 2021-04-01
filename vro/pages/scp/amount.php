<?php
	$title = 'Amount';
	require("../common/header.php");
?>
		<!-- partial -->
<script>
	var id;
	function myDelete(id){
		var txt;
		var r = confirm("Are you sure!");
		if (r == true) {
			window.location = "del_amount.php?id="+id;
		  
		} else {

		} 
	}
	document.getElementById('amount').classList.add("bg-primary");
</script>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
					<div class="row">
						<div class="col-lg-3 grid-margin stretch-card">
							<h4 >Amount Details</h4>
						</div>
						<div class="col-lg-3 grid-margin stretch-card">
							<a class="btn btn-success" href="add_amount.php?type=customer" style="float:right">Customer amount +</a>
						</div>
						<div class="col-lg-3 grid-margin stretch-card">
							<a class="btn btn-success" href="add_amount.php?type=transport" style="float:right">Transporter amount +</a>
						</div>
						<div class="col-lg-3 grid-margin stretch-card">
							<a class="btn btn-success" href="add_amount.php?type=manufacture" style="float:right">Manufacturer amount +</a>
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
                            Name_type
                          </th>
                          <th>
                            Name
                          </th>
                          <th>
                            Deposit
                          </th>
                          <th>
                            Method
                          </th>
						  <th>
                            Date(yyyy-mm-dd)
                          </th>
						  <th>
                            Optional
                          </th>
						  <th>
                            SMS Panel
                          </th>
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
                      </thead>
		<?php  
  
			include("../../database/db_conection.php");

			$result = mysqli_query($dbcon,"SELECT * FROM amount where Name_type = 'customer' ORDER BY date DESC")

			or die(mysqli_error());

			while($row = mysqli_fetch_array( $result )) {
				
					  echo "<tbody>";
						echo "<tr>";
						echo  "<th scope='row'>".$row['id']."</th>";
						echo  "<th id='name_type_".$row['id']."'>".$row['name_type']."</th>";
						echo  "<td id='name_".$row['id']."'>".$row['name']."</td>";
						echo  "<td id='deposit_".$row['id']."'>".$row['deposit']."</td>";
						echo  "<td>".$row['method']."</td>";
						echo  "<td>".$row['date']."</td>";
						echo  "<td>".$row['optional']."</td>";
						echo  "<td ><a class='btn btn-info text-white' id='btn_send_" . $row['id'] . "' onclick='sendMsg(".$row['id'].")'>msg</a></td>";
						if($_SESSION['user_name'] == "admin"){
							echo  "<td ><a class='btn btn-success' href='edit_amount.php?id=" . $row['id'] . "&type=". $row['name_type'] ."'>Edit</a></td>"; 
							echo  "<td ><a class='btn btn-danger text-white' onclick='myDelete(".$row['id'].")'>Delete</a></td>"; 
						}else{
							echo  "<td style='display:none'><a href='edit_amount.php?id=" . $row['id'] . "&type=". $row['name_type'] ."'>Edit</a></td>";
							echo  "<td style='display:none'><a onclick='myDelete(".$row['id'].")'>Delete</a></td>";
						}
						echo  "</tr>";
				}
					  echo  "</tbody>";
		?>		  
		</table>
		<!-- partial -->
                    <table class="table table-striped" style="margin-top:2%">
                      <thead class="bg-primary text-white">
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            Name_type
                          </th>
                          <th>
                            Name
                          </th>
                          <th>
                            Transfer
                          </th>
						  <th>
                            Method
                          </th>
                          <th>
                            Date(yyyy-mm-dd)
                          </th>
						  <th>
                            Optional
                          </th>
						  <th>
                            SMS Panel
                          </th>
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
                      </thead>
		<?php  
  
			include("../../database/db_conection.php");

			$result = mysqli_query($dbcon,"SELECT * FROM amount where Name_type != 'customer' ORDER BY date DESC")

			or die(mysqli_error());

			while($row = mysqli_fetch_array( $result )) {
				
					  echo "<tbody>";
						echo "<tr>";
						echo  "<th scope='row'>".$row['id']."</th>";
						echo  "<th id='name_type_".$row['id']."'>".$row['name_type']."</th>";
						echo  "<td id='name_".$row['id']."'>".$row['name']."</td>";
						echo  "<td id='deposit_".$row['id']."'>".$row['deposit']."</td>";
						echo  "<td>".$row['method']."</td>";
						echo  "<td>".$row['date']."</td>";
						echo  "<td>".$row['optional']."</td>";
						echo  "<td ><a class='btn btn-info text-white' id='btn_send_" . $row['id'] . "' onclick='sendMsg(".$row['id'].")'>msg</a></td>";
						if($_SESSION['user_name'] == "admin"){
							echo  "<td ><a class='btn btn-success' href='edit_amount.php?id=" . $row['id'] . "&type=". $row['name_type'] ."'>Edit</a></td>"; 
							echo  "<td ><a class='btn btn-danger text-white' onclick='myDelete(".$row['id'].")'>Delete</a></td>"; 
						}else{
							echo  "<td style='display:none'><a href='edit_amount.php?id=" . $row['id'] . "&type=". $row['name_type'] ."'>Edit</a></td>";
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
        <!--script file-->
		<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
		<script type="text/javascript">
			function sendMsg(nos){
				var name_type_nos = "#name_type_"+nos;
				var name_nos = "#name_"+nos;
				var deposit_nos = "#deposit_"+nos;

				var type = $(name_type_nos).html();
				var name = $(name_nos).html();
				var deposit = $(deposit_nos).html();
				//alert(type+","+name+","+deposit);
				var message = "";
					if(type == 'customer'){
						message = "Dear "+name+", you have deposit Rs"+deposit+" by cash/chqeque due amount Rs ";
					}else if(type == 'transport'){
						message = "Dear "+name+", you have received Rs"+deposit+" by cash/chqeque due amount Rs ";
					}else{
						message = "Dear "+name+", you have received Rs"+deposit+" by cash/chqeque due amount Rs ";
					}
					// alert(message);
					$.ajax({
						url: 'send_deposite.php',
						type: 'post',
						data: { type : type, name : name, msg : message},

						success: function(result){
								alert(result);
						}
					});
			}
		</script>
	</body>
</html>

<?php
	include("../common/footer.php");
?>