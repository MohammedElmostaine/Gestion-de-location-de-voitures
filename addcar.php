<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="/style.css">
  <title>Ajouter une Voiture</title>
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
        <h2>Ajouter une Voiture</h2>
      </header>
      <section class="form-container">
        <form action="/addcar.php" method="POST">
            <div class="form-group">
            <label for="prix">Numer d'immatriculation:</label>
            <input type="text" id="prix" name="Nimmatriculation" required>
          </div>
          <div class="form-group">
            <label for="marque">Marque:</label>
            <input type="text" id="marque" name="marque" required>
          </div>
          <div class="form-group">
            <label for="modele">Modèle:</label>
            <input type="text" id="modele" name="modele" required>
          </div>
          <div class="form-group">
            <label for="annee">Année:</label>
            <input type="number" id="annee" name="annee" required>
          </div>
          
          <button type="submit" class="btn-submit">Ajouter</button>
        </form>
      </section>
      <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $Nimmatriculation = $_POST["Nimmatriculation"];
          $marque = $_POST["marque"];
          $modele = $_POST["modele"];
          $annee = $_POST["annee"];
          

          $connection = new mysqli("localhost", "root", "123456", "projet1");
          $stmt = $connection->prepare("INSERT INTO voitures (Nimmatriculation, Marque, modele, Annee) VALUES (?, ?, ?, ?)");
          $stmt->bind_param("sssi", $Nimmatriculation, $marque, $modele, $annee);
          if ($stmt->execute()) {
            echo "<p class='success-message'>Voiture ajoutée avec succès !</p>";
          } else {
            echo "<p class='error-message'>Erreur lors de l'ajout de la voiture.</p>";
          }
        }
      ?>
    </main>
  </div>
</body>
</html>
