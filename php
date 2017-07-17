<?php

$conn = mysqli_connect("servername", "username", "password", "name of db");

if(!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}
?>





<?
include 'dbh.php'
$user = $_POST['i_username'];
$pwd = $_POST['i_pwd'];
$number = $_POST['i_no'];

$sql = "INSERT INTO USER(USERNAME, PASSWORD, NUMBER) VALUES('$user', '$pwd', '$number')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>



<?

include 'dbh.php'
$user = $_POST['username'];
$pwd = $_POST['pwd'];

$sql = "SELECT PASSWORD FROM USER WHERE USERNAME='$user'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result)>0) {
	while($row = mysqli_fetch_assoc($result)) {
		$password = $row["PASSWORD"];
	} 
	
	if($password==$pwd) {
		header("Location: ../partials/success.html")
	}
	else {
		alert("Incorrect password")
	}
} else {
	alert("Invalid username")
}

?>
