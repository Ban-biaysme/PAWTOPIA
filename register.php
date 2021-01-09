<?php

session_start();
include "database.php";

// fetch data from js file
$request = file_get_contents('php://input');
$jsonData = json_decode($request,TRUE);

$name = $jsonData["userName"];
$password = $jsonData["password"];
$fname = $jsonData["fName"];
$lname = $jsonData["lName"];
$email = $jsonData["email"];


$sql = "SELECT * FROM logininfo WHERE username = ?";
$stmt = $conn->prepare($sql); 
$stmt->bind_param("s", $name);
$stmt->execute();

$result = $stmt->get_result();

if(mysqli_num_rows($result)=== 0)
{

    //Insert data //Prepared statement //Bind values

    $stmt = $conn->prepare("INSERT INTO logininfo (username, password, fname, lname, email) VALUES (?, ?, ?, ?, ?)");

    // prepare and bind
    $stmt->bind_param("sssss", $name, $password, $fname, $lname, $email);
    $stmt->execute();

      //Start session with user name
      $_SESSION["username"]=$name;
      $response->status="success";

      $responseJson = json_encode($response);
      echo $responseJson;
    }else{
      
      $response->status="fail";
      $responseJson = json_encode($response);

      echo $responseJson;
}



$conn->close();
?>