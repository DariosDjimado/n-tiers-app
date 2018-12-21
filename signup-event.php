<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Gestionnaire d'évènements</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

</head>
<body>
<div class="container">
    <div class="navbar navbar-expand-lg navbar-light bg-light p-3 mb-5">
        <a class="navbar-brand" href="/">Gestionnaire d'évènements</a>
      </div>


<?php

$servername="localhost";
$username="root";
$password="tseinfo";
$dbname="Archi";

$conn = new mysqli($servername,$username,$password,$dbname);


if($conn->connect_error) {
	die("Connection failed: " .$conn->connect_error);
}

$stmt= $conn->prepare("SELECT description FROM Events WHERE id = ?");

$eventId = $_GET['id'];
$stmt->bind_param("i", $eventId);

$stmt->execute(); 
$stmt->bind_result($description);


while ($stmt->fetch()) {
  echo "<div class='alert alert-success' role='alert'>
  Inscription à l'évènement : 
  ".
  $description  . "</div>";
}


echo "

<div class='row'>
<form action='signup-event-handler.php' method='POST' class='text-info'>

  <div class='form-group'>
    <label for='name'>Nom</label>
    <input class='form-control' type='text' name='name' id='name' required>
  </div>

  <input hidden class='form-control' type='number' name='eventID' id='eventID' required  value='" 
  .
  $eventId
  . "'>


  <div class='form-group'>
    <label for='email'>Email</label>
    <input class='form-control' type='email' name='email' id='email' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$' required>
  </div>

  <button class='btn btn-primary' type='submit'>S'inscrire</button>

</form>
</div>

</div>
</body>
</html>";


$stmt->close();
$conn->close();

?>


        
