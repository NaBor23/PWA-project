<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prijava</title>
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
    <div class="login-container">
        <h2>Prijava</h2>
        <form action="login.php" method="POST">
            <label for="username">Korisničko ime:</label>
            <input type="text" id="username" name="username" required><br>

            <label for="password">Lozinka:</label>
            <input type="password" id="password" name="password" required><br>

            <button type="submit">Prijavi se</button>
        </form>
        <div id="poruka" style="color: red;"></div>
    </div>
    <footer>
        <p>Borna Šafar bsafar@tvz.hr 2024</p>
    </footer>

    <script>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            include 'connect.php';

            $username = $_POST['username'];
            $password = $_POST['password'];


            $sql = "SELECT * FROM korisnik WHERE korisnicko_ime='$username'";
            $result = mysqli_query($dbc, $sql);

            if (mysqli_num_rows($result) > 0) {
                $user = mysqli_fetch_assoc($result);
                
                if (password_verify($password, $user['lozinka'])) {

                    if ($user['prava'] == 0) {
                        echo "document.getElementById('poruka').innerHTML = 'Korisničko ime, nemate dovoljna prava za pristup ovoj stranici.';";
                    } else {

                        $_SESSION['username'] = $username;
                        $_SESSION['prava'] = $user['prava'];
                        echo "window.location.replace('unos.php');"; 
                    }
                } else {
                    echo "document.getElementById('poruka').innerHTML = 'Pogrešna lozinka. Pokušajte ponovno.';";
                }
            } else {
                echo "document.getElementById('poruka').innerHTML = ' Korisničko ime nije pronađeno. <a href=registracija.php>Registracija</a>';";
            }

            mysqli_close($dbc);
        }
        ?>
    </script>
</body>
</html>
