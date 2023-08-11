
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>PWA projekt - Matej Bahmec</title>
</head>
<body>
    <?php
        include 'connetion.php';
        if(isset($_POST['submit'])){
            $picture = $_FILES['pphoto']['name'];
            $title=$_POST['title'];
            $about=$_POST['about'];
            $content=$_POST['content'];
            $category=$_POST['category'];
            $date=date('d.m.Y.');

            if(isset($_POST['archive'])){
                $archive=1;
            }else{
                $archive=0;
            }

            $target_dir = 'slike/'.$picture;
            move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);

            $query = "INSERT INTO vijesti (datum, naslov, sazetak, tekst, slika, kategorija, arhiva ) 
                    VALUES ('$date', '$title', '$about', '$content', '$picture', '$category', '$archive')";

            $result = mysqli_query($dbc, $query) or die('Error querying databese.');
            mysqli_close($dbc);
        }
    ?>
    <header>
        <div class="logo">
          <img src="slike/BBC-logo.png" alt="Logo">
        </div>
        <nav>
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="kategorija.php?id=politika">News</a></li>
            <li><a href="kategorija.php?id=sport">Sport</a></li>
            <li><a href="login.php">Prijava</a></li>
            <li><a href="registracija.php">Registracija</a></li>
          </ul>
        </nav>
    </header>
    <section role="main" class="main">
        <div class="row">
            <p class="category"><?php echo $category; ?></p>
            <h1 class="title"><?php echo $title; ?></h1>
            <p>AUTOR:</p>
            <p>OBJAVLJENO:</p>
        </div>

        <section class="slika">
            <?php echo "<img src='slike/$picture'"; ?>
        </section>

        <section class="about">
            <p><?php echo $about; ?></p>
        </section>

        <section class="sadrzaj">
            <p><?php echo $content; ?></p>
        </section>

        <div class="archive">
            <p>Spremiti u arhivu: <?php echo $archive; ?></p>
        </div>

    </section>

    <footer class="skripta">
        <hr>
        <p>&copy; 2023 BBC. The BBC is not responsible for the content of external sites. Read about our approach to external linking.</p>
    </footer>

</body>
</html>


