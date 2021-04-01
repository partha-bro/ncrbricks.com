<?php

    $number = $_POST['no'];
    $message = $_POST['msg'];

    
   $varUserName="t1vineetrana";
   $varPWD="89220215";
   $varSenderID="VINEET";
   $varPhNo=$number;
  //$varMSG=$message;

   //message encode for url
   $varMSG = urlencode($message);

   $url="http://nimbusit.co.in/api/swsendSingle.asp";

   $data="username=".$varUserName."&password=".$varPWD."&sender=".$varSenderID."&sendto=".$varPhNo."&message=".$varMSG;
   
   postdata($url,$data);

   function postdata($url,$data){
   //The function uses CURL for posting data to
    $objURL = curl_init($url); 
    curl_setopt($objURL, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($objURL,CURLOPT_POST,1); 
    curl_setopt($objURL, CURLOPT_POSTFIELDS,$data);
    $retval = trim(curl_exec($objURL)); 
    curl_close($objURL);
    return $retval;
  }

?>