<?php
session_start();
include "database.php";

$request = file_get_contents('php://input');
$jsonData = json_decode($request,TRUE);

// echo $jasonData;

 $name = $jsonData["userName"];
 $password = $jsonData["password"];

  $sql = "SELECT * FROM logininfo WHERE username=? and password=?";
  $stmt = $conn->prepare($sql); 
  $stmt->bind_param("ss", $name,$password);
  $stmt->execute();

  $result = $stmt->get_result();

	if(mysqli_num_rows($result)=== 1)
    {
      //Start session with user name
      $_SESSION["username"]=$name;
      $response->status="success";

      $responseJson = json_encode($response);
      echo $responseJson;
      
    }
	else{
      $response->status="fail";
      $responseJson = json_encode($response);

      echo $responseJson;
    }

$conn->close();
?>

