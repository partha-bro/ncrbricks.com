<?php
	$title = 'Send info';
	require("../common/header.php");
	include("../../database/db_conection.php");
	
	$id = $_GET['id'];
		$result = mysqli_query($dbcon,"SELECT * FROM daily_entry INNER JOIN transport WHERE transport.vehicle_no=daily_entry.vehicle_no AND daily_entry.id = '".$id."'")or die(mysqli_error($dbcon));
		
		while($row = mysqli_fetch_array( $result )) {
			$date = $row['date'];	//customer name

			$c_name = $row['c_name'];	//customer name
			$c_qty	= $row['c_qty'];	//customer quantity
			$c_rate	= $row['c_rate'];	//customer rate per piece

			$v_name = $row['name'];
			$v_vehicle_no = $row['vehicle_no'];	//vehicle number
			$v_qty = $row['v_qty'];			//vehicle quantity
			$v_rate = $row['v_rate'];		//vehicle rate per piece

			$m_name = $row['m_name'];		//manufature name
			$m_qty = $row['m_qty'];			//manufacture quantity
			$m_rate = $row['m_rate'];		//manufacture rate per piece
		}
		
		$result_cus_no = mysqli_query($dbcon,"SELECT m_no FROM customer WHERE name='".$c_name."'")or die(mysqli_error($dbcon));
		$row_cus_no = mysqli_fetch_array( $result_cus_no );
		$c_no = $row_cus_no['m_no'];	//customer mobile number

		//find customer total balance 
		$result_cus_depo = mysqli_query($dbcon,"SELECT X.date,X.delivery_adds,X.c_qty,X.c_rate,X.deposit,X.optional FROM (SELECT delivery_adds,c_qty,c_rate,deposit,optional,date FROM `daily_entry` WHERE c_name = '$c_name' UNION SELECT delivery_adds,c_qty,c_rate,deposit,optional,date FROM `amount` WHERE name = '$c_name') X ORDER BY X.`date`   ")

				or die(mysqli_error($dbcon));
				while($row_cus_depo = mysqli_fetch_array($result_cus_depo)) {
					$c_total = $row_cus_depo['c_qty'] * $row_cus_depo['c_rate'];
					if($row_cus_depo['deposit']){
						
					}else{
						$row_cus_depo['deposit'] = 0;
					}
					@$c_balance =  ($c_balance + $c_total) - $row_cus_depo['deposit'];
				}
				if($c_balance < 0){
			        $c_balance = abs($c_balance)." in Advance.";
			      }else{
			        $c_balance;
			      }
		
		$result_veh_no = mysqli_query($dbcon,"SELECT m_no FROM transport WHERE vehicle_no='".$v_vehicle_no."'")or die(mysqli_error($dbcon));
		$row_veh_no = mysqli_fetch_array( $result_veh_no );
		$v_no = $row_veh_no['m_no'];		//vehicle mobile number

		//find transport total balance 
		$result_veh_depo = mysqli_query($dbcon,"SELECT X.date,X.delivery_adds,X.v_qty,X.v_rate,X.deposit,X.optional FROM (SELECT delivery_adds,v_qty,v_rate,deposit,optional,date FROM `daily_entry` WHERE vehicle_no = '$v_vehicle_no' UNION SELECT delivery_adds,v_qty,v_rate,deposit,optional,date FROM `amount` WHERE name = '$v_vehicle_no') X ORDER BY X.`date`")

				or die(mysqli_error($dbcon));
				while($row_veh_depo = mysqli_fetch_array($result_veh_depo)) {
					$v_total = $row_veh_depo['v_qty'] * $row_veh_depo['v_rate'];
					if($row_veh_depo['deposit']){
						
					}else{
						$row_veh_depo['deposit'] = 0;
					}
					@$v_balance =  ($v_balance + $v_total) - $row_veh_depo['deposit'];
				}
				if($v_balance < 0){
			        $v_balance = abs($v_balance)." in Advance.";
			      }else{
			        $v_balance;
			      }
		
		$result_manu_no = mysqli_query($dbcon,"SELECT m_no FROM manufacture WHERE name='".$m_name."'")or die(mysqli_error($dbcon));
		$row_manu_no = mysqli_fetch_array( $result_manu_no );
		$m_no = $row_manu_no['m_no'];		//manufacture mobile number

		//find manufature total balance 
		$result_manu_depo = mysqli_query($dbcon,"SELECT X.date,X.delivery_adds,X.m_qty,X.m_rate,X.deposit,X.optional FROM (SELECT delivery_adds,m_qty,m_rate,deposit,optional,date FROM `daily_entry` WHERE m_name = '$m_name' UNION SELECT delivery_adds,m_qty,m_rate,deposit,optional,date FROM `amount` WHERE name = '$m_name') X ORDER BY X.`date`")

				or die(mysqli_error($dbcon));
				while($row_manu_depo = mysqli_fetch_array($result_manu_depo)) {
					$m_total = $row_manu_depo['m_qty'] * $row_manu_depo['m_rate'];
					if($row_manu_depo['deposit']){
						
					}else{
						$row_manu_depo['deposit'] = 0;
					}
					@$m_balance =  ($m_balance + $m_total) - $row_manu_depo['deposit'];
				}
				if($m_balance < 0){
			        $m_balance = abs($m_balance)." in Advance.";
			      }else{
			        $m_balance;
			      }
		
