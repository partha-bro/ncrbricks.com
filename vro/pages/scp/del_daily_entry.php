<?php

// connect to the database

include("../../database/db_conection.php");

// check if the 'id' variable is set in URL, and check that it is valid

if (isset($_GET['id']) && is_numeric($_GET['id']))

{

// get id value

$id = $_GET['id'];



// delete the entry

$result = mysqli_query($dbcon,"DELETE FROM daily_entry WHERE id=$id")

or die(mysqli_error($dbcon));



// redirect back to the view page

header("Location: ../common/home.php");

}

else

// if id isn't set, or isn't valid, redirect back to view page

{

header("Location: ../common/home.php");

}



?>