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

    <div class="row mb-5">
      <div class="text-info">Ajouter un nouvel évènement</div>
    </div>
    
    <div class="row">
      <form action="add-event-handler.php" method="POST" class="text-info">

        <div class="form-group">
          <label for="dare">Date</label>
          <input class="form-control" type="datetime-local" name="date" id="date" required>
        </div>

        <div class="form-group">
          <label for="address">Adresse</label>
          <input placeholder="Ex: 25 rue..." class="form-control" type="text" name="address" id="address" required>
        </div>

        <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" name="description" id="description" cols="30" rows="3" required></textarea>
        </div>

        <button class="btn btn-primary" type="submit">Ajouter</button>

      </form>
    </div>
  </div>
  <div class="validator">
  </div>
</body>

</html>