?>
<div class="main-panel">
    <div class="content-wrapper">
		<div class="row">
			<div class="col-lg-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-lg-6 grid-margin stretch-card" align="right">
								<a class="btn btn-success text-white" id="msg" >Send</a>
							</div>
							<div class="col-lg-6 grid-margin stretch-card">
								<a class="btn btn-success" href="home.php" >Back</a>
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
	<!-- send sms using ajax -->
	<script type="text/javascript">
		var date = "<?php echo $date; ?>";
	    var c_name = "<?php echo $c_name; ?>";
	    var c_qty = <?php echo $c_qty; ?>;
	    var c_rate = <?php echo $c_rate; ?>;
		var c_no = <?php echo $c_no; ?>;
		var c_balance = "<?php echo $c_balance; ?>";

		var v_name = "<?php echo $v_name; ?>";
		var vehicle_no = "<?php echo $v_vehicle_no; ?>";
	    var v_qty = <?php echo $v_qty; ?>;
	    var v_rate = <?php echo $v_rate; ?>;
		var v_no = <?php echo $v_no; ?>;
		var v_balance = "<?php echo $v_balance; ?>";

		var m_name = "<?php echo $m_name; ?>";
	    var m_qty = <?php echo $m_qty; ?>;
	    var m_rate = <?php echo $m_rate; ?>;
		var m_no = <?php echo $m_no; ?>;
		var m_balance = "<?php echo $m_balance; ?>";
		
		var numbers;
		var message;
		$(document).ready(function(){
			$('#msg').click(function(){
				for(var i=0; i<3; i++){
					
					if(i == 0){
						numbers = c_no;
						message = "Dear "+c_name+", you have received "+c_qty+"*"+c_rate+" = "+c_qty*c_rate+", on "+date+ " due amt Rs "+c_balance;
					}else if(i == 1){
						numbers = v_no;
						message = "Dear "+v_name+", your cartage of vehicle no "+vehicle_no+", "+v_qty+"*"+v_rate+" = "+v_qty*v_rate+" on "+date+" due amt Rs "+v_balance;
					}else{
						numbers = m_no;
						message = "Dear "+m_name+", we purchased "+m_qty+"*"+m_rate+" = "+m_qty*m_rate+", on "+date+" total blnc Rs "+m_balance;
					}
					 alert(numbers+","+message);
					/*$.ajax({
						url: 'send.php',
						type: 'post',
						data: { no : numbers, msg : message},

						success: function(result){
								alert("message sent successfully.");
						}
					});*/
				}
			});
			
		});
	</script>
	</body>
</html>
<?php
	include("footer.php");
?>