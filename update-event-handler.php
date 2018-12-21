<?php

$servername="localhost";
$username="root";
$password="tseinfo";
$dbname="Archi";

$conn = new mysqli($servername,$username,$password,$dbname);


if($conn->connect_error) {
	die("Connection failed: " .$conn->connect_error);
}

$stmt= $conn->prepare("UPDATE Events SET date = ?,  address = ?, description = ? WHERE id = ?");


$date = $_POST["date"];
$address = $_POST["address"];
$description = $_POST["description"];
$eventID = $_POST["eventID"];

$stmt->bind_param("sssi", $date, $address, $description, $eventID);


if($stmt->execute()===TRUE) {
	header("Location: list-event.php");
	exit();

} else {
	echo "Error :" . $sql . $conn->error;
}

$stmt->close();
$conn->close();

?>