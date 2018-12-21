<?php

$servername="localhost";
$username="root";
$password="tseinfo";
$dbname="Archi";

$conn = new mysqli($servername,$username,$password,$dbname);


if($conn->connect_error) {
	die("Connection failed: " .$conn->connect_error);
}

$stmt= $conn->prepare("DELETE FROM Events WHERE id = ?");

$eventId = $_GET['id'];;

$stmt->bind_param("i", $eventId);


if($stmt->execute()===TRUE) {
    header("Location: list-event.php");
	exit();

} else {
	echo "Error :" . $sql . $conn->error;
}

$stmt->close();
$conn->close();

?>