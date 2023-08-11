<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="style.css"> -->
  <style><?php include 'style.css';?></style>
  <title>PWA projekt - Matej Bahmec</title>
</head>
<body>
    <header>
        <div class="logo">
          <img src="slike/BBC-logo.png" alt="Logo">
        </div>
        <nav>
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="kategorija.php?id=politika">News</a></li>
            <li><a href="kategorija.php?id=sport">Sport</a></li>
            <li><a href="unos.html">Unos</a></li>
            <li><a href="login.php">Prijava</a></li>
            <li><a href="registracija.php">Registracija</a></li>
          </ul>
        </nav>
    </header>
    <?php
        include 'connetion.php';
        define('UPLPATH', 'slike/');
    ?>
    <section class="sport">
        <?php
            $kategorija=$_GET["id"];
            $query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='$kategorija'";
            $result = mysqli_query($dbc, $query);
            $i=0;
            echo '<div class="kartice-container">';
              while($row = mysqli_fetch_array($result)) {
                  echo '<div class="kartica">';
                  echo '<a href="clanak.php?id='.$row['id'].'">';
                  echo '<img src="' . UPLPATH . $row['slika'] . '"> </a>';
                  echo '<h4>'. $row['naslov'] .'</h4>';
                  echo '<p>'. $row['sazetak'] .'</p>';
                  echo '</div>';
              }
              echo '</div>';
        ?> 
    </section>
    <footer>
        <hr>
        <p>&copy; 2023 BBC. The BBC is not responsible for the content of external sites. Read about our approach to external linking.</p>
    </footer>
</body>
</html>
    