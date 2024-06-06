<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" type="text/css" href="style.css"> 
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
            <?php
                if (isset($_GET["kategorija"])){
                    $kategorija = $_GET['kategorija'];
                    include 'connect.php'; 
                    $sql = "SELECT naslov, slika, sazetak, tekst, kategorija, datum FROM administracija WHERE kategorija = '$kategorija' ORDER BY id DESC ";
                    $result = $dbc->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<article>";
                            echo "<h2>" . htmlspecialchars($row["naslov"]) . "</h2>";
                            if ($row["slika"]) {
                                echo "<img src='" . htmlspecialchars($row["slika"]) . "' alt='Slika vijesti'>";
                            }
                            echo "<p><strong>Kategorija:</strong> " . htmlspecialchars($row["kategorija"]) . "</p>";
                            echo "<p><strong>Kratki Sažetak:</strong> " . htmlspecialchars($row["sazetak"]) . "</p>";
                            echo "<p><strong>Tekst Vijesti:</strong><br>" . nl2br(htmlspecialchars($row["tekst"])) . "</p>";
                            echo "<p><strong>Datum stvaranja članka:</strong> ". htmlspecialchars($row["datum"]) . "</p>";
                            echo "</article>";
                        }
                    } else {
                        echo "<p>Nema arhiviranih vijesti.</p>";
                    }

                    $dbc->close();
                }
            ?>
        </div>
        


        <footer>
            <p>Borna Šafar bsafar@tvz.hr 2024</p>
        </footer>

    </body>

</html>