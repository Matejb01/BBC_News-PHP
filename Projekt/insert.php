<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
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
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $slanjeForme = true;
    $date = date('d.m.Y');

    if (empty($_POST['title']) || strlen($_POST['title']) < 5 || strlen($_POST['title']) > 30) {
        $slanjeForme = false;
        echo '<span class="bojaPoruke">Naslov vjesti mora imati između 5 i 30 znakova!</span><br>';
    } else {
        $title = $_POST['title'];
    }

    if (empty($_POST['about']) || strlen($_POST['about']) < 10 || strlen($_POST['about']) > 100) {
        $slanjeForme = false;
        echo '<span class="bojaPoruke">Kratki sadržaj mora imati između 10 i 100 znakova!</span><br>';
    } else {
        $about = $_POST['about'];
    }

    if (empty($_POST['content'])) {
        $slanjeForme = false;
        echo '<span class="bojaPoruke">Sadržaj mora biti unesen!</span><br>';
    } else {
        $content = $_POST['content'];
    }

    if (!isset($_FILES['pphoto']) || $_FILES['pphoto']['error'] !== UPLOAD_ERR_OK) {
        $slanjeForme = false;
        echo '<span class="bojaPoruke">Slika mora biti unesena!</span><br>';
    } else {
        $pphoto = $_FILES['pphoto']['name'];
        move_uploaded_file($_FILES['pphoto']['tmp_name'], $pphoto);
    }

    if (empty($_POST['category'])) {
        $slanjeForme = false;
        echo '<span class="bojaPoruke">Kategorija mora biti odabrana!</span><br>';
    } else {
        $category = $_POST['category'];
    }

    if ($slanjeForme) {
        echo "<section role='main' class='main-insert'>";
        echo " <div class='row'>";
        echo "<p class='category-insert'> $category</p>";
        echo "<h1 class='title'> $title</h1>";
        echo "<p>OBJAVLJENO: $date</p>";
        echo "</div>";
        echo "<section class='slika'>";
        echo "<img src=\"$pphoto\" alt=\"Slika\">";
        echo "</section>";
        echo "<section class='about'>";
        echo "<p> $about</p>";
        echo "</section>";
        echo "<section class='sadrzaj'>";
        echo "<p>$content</p>";
        echo "</section>";
        echo "</section>";
    } else {
        echo '<p>Forma nije ispravno popunjena. Molimo ispravite pogreške i pokušajte ponovno.</p>';
    }
}
?>

    <footer>
        <hr>
        <p>&copy; 2023 BBC. The BBC is not responsible for the content of external sites. Read about our approach to external linking.</p>
    </footer>
</body>
</html>
