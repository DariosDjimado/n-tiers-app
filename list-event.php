<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Gestionnaire d'évènements</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

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

$conn=new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error) {
	die("Connection failed:".$conn->connect_error);
}

$sql= "SELECT * FROM Archi.Events";
$result=$conn->query($sql);

if($result->num_rows > 0) {
    echo "<table class='table table-striped table-bordered'><thead class='thead-dark'><tr><th>Date</th>"
    ."<th>Adresse</th><th>Description</th><th>S'inscrire</th><th>Modifier</th><th>Supprimer</th><th>Direction</th></tr></thead><tbody>";
	while($row = $result->fetch_assoc()){
        echo "<tr><td>"
        .$row["date"]
        ."</td><td>"
        .$row["address"]
        ."</td><td>"
        .$row["description"]
        ."</td><td><a class='btn btn-default' href='/signup-event.php?id="
        . $row["id"]
        ."'><i class='material-icons'>calendar_today</i></a></td>"
        ."</td><td><a class='btn btn-default' href='/update-event.php?id="
        . $row["id"]
        ."'><i class='material-icons' style='color:green'>edit</i></a></td>"
        ."</td><td><a class='btn btn-default' href='/delete-event.php?id="
        . $row["id"]
        ."'><i class='material-icons' style='color:red'>delete_forever</i></a></td>"
        ."</td><td><button class='btn btn-default' onclick='refreshMap(\"". $row["address"] ."\")'><i class='material-icons' style='color:blue'>directions</i></button></td></tr>";
	}
	echo "</tbody></table>";
} else {
	echo "Aucun n'évènement disponible";
	// echo "Error :" . $conn->error;
}


$conn->close();
?>

<div class="row justify-content-center">
  <div class="row justify-content-center" id="mapContainer">

  </div>

</div>

<script src="app.js"></script>
</body>
</html>