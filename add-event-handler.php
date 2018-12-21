<?php

$servername="localhost";
$username="root";
$password="tseinfo";
$dbname="Archi";

$conn = new mysqli($servername,$username,$password,$dbname);


if($conn->connect_error) {
	die("Connection failed: " .$conn->connect_error);
}

$stmt= $conn->prepare("INSERT INTO Events (date, address, description) VALUES (?,?,?)");

$date = $_POST["date"];
$address = $_POST["address"];
$description = $_POST["description"];

$stmt->bind_param("sss", $date, $address, $description);


if($stmt->execute()===TRUE) {
	header("Location: list-event.php");
	exit();

} else {
	echo "Error :" . $sql . $conn->error;
}

$stmt->close();
$conn->close();

?>