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
        <h1><a class="button">KASOWANIE DANYCH ZAKUPU</a></h1>
        <a href="index.php" class="button">Powrót do strony głównej</a><br>
        <p>
            <a href="kasuj_klienci.php" class="button">Kasuj dane klienta</a><br>
            <a href="kasuj_ksiazki.php" class="button">Kasuj dane produktu</a><br>
            <a href="kasuj_zakupy.php" class="button">Kasuj dane zakupu</a><br>     
</ul>
</p>
        <form action="kasuj_zakupy.php" method="POST">
            Wybierz ID zakupu, którego dane chcesz skasować:<br><br>
            <label>ID zakupu:
                <select name="id">
                    <?php
                    $conn = mysqli_connect("localhost", "root", "", "ksiegarnia_bazy_danych");
                    $query = "SELECT `Id_zakupy`,`Id_klienta`, klient.Imię, klient.Nazwisko, klient.Adres, klient.Adres_numer_domu, klient.Adres_miasto, klient.Numer_telefonu, klient.Płeć,`Id_produktu`, produkt.Wydawnictwo, produkt.Autor, produkt.Tytuł, produkt.Rok_wydania, produkt.Kod_produktu, produkt.Cena_w_zł,`Data_zakupu` FROM `zakupy` INNER JOIN klient ON klient.Id_klient = zakupy.Id_klienta INNER JOIN produkt ON produkt.Id_produkt = zakupy.Id_produktu;";
                    $result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['Id_zakupy'] . "'>" . $row['Id_zakupy'] . " - Klient: " . $row['Imię'] . " " . $row['Nazwisko'] . ", Adres: " . $row['Adres'] . " " . $row['Adres_numer_domu'] . ", " . $row['Adres_miasto'] . ", Tel: " . $row['Numer_telefonu'] . ", Płeć: " . $row['Płeć'] . " | Produkt: " . $row['Wydawnictwo'] . ", Autor: " . $row['Autor'] . ", Tytuł: '" . $row['Tytuł'] . "' | Rok: " . $row['Rok_wydania'] . ", Kod: " . $row['Kod_produktu'] . ", Cena: " . $row['Cena_w_zł'] . " zł | Data zakupu: " . $row['Data_zakupu'] . "</option>";
                    }
                    ?>
                </select>
            </label><br><br>
            <input type="submit" value="Kasuj">
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $conn = mysqli_connect("localhost", "root", "", "ksiegarnia_bazy_danych");

            if (empty($_POST["id"]) || !isset($_POST["id"])) {
                echo "<h2>Wprowadź ID zakupu do skasowania</h2>";
            } else {
                $id = $_POST["id"];
                $zap = "DELETE FROM zakupy WHERE Id_zakupy = $id";
                if (mysqli_query($conn, $zap)) {
                    echo "<h3>Skasowano pomyślnie</h3>";
                } else {
                    echo "<h2>Błąd kasowania: " . mysqli_error($conn) . "</h2>";
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
