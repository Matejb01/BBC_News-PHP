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
    
    <!-- Forma za prijavu -->
    <div class="forma-container">
        <form method="POST" action="" class="forma-style">
            <label for="korisnicko_ime">Korisničko ime:</label><br>
            <input type="text" id="korisnicko_ime" name="korisnicko_ime" required><br>

            <label for="lozinka">Lozinka:</label><br>
            <input type="password" id="lozinka" name="lozinka" required><br><br>

            <button type="submit" name="login">Prijavi se</button>
        </form>
    </div>
<?php
    session_start();

    if (isset($_POST['login'])) {
        include 'connetion.php';

        $korisnicko_ime = mysqli_real_escape_string($dbc, $_POST['korisnicko_ime']);
        $lozinka = mysqli_real_escape_string($dbc, $_POST['lozinka']);

        $query = "SELECT * FROM korisnik WHERE korisnicko_ime = '$korisnicko_ime'";
        $result = mysqli_query($dbc, $query);
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            if (password_verify($lozinka, $row['lozinka'])) {
                $_SESSION['korisnik_id'] = $row['id'];
                $_SESSION['korisnicko_ime'] = $row['korisnicko_ime'];
                $_SESSION['razina'] = $row['razina'];

                if ($row['razina'] > 0) {
                    header('Location: administracija.php');
                    exit();
                } else {
                    echo '<p> Pozdrav ' . $_SESSION['korisnicko_ime'] . '! Uspješno ste prijavljeni, ali nemate ovlasti za administraciju. </p> ';
                }
            } else {
                echo '<p> Neispravno korisničko ime ili lozinka. </p>';
            }
        } else {
            echo '<p> Korisnik ne postoji. Registrirajte se <a href="registracija.php"> ovdje. </a> </p>';
        }

        mysqli_close($dbc);
    }
?>

    <footer>
        <hr>
        <p>&copy; 2023 BBC. The BBC is not responsible for the content of external sites. Read about our approach to external linking.</p>
    </footer>
</body>
</html>

