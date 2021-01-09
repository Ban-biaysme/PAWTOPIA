<?php

include "database.php";
session_start();
$uname= $_SESSION["username"];

// define variables and set to empty values
$fname = $lname = $phoneNo  = $email = $petname = $type= $price= $checkin= $checkout= $comments = "";

// data validation
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fname = test_input($_POST["fname"]);
    $lname = test_input($_POST["lname"]);
    $phoneNo = test_input($_POST["phno"]);
    $email = test_input($_POST["email"]);
    $petname = test_input($_POST["petname"]);
    $type = test_input($_POST["pettype"]);
    $price = test_input($_POST["service"]);
    $comments = test_input($_POST["comments"]);

// convert the checkin date into yyy-m-d format
    $indt = strtotime($_POST['checkin']);
    $chkindt=date("Y-m-d",$indt);

// convert the checkin date into yyy-m-d format

    $coutdt = date("Y-m-d", strtotime($_POST['checkout']));

     $indt2 = strtotime($_POST['checkout']);

   //Find the diffference between twom dates
   $totalprice=0;
   if($price == 150 || $price == 75){
       $totalprice= $price;
   }else{
       $diff = $indt2  -$indt; 
       $fullDays = floor($diff/(60*60*24));
       $totalprice= number_format($price) * $fullDays;
   }



    echo $cindt + " " + $coutdt;

$stmt = $conn->prepare("INSERT INTO booking(username, fname, lname, phone, email, petname, type, service, checkin, checkout,comment) 
VALUES (?,?,?, ?, ?, ?, ?, ?, ?, ?, ?)");

// prepare and bind
$stmt->bind_param("sssssssisss", $uname, $fname, $lname, $phoneNo, $email, $petname, $type, $totalprice, $chkindt, $coutdt, $comments);

//Send data to the database
$stmt->execute();

//redirec the page to another page
header("location:success.php");
}

function test_input($data) {

    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$conn->close();
?> 