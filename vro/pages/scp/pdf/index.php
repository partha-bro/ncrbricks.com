<?php
	include("../../../database/db_conection.php");
	$name = $_GET['id'];
	$type = $_GET['type'];
	$date_from = $_POST['date_from'];
	$date_to = $_POST['date_to'];

	$result = mysqli_query($dbcon,"SELECT id FROM report")

				or die(mysqli_error($dbcon));

				while($row = mysqli_fetch_array( $result )) {
					$invoice_id = $row['id'];
					}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns='http://www.w3.org/1999/xhtml'>

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Editable Invoice</title>
	
	<link rel='stylesheet' type='text/css' href='css/style.css' />
	<link rel='stylesheet' type='text/css' href='css/print.css' media='print' />
	<script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='js/example.js'></script>
	
	<script>
		function myPrint(){
			alert("print is comming soon.");
			window.print();
		}
	</script>

</head>

<body>

	<div id="page-wrap">
		<form method="post">
		<textarea id="header">INVOICE</textarea>
		
		
		<div id="customer">

            <textarea id="customer-title"><?php echo $name; ?></textarea>
			

            <table id="meta">
                <tr>
                    <td class="meta-head">Invoice #</td>
                    <td><textarea><?php echo $invoice_id+1; ?></textarea></td>
                </tr>
                <tr>

                    <td class="meta-head">Date</td>
                    <td><textarea id="date"><?php echo date("d-m-Y"); ?></textarea></td>
                </tr>

            </table>
		
		</div>
		
		<table id="items">
		
		  <tr>
		      <th>Date</th>
		      <th>Name</th>
		      <th>Address</th>
		      <th>Quantity</th>
		      <th>Unit Cost</th>
		      <th>Price</th>
			  <th >Deposit</th>
			  <th >Balance</th>
		  </tr>

<?php
	include("../../../database/db_conection.php");
	$name = $_GET['id'];
	$type = $_GET['type'];
	$total_amount = 0;
	$deposit = 0;
	
		if($type == "customer"){
				$balance = 0;
				$result = mysqli_query($dbcon,"SELECT X.date,X.delivery_adds,X.c_qty,X.c_rate,X.deposit,X.optional FROM (SELECT delivery_adds,c_qty,c_rate,deposit,optional,date FROM `daily_entry` WHERE c_name = '$name' UNION SELECT delivery_adds,c_qty,c_rate,deposit,optional,date FROM `amount` WHERE name = '$name') X where date >= '$date_from' and date <= '$date_to' ORDER BY X.`date`   ")

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
							echo "  <td class='item-name'><div class='delete-wpr'><textarea>".$row['date']."</textarea><a class='delete' href='javascript:;' title='Remove row'>X</a></div></td>";
							echo  "<td>".$row['delivery_adds']."</td>";
							echo  "<td>".$row['optional']."</td>";
							echo  "<td>".$row['c_qty']."</td>";
							echo  "<td>".$row['c_rate']."</td>";
							echo  "<td>".$total ."</td>";
							echo  "<td>".$row['deposit'] ."</td>";
							echo  "<td>".$balance."</td>";
							$total_amount = $total_amount + $total;
							$deposit = $deposit + $row['deposit'];
							echo "</tr>";
					}
						  echo  "</tbody>";
						  
			}else if($type == "manufacture"){
				$result = mysqli_query($dbcon,"SELECT X.date,X.delivery_adds,X.m_qty,X.m_rate,X.deposit,X.optional FROM (SELECT delivery_adds,m_qty,m_rate,deposit,optional,date FROM `daily_entry` WHERE m_name = '$name' UNION SELECT delivery_adds,m_qty,m_rate,deposit,optional,date FROM `amount` WHERE name = '$name') X where date >= '$date_from' and date <= '$date_to' ORDER BY X.`date`   ")

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
							echo "  <td class='item-name'><div class='delete-wpr'><textarea>".$row['date']."</textarea><a class='delete' href='javascript:;' title='Remove row'>X</a></div></td>";
							echo  "<td>".$row['delivery_adds']."</td>";
							echo  "<td>".$row['optional']."</td>";
							echo  "<td>".$row['m_qty']."</td>";
							echo  "<td>".$row['m_rate']."</td>";
							echo  "<td>".$total ."</td>";
							echo  "<td>".$row['deposit'] ."</td>";
							echo  "<td>".$balance ."</td>";
							echo "</tr>";
							$total_amount = $total_amount + $total;
							$deposit = $deposit + $row['deposit'];
					}
						  echo  "</tbody>";
			}else{
				$result = mysqli_query($dbcon,"SELECT X.date,X.delivery_adds,X.v_qty,X.v_rate,X.deposit,X.optional FROM (SELECT delivery_adds,v_qty,v_rate,deposit,optional,date FROM `daily_entry` WHERE vehicle_no = '$name' UNION SELECT delivery_adds,v_qty,v_rate,deposit,optional,date FROM `amount` WHERE name = '$name') X where date >= '$date_from' and date <= '$date_to' ORDER BY X.`date`   ")

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
							echo "  <td class='item-name'><div class='delete-wpr'><textarea>".$row['date']."</textarea><a class='delete' href='javascript:;' title='Remove row'>X</a></div></td>";
							echo  "<td>".$row['delivery_adds']."</td>";
							echo  "<td>".$row['optional']."</td>";
							echo  "<td>".$row['v_qty']."</td>";
							echo  "<td>".$row['v_rate']."</td>";
							echo  "<td>".$total ."</td>";
							echo  "<td>".$row['deposit'] ."</td>";
							echo  "<td>".$balance."</td>";
							echo "</tr>";
							$total_amount = $total_amount + $total;
							$deposit = $deposit + $row['deposit'];
					}
						  echo  "</tbody>";
			}
?>
		
		</table>
		<input class="btn btn-success mr-2" type="submit" value="Print" name="submit" disabled> <!-- onclick="myPrint()" -->
		</form>
	</div>
	
</body>

</html>

<?php
	//echo $total_amount .", ". $amount_paid .", ". $balance_due;
	if(isset($_POST['submit']))  
	{ 
		$date = date("Y-m-d");
		$name = $name;  
		$address = $row['delivery_adds'];
		$total = $total_amount;    
		$amount_paid = $deposit; 
		$balance_due = $balance;
		
		if($total != 0){
			$sql = "INSERT INTO report (name, address, total, amount_paid, balance_due, date)
			VALUES ('$name', '$address', '$total', '$amount_paid' , '$balance_due', '$date')";

			if ($dbcon->query($sql) === TRUE) {
				echo "<script>window.print();</script>";   
			} else {
				echo "Error: " . $sql . "<br>" . $dbcon->error;
			}
		}else{
			
		}
		
		
	}
		$dbcon->close();


?>