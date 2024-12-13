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
        <h2 class="titree">Liste des Contracts</h2>
        <div class="stats">
          <div><span >
            <?php
              
              $stmt = mysqli_query($connection,"SELECT COUNT(*) AS totalcontrats FROM contrats");
              $count = mysqli_fetch_assoc($stmt)["totalcontrats"] ;
              echo $count;
            ?>
          </span> contrats enregistrés</div>
          
        </div>
      </header>
      <section class="ajouter">
        
        <a href="/addcontrat.php"><button class="ajouter-button">Ajouter une Contract</button></a>
      </section>
      <section class="table-container">
        <table>
          <thead>
            <tr>
              <th>Numero du Contract</th>
              <th>Date de Debut</th>
              <th>Date de Fin</th>
              <th>Duree</th>
              <th>ID client</th>
              <th>N° D'imatriculation</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $stmt = mysqli_query($connection,"SELECT * FROM contrats");
              while ($row = mysqli_fetch_assoc($stmt)) {
            ?>  
            <tr>
              <td><?= $row["Numero"] ?></td>
              <td><?= $row["DatedDebut"] ?></td>
              <td><?= $row["DatedFin"] ?></td>
              <td><?= $row["Duree"] ?></td>
              <td><?= $row["Nclient"] ?></td>
              <td><?= $row["Nimmatriculation"] ?></td>
              <td>
                
                <a href="/deletecontrat.php?id=<?= $row["Numero"] ?>" class="btn-delete" 
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
