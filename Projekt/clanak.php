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
        $clanak = $_GET["id"];
        $query = "SELECT * FROM vijesti WHERE id=$clanak";
        $result = mysqli_query($dbc, $query);
        $row = mysqli_fetch_array($result)
    ?>
    <h2 class="category"><?php echo "<span>".$row['kategorija']."</span>";?></h2>
    <section role="main" class="main">
        <div class="row">
            
            <h1 class="title"><?php echo $row['naslov'];?></h1>
            <p>OBJAVLJENO: <?php echo "<span>".$row['datum']."</span>";?></p>
        </div>
        <section class="slika">
            <?php
            echo '<img src="' . UPLPATH . $row['slika'] . '">';
            ?>
        </section>
        <section class="about">
            <p><?php echo "<i>".$row['sazetak']."</i>";?></p>
        </section>
        <section class="sadrzaj">
            <p><?php echo $row['tekst'];?></p>
        </section>
    </section>
    <footer>
        <hr>
        <p>&copy; 2023 BBC. The BBC is not responsible for the content of external sites. Read about our approach to external linking.</p>
    </footer>
    </body>
</html>

