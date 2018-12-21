<?php

$servername="localhost";
$username="root";
$password="tseinfo";
$dbname="Archi";

$conn = new mysqli($servername,$username,$password,$dbname);


if($conn->connect_error) {
	die("Connection failed: " .$conn->connect_error);
}

$stmt= $conn->prepare("INSERT INTO user_events (user_id, event_id) VALUES (?,?)");

$email = $_POST["email"];
$eventID = $_POST["eventID"];

$stmt->bind_param("si", $email, $eventID);

if($stmt->execute()===TRUE) {
	header("Location: list-event.php");
	exit();

} else {
    // echo "Error :" . $sql . $conn->error;
    echo "Vous êtes déjà inscrit(e) à cet évènement";
}

$stmt->close();
$conn->close();

?>