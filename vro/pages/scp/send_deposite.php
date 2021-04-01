<?php
  include("../../database/db_conection.php");

    $type = $_POST['type'];
    $name = $_POST['name'];
    $message = $_POST['msg'];

    if($type == 'customer'){
      $result_cus_no = mysqli_query($dbcon,"SELECT m_no FROM customer WHERE name='".$name."'")or die(mysqli_error($dbcon));
      $row_cus_no = mysqli_fetch_array( $result_cus_no );
      $number = $row_cus_no['m_no'];  //customer mobile number

      //find customer total balance 
        $result_cus_depo = mysqli_query($dbcon,"SELECT X.date,X.delivery_adds,X.c_qty,X.c_rate,X.deposit,X.optional FROM (SELECT delivery_adds,c_qty,c_rate,deposit,optional,date FROM `daily_entry` WHERE c_name = '$name' UNION SELECT delivery_adds,c_qty,c_rate,deposit,optional,date FROM `amount` WHERE name = '$name') X ORDER BY X.`date`   ")

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

             $message = $message." ".$c_balance;  

    }else if($type == 'transport'){
      $result_veh_no = mysqli_query($dbcon,"SELECT m_no FROM transport WHERE name='".$name."'")or die(mysqli_error($dbcon));
      $row_veh_no = mysqli_fetch_array( $result_veh_no );
      $number = $row_veh_no['m_no'];    //vehicle mobile number

      //find transport total balance 
        $result_veh_depo = mysqli_query($dbcon,"SELECT X.date,X.delivery_adds,X.v_qty,X.v_rate,X.deposit,X.optional FROM (SELECT delivery_adds,v_qty,v_rate,deposit,optional,date FROM `daily_entry` WHERE vehicle_no = '$name' UNION SELECT delivery_adds,v_qty,v_rate,deposit,optional,date FROM `amount` WHERE name = '$name') X ORDER BY X.`date`")

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
             $message = $message." ".$v_balance;      

    }else{
      $result_manu_no = mysqli_query($dbcon,"SELECT m_no FROM manufacture WHERE name='".$name."'")or die(mysqli_error($dbcon));
      $row_manu_no = mysqli_fetch_array( $result_manu_no );
      $number = $row_manu_no['m_no'];   //manufacture mobile number

      //find manufature total balance 
        $result_manu_depo = mysqli_query($dbcon,"SELECT X.date,X.delivery_adds,X.m_qty,X.m_rate,X.deposit,X.optional FROM (SELECT delivery_adds,m_qty,m_rate,deposit,optional,date FROM `daily_entry` WHERE m_name = '$name' UNION SELECT delivery_adds,m_qty,m_rate,deposit,optional,date FROM `amount` WHERE name = '$name') X ORDER BY X.`date`")

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
                $message = $message." ".$m_balance;  
    }
    
    echo "name = ".$name." , number= ".$number.", message=".$message;
    
    
    
    
  //  $varUserName="t1vineetrana";
  //  $varPWD="89220215";
  //  $varSenderID="VINEET";
  //  $varPhNo=$number;
  // //$varMSG=$message;

  //  //message encode for url
  //  $varMSG = urlencode($message);

  //  $url="http://nimbusit.co.in/api/swsendSingle.asp";

  //  $data="username=".$varUserName."&password=".$varPWD."&sender=".$varSenderID."&sendto=".$varPhNo."&message=".$varMSG;
   
  //  postdata($url,$data);

  //  function postdata($url,$data){
  //  //The function uses CURL for posting data to
  //   $objURL = curl_init($url); 
  //   curl_setopt($objURL, CURLOPT_RETURNTRANSFER,1);
  //   curl_setopt($objURL,CURLOPT_POST,1); 
  //   curl_setopt($objURL, CURLOPT_POSTFIELDS,$data);
  //   $retval = trim(curl_exec($objURL)); 
  //   curl_close($objURL);
  //   return $retval;
  // }

?>