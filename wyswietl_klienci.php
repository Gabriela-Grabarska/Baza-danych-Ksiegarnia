<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System zarządzania bazą danych</title>
    <link rel="stylesheet" href="styl.css">
    <link rel="icon" href="logo.png" type="image/png">
</head>
<body>
<header>
<img src="logo.png" alt="Logo" class="logo">
<div class="title"><h1>System zarządzania bazą danych księgarni</h1></div> 
</header>
<nav>
    <h2>Menu</h2>
    <a href="index.php">Strona główna</a><br>
    <a href="baza.php">Struktura bazy</a><br>
    <a href="wprowadz.php">Wprowadzanie danych</a><br>
    <a href="wyswietl.php">Wyświetlanie danych</a><br>
    <a href="kasuj.php">Kasowanie danych</a><br>
    <a href="modyfikuj.php">Modyfikowanie danych</a><br>
    <a href="raport.php">Raport</a><br>
</nav>
<main>
    <span>
    <h1><a class="button">WYŚWIETLANIE DANYCH KLIENTA</a></h1>
        <a href="index.php" class="button">Powrót do strony głównej</a><br>
        <p>
            <a href="wyswietl_klienci.php" class="button">Wyświetlanie danych klienta</a><br>
            <a href="wyswietl_ksiazki.php" class="button">Wyświetlanie danych produktu</a><br>
            <a href="wyswietl_zakupy.php" class="button">Wyświetlanie danych zakupu</a><br>
        </p>
        <div class="tabela">
            <h4>KLIENCI</h4>
            <table>
                <tr>
                    <th>Id klienta</th>
                    <th>Imię</th>
                    <th>Nazwisko</th>
                    <th>Adres</th>
                    <th>Numer domu</th>
                    <th>Miasto</th>
                    <th>Numer telefonu</th>
                    <th>Płeć</th>
                </tr>
                <?php
                $conn = mysqli_connect("localhost", "root", "", "ksiegarnia_bazy_danych");

                if (!$conn) {
                    die("Połączenie z bazą danych nieudane: " . mysqli_connect_error());
                }
                $sql = "SELECT * FROM `klient`;";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_row($result))
                 {
                    echo "<tr> 
                            <td>" . $row[0] . "</td> 
                            <td>" . $row[1] . "</td> 
                            <td>" . $row[2] . "</td> 
                            <td>" . $row[3] . "</td> 
                            <td>" . $row[4] . "</td> 
                            <td>" . $row[5] . "</td> 
                            <td>" . $row[6] . "</td> 
                            <td>" . $row[7] . "</td> 
                        </tr>";
                }
                mysqli_close($conn);
                ?>
            </table>
        </div>
    </span>
</main>
<footer>
    <p>Stronę wykonała: Gabriela Grabarska, numer albumu 43840 </p>
    &copy; wszelkie prawa zastrzeżone
</footer>
</body>
</html>
