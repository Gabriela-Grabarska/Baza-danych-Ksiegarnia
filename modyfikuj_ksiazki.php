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
    <h1><a class="button">MODYFIKOWANIE DANYCH PRODUKTU</a></h1>
        <a href="index.php" class="button">Powrót do strony głównej</a><br>
        <p>
            <a href="modyfikuj_klienci.php" class="button">Modyfikuj dane klienta</a><br>
            <a href="modyfikuj_ksiazki.php" class="button">Modyfikuj dane produktu</a><br>
            <a href="modyfikuj_zakupy.php" class="button">Modyfikuj dane zakupu</a><br>     
</ul>
</p>
        <form action="modyfikuj_ksiazki.php" method="POST">
            Wybierz ID produktu, którego dane chcesz zmodyfikować:<br><br>
            <label>ID produktu:
                <select name="id">
                    <?php
                    $conn = mysqli_connect("localhost", "root", "", "ksiegarnia_bazy_danych");
                    $query = "SELECT `Id_produkt`, `Wydawnictwo`, `Autor`, `Tytuł`, `Rok_wydania`, `Kod_produktu`, `Cena_w_zł` FROM produkt";
                    $result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['Id_produkt'] . "'>" . $row['Id_produkt'] . " - wydawnictwo: " . $row['Wydawnictwo'] . ", autor: " . $row['Autor'] . ", tytuł: ' " . $row['Tytuł'] . " ' ". ", rok wydania: " . $row['Rok_wydania'] . ", kod produktu: " . $row['Kod_produktu'] . ", cena: " . $row['Cena_w_zł'] . " zł " . "</option>";
                   }
                    ?>
                </select>
            </label><br><br>
            <label> Podaj nową nazwę wydawnictwa: <input type="text" name="wyd"></label><br><br>
            <label> Podaj nowego autora: <input type="text" name="au"></label><br><br>
            <label>Podaj nowy tytuł książki: <input type="float" name="tyt"></label><br><br>
            <label>Podaj nowy rok wydania: <input type="text" name="rw"></label><br><br>
            <label>Podaj nowy kod produktu: <input type="text" name="kod"></label><br><br>
            <label>Podaj nowy cenę w PLN: <input type="text" name="ce"></label><br><br>
            <input type="reset"  value="Wyczyść">
            <input type="submit" value="Wprowadź">
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $conn = mysqli_connect("localhost", "root", "", "ksiegarnia_bazy_danych");

            if (empty($_POST["id"]) || !isset($_POST["id"]) || empty($_POST["wyd"]) || !isset($_POST["wyd"]) || empty($_POST["au"]) || !isset($_POST["au"]) || empty($_POST["tyt"]) ||
                !isset($_POST["tyt"]) || empty($_POST["rw"]) || !isset($_POST["rw"]) || empty($_POST["kod"]) || !isset($_POST["kod"]) || empty($_POST["ce"]) || !isset($_POST["ce"]))
            {
                echo "<h2>Wprowadź wszystkie dane do modyfikacji</h2>";
            } else {
                $id = $_POST["id"];
                $wydawnictwo = $_POST["wyd"];
                $autor = $_POST["au"];
                $tytul = $_POST["tyt"];
                $rok_wydania= $_POST["rw"];
                $kod = $_POST["kod"];
                $cena = $_POST["ce"];
                $zap = "UPDATE produkt SET `Wydawnictwo` = '$wydawnictwo', `Autor` = '$autor', `Tytuł` = '$tytul', `Rok_wydania` = '$rok_wydania', `Kod_produktu` = '$kod',`Cena_w_zł` = '$cena'
                WHERE Id_produkt = $id";

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
