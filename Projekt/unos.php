<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <li><a href="administracija.php">Administracija</a></li>
            <li><a href="unos.php">Unos Administrator</a></li>
          </ul>
        </nav>
    </header>
    
    <form action="skripta.php" method="POST" enctype="multipart/form-data">
        <div class="form-item">
            <label for="title">Naslov vijesti</label>
            <div class="form-field">
                <input type="text" name="title" class="form-field-textual">
            </div>
        </div>
        <div class="form-item">
            <label for="about">Kratki sadržaj vijesti (do 50 znakova)</label>
            <div class="form-field">
                <textarea name="about" id="" cols="30" rows="10" class="form-field-textual"></textarea>
            </div>
        </div>
        <div class="form-item">
            <label for="content">Sadržaj vijesti</label>
            <div class="form-field">
                <textarea name="content" id="" cols="30" rows="10" class="form-field-textual"></textarea>
            </div>
        </div>
        <div class="form-item">
            <label for="pphoto">Slika: </label>
            <div class="form-field">
                <input type="file" accept="image/jpg, image/png" class="input-text" name="pphoto"/>
            </div>
        </div>
        <div class="form-item">
            <label for="category">Kategorija vijesti</label>
            <div class="form-field">
                <select name="category" id="" class="form-field-textual">
                    <option value="sport">Sport</option>
                    <option value="vijesti">News</option>
                </select>
            </div>
        </div>
        <div class="form-item">
            <label>Spremiti u arhivu: 
                <div class="form-field">
                    <input type="checkbox" name="archive">
                </div>
            </label>
        </div>
        <div class="form-item">
            <button type="reset" value="Poništi">Poništi</button>
            <button type="submit" name="submit" value="Prihvati">Prihvati</button>
        </div>
    </form>
    

    <footer class="unos">
        <hr>
        <p>&copy; 2023 BBC. The BBC is not responsible for the content of external sites. Read about our approach to external linking.</p>
    </footer>
</body>
</html>
    