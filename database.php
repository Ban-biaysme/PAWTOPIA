<?php
// This file to establish the connection with the database.
    $url='localhost';
    $username='biyas';
    $password='biyas';
    $conn=mysqli_connect($url,$username,$password,"biyasdb");
    
    //Check whether there  is any connection error or not

if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
}
?>