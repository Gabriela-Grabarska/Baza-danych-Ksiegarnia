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
    <h1><a class="button">MODYFIKOWANIE DANYCH ZAKUPU</a></h1>
        <a href="index.php" class="button">Powrót do strony głównej</a><br>
        <p>
            <a href="modyfikuj_klienci.php" class="button">Modyfikuj dane klienta</a><br>
            <a href="modyfikuj_ksiazki.php" class="button">Modyfikuj dane produktu</a><br>
            <a href="modyfikuj_zakupy.php" class="button">Modyfikuj dane zakupu</a><br>     
</ul>
</p>
        <form action="modyfikuj_zakupy.php" method="POST">
            Wybierz ID zakupu, którego dane chcesz zmodyfikować:<br><br>
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

            <label>Wybierz nowe id klienta:
                <select name="k">
                    <?php
                     $query = "SELECT  `Id_klient`, `Imię`, `Nazwisko`, `Adres`, `Adres_numer_domu`, `Adres_miasto`, `Numer_telefonu`, `Płeć` FROM klient";
                     $result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['Id_klient'] . "'>" . $row['Id_klient'] . " - " . $row['Imię'] . " " . $row['Nazwisko'] . ", adres: " . $row['Adres'] . " " . $row['Adres_numer_domu'] . " " . $row['Adres_miasto'] . ", numer telefonu: " . $row['Numer_telefonu'] . " " . $row['Płeć'] . "</option>";
                    }
                    ?>
                </select>
            </label><br><br>

            <label>Wybierz nowe id produktu:
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

            <label>Podaj nową datę zakupu: <input type="date" name="d"></label><br><br>

            <input type="reset"  value="Wyczyść">
            <input type="submit" value="Modyfikuj">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $conn = mysqli_connect("localhost", "root", "", "ksiegarnia_bazy_danych");

            if (empty($_POST["id"]) || empty($_POST["k"]) || empty($_POST["p"]) || empty($_POST["d"])) {
                echo "<h2>Wprowadź wszystkie dane</h2>";
            } else {
                $id = $_POST["id"];
                $klient = $_POST["k"];
                $produkt = $_POST["p"];
                $data = $_POST["d"];
                $zap = "UPDATE zakupy SET Id_klienta='$klient', Id_produktu='$produkt', Data_zakupu='$data' WHERE Id_zakupy = $id";
                if (mysqli_query($conn, $zap)) {
                    echo "<h3>Zmodyfikowano pomyślnie</h3>";
                } else {
                    echo "<h2>Błąd modyfikacji: " . mysqli_error($conn) . "</h2>";
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
