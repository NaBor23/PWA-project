<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unos Vijesti</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script defer src="validation.js"></script>
</head>
<body>
    <header>
        <h1>Zagreb News Sport</h1>
        <nav>
            <a href="index.php">Početna</a>
            <a href="kategorija.php?kategorija=nogomet">Nogomet</a>
            <a href="kategorija.php?kategorija=košarka">Košarka</a>
            <a href="login.php">Administracija</a>
        </nav>
    </header>
    <div class="content">
        <h2>Unos Vijesti</h2>
        <form name="unosVijesti" action="skripta.php" method="POST" enctype="multipart/form-data">
            <label for="naslov">Naslov Vijesti:</label>
            <input type="text" id="naslov" name="naslov" required>
            <span class="error" id="porukaNaslov"></span>
            <br>

            <label for="sazetak">Kratki Sažetak:</label>
            <textarea id="sazetak" name="sazetak" rows="4" required></textarea>
            <span class="error" id="porukaSazetak"></span>
            <br>

            <label for="tekst">Tekst Vijesti:</label>
            <textarea id="tekst" name="tekst" rows="8" required></textarea>
            <span class="error" id="porukaTekst"></span>
            <br>

            <label for="kategorija">Kategorija Vijesti:</label>
            <select id="kategorija" name="kategorija" required>
                <option value="">Odaberite kategoriju</option>
                <option value="nogomet">Nogomet</option>
                <option value="košarka">Košarka</option>
            </select>
            <span class="error" id="porukaKategorija"></span>
            <br>

            <label for="slika">Odabir Slike:</label>
            <input type="file" id="slika" name="slika" accept="image/*" required>
            <span class="error" id="porukaSlika"></span>
            <br>

            <label for="arhiva">Prikaži obavijest na stranici:</label>
            <input type="checkbox" id="arhiva" name="arhiva">
            <br>

            <button type="submit" id="slanje">Pošalji</button>
        </form>
    </div>
    <footer>
        <p>Borna Šafar bsafar@tvz.hr 2024</p>
    </footer>
</body>
</html>
