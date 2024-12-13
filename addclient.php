<?php
include "config.php"
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="/style.css">
  <title>Ajouter un Client</title>
</head>
<body>
  <div class="container">
    <aside class="sidebar">
      <div class="logo">
        <h1>MYPARC</h1>
      </div>
      <nav>
        <ul>
        <li><a href="/index.php" title="Clients"><i class="fa-solid fa-user"></i></a></li>
          <li><a href="/voiturelist.php" title="Voitures"><i class="fa-solid fa-car"></i></a></li>
          <li><a href="/Contratslist.php" title="Contrats"><i class="fa-solid fa-file-contract"></i></a></li>
        </ul>
      </nav>
    </aside>
    <main>
      <header>
        <h2>Ajouter un Client</h2>
      </header>
      <section class="form-container">
        <form action="/addclient.php" method="POST">
          <div class="form-group">
            <label for="nom">Nom Complet:</label>
            <input type="text" id="nom" name="nom" required>
          </div>
          <div class="form-group">
            <label for="telephone">Téléphone:</label>
            <input type="text" id="telephone" name="telephone" required>
          </div>
          <div class="form-group">
            <label for="adresse">Adresse:</label>
            <input type="text" id="adresse" name="adresse" required>
          </div>
          <button type="submit" class="btn-submit">Ajouter</button>
        </form>
      </section>
      <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
           
          $nom = $_POST["nom"];
          $telephone = $_POST["telephone"];
          $adresse = $_POST["adresse"];

          $stmtup = mysqli_query($connection,"INSERT INTO   clients(Nom,Ntele,Adresse) values  ('$nom','$telephone','$adresse')");
          header("Location: index.php");
        }
      ?>
    </main>
  </div>
</body>
</html>
