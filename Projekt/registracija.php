<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style><?php include 'style.css';?></style>
    <title>PWA projekt - Matej Bahmec</title>
    <script>
        function validateForm() {
            var ime = document.forms["registrationForm"]["ime"].value;
            var prezime = document.forms["registrationForm"]["prezime"].value;
            var korisnickoIme = document.forms["registrationForm"]["korisnicko_ime"].value;
            var lozinka1 = document.forms["registrationForm"]["lozinka1"].value;
            var lozinka2 = document.forms["registrationForm"]["lozinka2"].value;

            var errorMessage = "";
            var errorColor = "red";

            if (ime === "") {
                errorMessage += "Ime nije uneseno.\n";
            }

            if (prezime === "") {
                errorMessage += "Prezime nije uneseno.\n";
            }

            if (korisnickoIme === "") {
                errorMessage += "Korisničko ime nije uneseno.\n"
            }

            if (lozinka1 !== lozinka2) {
                errorMessage += "Lozinke se ne podudaraju.\n";
            }

            if (errorMessage !== "") {
                alert(errorMessage);
                return false;
            }
        }
    </script>
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
    <div class="forma-container">
        <form name="registrationForm" class="forma-style" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" onsubmit="return validateForm();">
            <label for="ime">Ime:</label><br>
            <input type="text" name="ime" required><br>
            
            <label for="prezime">Prezime:</label><br>
            <input type="text" name="prezime" required><br>

            <label for="korisnicko_ime">Korisničko ime:</label><br>
            <input type="text" name="korisnicko_ime" required><br>
            
            <label for="lozinka1">Lozinka:</label><br>
            <input type="password" name="lozinka1" required><br>
            
            <label for="lozinka2">Potvrdi lozinku:</label><br>
            <input type="password" name="lozinka2" required><br><br>
            
            <input type="submit" name="submit" value="Prijavi se">
        </form>
    </div>

    <?php
        if (isset($_POST['submit'])) {
            include 'connetion.php';
            if ($_POST['lozinka1'] === $_POST['lozinka2']) {
                $ime = $_POST['ime'];
                $prezime = $_POST['prezime'];
                $korisnicko_ime = $_POST['korisnicko_ime'];
                $lozinka = password_hash($_POST['lozinka1'], PASSWORD_DEFAULT);
                $razina = 0; // postavljamo razinu na 0 za sve nove korisnike

                $stmt = mysqli_prepare($dbc, "INSERT INTO korisnik (ime, prezime, korisnicko_ime, lozinka, razina) VALUES (?, ?, ?, ?, ?)");

                mysqli_stmt_bind_param($stmt, "ssssi", $ime, $prezime, $korisnicko_ime, $lozinka, $razina);

                if (mysqli_stmt_execute($stmt)) {
                    echo "Registracija uspješna.";
                } else {
                    echo "Greška prilikom registracije: " . mysqli_error($dbc);
                }

                mysqli_stmt_close($stmt);
                mysqli_close($dbc);
            } else {
                echo "Lozinke se ne podudaraju.";
            }
        }
    ?>

    <footer>
        <hr>
        <p>&copy; 2023 BBC. The BBC is not responsible for the content of external sites. Read about our approach to external linking.</p>
    </footer>
    
    
</body>
</html>
