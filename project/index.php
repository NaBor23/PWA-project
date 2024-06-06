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
            <h2>Nogomet</h2>

            <section>
            <?php
                include 'connect.php'; 
                $sql = "SELECT id, naslov, slika, sazetak FROM administracija WHERE arhiva = 1 AND kategorija = 'nogomet' ORDER BY id DESC LIMIT 3";
                $result = $dbc->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<article>";
                        echo "<h3><a href='clanak.php?id=" . $row["id"] . "'>" . $row["naslov"] . "</a></h3>";
                        if (!empty($row["slika"])) {
                            echo "<img src='" . $row["slika"] . "' alt='Slika vijesti'>";
                        }
                        echo "<p>" . $row["sazetak"] . "</p>";
                        echo "</article>";
                    }
                } else {
                    echo "<p>Nema arhiviranih vijesti.</p>";
                }

                $dbc->close();
            ?>
            </section>

            
            
            <h2>Košarka</h2>
            <section>
                <?php
                    include 'connect.php'; 
                    $sql = "SELECT id, naslov, slika, sazetak FROM administracija WHERE arhiva = 1 AND kategorija = 'košarka' ORDER BY id DESC LIMIT 3";
                    $result = $dbc->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<article>";
                            echo "<h3><a href='clanak.php?id=" . $row["id"] . "'>" . $row["naslov"] . "</a></h3>";
                            if (!empty($row["slika"])) {
                                echo "<img src='" . $row["slika"] . "' alt='Slika vijesti'>";
                            }
                            echo "<p>" . $row["sazetak"] . "</p>";
                            echo "</article>";
                        }
                    } else {
                        echo "<p>Nema arhiviranih vijesti.</p>";
                    }

                    $dbc->close();
                ?>
            </section>
        </div>
        <footer>
            <p>Borna Šafar bsafar@tvz.hr 2024</p>
        </footer>
    </body>
 
</html>