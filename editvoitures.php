<?php
include "config.php";
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
  <title>Edit un Client</title>
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
        <h2>Edit un Voiture</h2>
      </header>

      <?php
      if (isset($_GET["id"])) {
        $id = $_GET["id"];
        
        $stmt = mysqli_query($connection,"SELECT * FROM voitures WHERE Nimmatriculation = '$id'");
        $result= mysqli_fetch_assoc($stmt);
        $Marque = $result['Marque'];
        $modele = $result['modele'];
        $Annee = $result['Annee'];
        
        

    
    } 
      ?>
      <section class="form-container">
        <form action="/editvoitures.php" method="POST">
          <div class="form-group">
            <label for="Marque">Marque:</label>
            <input type="text" id="nom" name="Marque" value="<?= $Marque?>" required >
          </div>
          <div class="form-group">
            <label for="modele">Modele:</label>
            <input type="text" id="telephone" name="modele" value="<?= $modele?>" required>
          </div>
          <div class="form-group">
            <label for="Annee">Annee:</label>
            <input type="text" id="adresse" name="Annee" value="<?= $Annee?>" required>
          </div>
          <button type="submit" name="go" value="<?= $id?>" class="btn-submit">Edit</button>
        </form>
      </section>
      <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $id = $_POST["go"];
          $Marque = $_POST["Marque"];
          $modele = $_POST["modele"];
          $Annee = $_POST["Annee"];
          $stmtup = mysqli_query($connection,"UPDATE voitures SET  Marque = '$Marque',modele ='$modele',Annee ='$Annee' WHERE nimmatriculation = '$id'");
          header("Location: voiturelist.php");
        }
      ?>
    </main>
  </div>
</body>
</html>