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


        <?php
        include 'connect.php'; 
            if (isset($_POST["naslov"], $_POST["sazetak"],$_POST["tekst"], $_POST["kategorija"])){

                $naslov = $_POST['naslov'];
                $sazetak = $_POST['sazetak'];
                $tekst = $_POST['tekst'];
                $kategorija = $_POST['kategorija'];
                $slikaPutanja = "";
                $datum=date('d.m.Y.'); 
                if(isset($_POST['arhiva'])){ 
                    $arhiva=1; 
                }else{ 
                    $arhiva=0; 
                } 

                if (isset($_FILES["slika"]) && $_FILES["slika"]["error"] == 0) {
                    $target_dir = "img/";
                    $target_file = $target_dir . basename($_FILES["slika"]["name"]);
                    if (move_uploaded_file($_FILES["slika"]["tmp_name"], $target_file)) {
                        $slikaPutanja = $target_file;
                    } else {
                        echo "<p>Došlo je do greške prilikom uploadanja slike.</p>";
                    }
                }


                $query = "INSERT INTO administracija (datum, naslov, sazetak, tekst, slika, kategorija, 
                arhiva ) VALUES ('$datum', '$naslov', '$sazetak', '$tekst', '$slikaPutanja', 
                '$kategorija', '$arhiva')"; 
                
                $result = mysqli_query($dbc, $query) or die('Error querying databese.'); 
                mysqli_close($dbc);

                
                echo "<article>";
                echo "<h2>" . $naslov . "</h2>";
                if ($slikaPutanja) {
                    echo "<img src='" . $slikaPutanja . "' alt='Slika vijesti'>";
                }
                echo "<p><strong>Kategorija:</strong> " . $kategorija . "</p>";
                echo "<p><strong>Kratki Sažetak:</strong> " . $sazetak . "</p>";
                echo "<p><strong>Tekst Vijesti:</strong><br>" . nl2br($tekst) . "</p>";
                echo "<p><strong>Datum stvaranja članka:</strong> ". $datum . "</p>";
                echo "</article>";
            } else {
                echo "<p>Došlo je do greške. Molimo pokušajte ponovo.</p>";
            }
            
        ?>
    </body>
</html>