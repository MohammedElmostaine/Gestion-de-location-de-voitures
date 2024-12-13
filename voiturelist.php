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
  <title>Gestion des Clients</title>
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
        <h2 class="titree">Liste des Voiture</h2>
        <div class="stats">
          <div><span >
            <?php
              
              $sql = "SELECT COUNT(*) AS totalvoiture FROM voitures";
              $result = mysqli_query($connection,$sql);
              $totalvoiture = mysqli_fetch_assoc($result)["totalvoiture"];
              echo $totalvoiture;
            ?>
          </span> voitures enregistrés</div>
          
        </div>
      </header>
      <section class="ajouter">
        
        <a href="/addcar.php"><button class="ajouter-button">Ajouter une Voiture</button></a>
      </section>
      <section class="table-container">
        <table>
          <thead>
            <tr>
              <th>N° D'imatriculation</th>
              <th>Marque</th>
              <th>Modele</th>
              <th>Annee</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $stmt = mysqli_query( $connection,"SELECT * FROM voitures");
              while ($row = mysqli_fetch_assoc($stmt)) {
            ?>
            <tr>
              <td><?= $row["Nimmatriculation"] ?></td>
              <td><?= $row["Marque"] ?></td>
              <td><?= $row["modele"] ?></td>
              <td><?= $row["Annee"] ?></td>
              <td>
                <a href="/editvoitures.php?id=<?= $row["Nimmatriculation"] ?>" class="btn-edit">Modifier</a>
                <a href="/deletecar.php?id=<?= $row["Nimmatriculation"] ?>" class="btn-delete" 
                   onclick="return confirm('Voulez-vous vraiment supprimer ce client ?');">Supprimer</a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </section>
    </main>
  </div>
</body>
</html>
