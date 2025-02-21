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
    <h1><a class="button">WPROWADZANIE DANYCH PRODUKTU</a></h1>
        <a href="index.php" class="button">Powrót do strony głównej</a><br>
        <span>
        <p>
            <a href="wprowadz_klienci.php" class="button">Wprowadzanie danych klienta</a>
            <a href="wprowadz_ksiazki.php" class="button">Wprowadzanie danych produktu</a><br>
            <a href="wprowadz_zakupy.php" class="button">Wprowadzanie danych zakupu</a><br>     
</ul>
</p>
</span>
        <form action="wprowadz_zakupy.php" method="POST">
            Podaj dane zakupu, które chcesz wprowadzić:<br><br>
            
            <label> Wybierz id klienta:
                <select name="k">
                    <?php
                    $conn = mysqli_connect("localhost", "root", "", "ksiegarnia_bazy_danych");
                    $query = "SELECT  `Id_klient`, `Imię`, `Nazwisko`, `Adres`, `Adres_numer_domu`, `Adres_miasto`, `Numer_telefonu`, `Płeć` FROM klient";
                    $result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($result)) 
                    {
                        echo "<option value='" . $row['Id_klient'] . "'>" . $row['Id_klient'] . " - " . $row['Imię'] . " " . $row['Nazwisko'] . ", adres: " . $row['Adres'] . " " . $row['Adres_numer_domu'] . " " . $row['Adres_miasto'] . ", numer telefonu: " . $row['Numer_telefonu'] . " " . $row['Płeć'] . "</option>";
                    }
                    ?>
                </select>
            </label><br><br>

            <label> Wybierz id produktu:
                <select name="p">
                    <?php
                    $query = "SELECT `Id_produkt`, `Wydawnictwo`, `Autor`, `Tytuł`, `Rok_wydania`, `Kod_produktu`, `Cena_w_zł` FROM produkt";
                    $result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['Id_produkt'] . "'>" . $row['Id_produkt'] . " - wydawnictwo: " . $row['Wydawnictwo'] . ", autor: " . $row['Autor'] . ", tytuł: ' " . $row['Tytuł'] . " ' ". ", rok wydania: " . $row['Rok_wydania'] . ", kod produktu: " . $row['Kod_produktu'] . ", cena: " . $row['Cena_w_zł'] . " zł " . "</option>";
                    }

                    mysqli_close($conn);
                    ?>
                </select>
            </label><br><br>

            <label> Podaj datę zakupu: <input type="date" name="d"></label><br><br>

            <input type="reset" value="Wyczyść">
            <input type="submit" value="Wprowadź">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $conn = mysqli_connect("localhost", "root", "", "ksiegarnia_bazy_danych");

            if (empty($_POST["k"]) || empty($_POST["p"]) || empty($_POST["d"])) {
                echo "<h2>Wprowadź wszystkie dane</h2>";
            } else {
                $klient = $_POST["k"];
                $produkt = $_POST["p"];
                $data = $_POST["d"];
                $zap = "INSERT INTO zakupy (`Id_zakupy`, `Id_klienta`, `Id_produktu`, `Data_zakupu`) 
                        VALUES (null, '$klient', '$produkt', '$data')";
                if (mysqli_query($conn, $zap)) {
                    echo "<h3>Wprowadzono pomyślnie</h3>";
                } else {
                    echo "<h2>Błąd wprowadzania: " . mysqli_error($conn) . "</h2>";
                }
            }

            mysqli_close($conn);
        }
        ?>
    </span>
</main>
<footer>
<p>Stronę wykonała: Gabriela Grabarska, numer albumu 43840 </p>
&copy wszelkie prawa zastrzeżone
</footer>
</body>
</html>
