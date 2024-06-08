<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Članak</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <h1>Zagreb News Sport</h1>
        <nav>
            <a href="index.php">Početna</a>
            <a href="index.php?kategorija=nogomet">Nogomet</a>
            <a href="index.php?kategorija=košarka">Košarka</a>
            <a href="login.html">Administracija</a>
        </nav>
    </header>
    <div class="content">
        <?php
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id = intval($_GET['id']);
            include 'connect.php';
            
            $sql = "SELECT naslov, slika, tekst, kategorija, datum FROM administracija WHERE id = $id AND arhiva = 1";
            $result = $dbc->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "<article>";
                echo "<h2>" . htmlspecialchars($row["naslov"]) . "</h2>";
                if (!empty($row["slika"])) {
                    echo "<img src='" . htmlspecialchars($row["slika"]) . "' alt='Slika vijesti'>";
                }
                echo "<p><strong>Kategorija:</strong> " . htmlspecialchars($row["kategorija"]) . "</p>";
                echo "<p><strong>Datum:</strong> " . htmlspecialchars($row["datum"]) . "</p>";
                echo "<p>" . nl2br(htmlspecialchars($row["tekst"])) . "</p>";
                echo "</article>";
            } else {
                echo "<p>Članak nije pronađen.</p>";
            }

            $dbc->close();
        } else {
            echo "<p>Neispravan ID članka.</p>";
        }
        ?>
    </div>
    <footer>
        <p>Borna Šafar bsafar@tvz.hr 2024</p>
    </footer>
</body>
</html>
