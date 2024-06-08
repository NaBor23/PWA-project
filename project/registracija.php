<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'connect.php';

    $username = $_POST['username'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];


    if ($password1 !== $password2) {
        echo "<p>Lozinke se ne podudaraju. Molimo unesite iste lozinke.</p>";
    } else {

        $hashed_password = password_hash($password1, PASSWORD_BCRYPT);


        $sql_check_user = "SELECT * FROM korisnik WHERE korisnicko_ime='$username'";
        $result_check_user = mysqli_query($dbc, $sql_check_user);

        if (mysqli_num_rows($result_check_user) > 0) {
            echo "<p>Korisničko ime već postoji. Molimo odaberite drugo korisničko ime.</p>";
        } else {

            $sql_insert_user = "INSERT INTO korisnik (korisnicko_ime, lozinka, prava) VALUES ('$username', '$hashed_password', 0)";

            if (mysqli_query($dbc, $sql_insert_user)) {
                echo "<p>Registracija uspješna. Sada se možete <a href='login.php'>prijaviti</a>.</p>";
            } else {
                echo "<p>Registracija nije uspjela. Molimo pokušajte ponovno.</p>";
            }
        }
    }

    mysqli_close($dbc);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registracija</title>
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
    <div class="registration-container">
        <h2>Registracija</h2>
        <form action="registracija.php" method="POST">
            <label for="username">Korisničko ime:</label>
            <input type="text" id="username" name="username" required><br>

            <label for="password1">Lozinka:</label>
            <input type="password" id="password1" name="password1" required><br>

            <label for="password2">Ponovite lozinku:</label>
            <input type="password" id="password2" name="password2" required><br>

            <button type="submit">Registriraj se</button>
        </form>
    </div>
    <footer>
        <p>Borna Šafar bsafar@tvz.hr 2024</p>
    </footer>
</body>
</html>
