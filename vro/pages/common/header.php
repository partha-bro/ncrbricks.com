<?php  
session_start();  

if(!$_SESSION['user_name'])  
{  
  
    header("Location: ../../index.php");//redirect to login page to secure the welcome page without login access.  
}  
  
?>  

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $title; ?></title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../css/bootstrap.min.css">

  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../img/favicon.png" />
  <script>
	
  </script>
</head>

<body>
  <div class="container-fluid">
  
    <nav class="navbar navbar-expand-sm navbar-dark" id="primary_nav">
	  <!-- Brand -->
	  <a class="navbar-brand" href="../common/home.php"><b><?php echo ucwords($_SESSION['user_name']); ?> Panel</b></a>

	  <!-- Links -->
	  <ul class="navbar-nav">
		<li class="nav-item">
		  <a class="nav-link text-white" >||</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link text-white" id="dashboard" href="../common/home.php">Dashboard</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link text-white" >||</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link text-white" id="amount" href="../scp/amount.php">Amount</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link text-white" >||</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link text-white" id="customer" href="../scp/customer.php">Customer</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link text-white" >||</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link text-white" id="transport" href="../scp/transport.php">Transporter</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link text-white" >||</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link text-white" id="manufacture" href="../scp/manufacture.php">Manufacturer</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link text-white" >||</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link text-white" id="profile" href="../common/profile.php">Profile</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link text-white" >||</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link text-white" id="ch_pwd" href="../common/change_password.php">Change password</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link text-white" >||</a>
		</li>
		<li class="nav-item" >
		  <a class="btn btn-warning nav-link text-dark" href="../common/logout.php">Log Out</a>
		</li>
		</ul>
	</nav> 