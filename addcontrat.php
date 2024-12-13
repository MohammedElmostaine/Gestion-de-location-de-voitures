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
        <h2>Ajouter une contrat</h2>
      </header>
      
      <section class="form-container">
        <form action="/addcontrat.php" method="POST">
          <div class="form-group">
            <label for="Dateddebut">Date de Debut:</label>
            <input type="date" id="Dateddebut" name="Dateddebut" required>
          </div>
          <div class="form-group">
            <label for="DatedFin">Date de Fin:</label>
            <input type="date" id="DatedFin" name="DatedFin" required>
          </div>
          <div class="form-group">
            <label for="Duree">Duree:</label>
            <input type="text" id="Duree" name="Duree" required>
          </div>
          <div class="form-group">
            <label for="Nimmatriculation">N° d' immatriculation:</label>
            <select name="Nimmatriculation" id="Nimmatriculation">
              <?php
               $stmt = mysqli_query($connection,"SELECT Nimmatriculation FROM voitures");
               
               
               while($result = mysqli_fetch_assoc($stmt)){
               echo '<option value = "'.$result['Nimmatriculation'].'">'.$result['Nimmatriculation'].'</option>';
               }
              ?>
              
            </select>
          </div>
          <div class="form-group">
            <label for="Nclient">ID client:</label>
            <select name="Nclient" id="Nclient">
              <!-- <option value=""></option> -->
              <?php
               $stmt = mysqli_query($connection,"SELECT Nclient FROM clients");
               
               
               while($result = mysqli_fetch_assoc($stmt)){
               echo '<option value = "'.$result['Nclient'].'">'.$result['Nclient'].'</option>';
               }
              ?>
              
            </select>
          </div>
          <button type="submit" class="btn-submit">Ajouter</button>
        </form>
      </section>
      <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          
          $Dateddebut = $_POST["Dateddebut"];
          $DatedFin = $_POST["DatedFin"];
          $Duree = $_POST["Duree"];
          $Nimmatriculation = $_POST["Nimmatriculation"];
          $Nclient = $_POST["Nclient"];
          $stmtup = mysqli_query($connection,"INSERT INTO   contrats(Dateddebut,DatedFin,Duree,Nimmatriculation,Nclient) values  ('$Dateddebut','$DatedFin','$Duree','$Nimmatriculation','$Nclient')");
          header("Location: Contratslist.php");
        }
      ?>
    </main>
  </div>
</body>
</html>
