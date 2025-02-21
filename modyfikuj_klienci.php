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
    <h1><a class="button">MODYFIKOWANIE DANYCH KLIENTA</a></h1>
        <a href="index.php" class="button">Powrót do strony głównej</a><br>
        <p>
            <a href="modyfikuj_klienci.php" class="button">Modyfikuj dane klienta</a><br>
            <a href="modyfikuj_ksiazki.php" class="button">Modyfikuj dane produktu</a><br>
            <a href="modyfikuj_zakupy.php" class="button">Modyfikuj dane zakupu</a><br>     
</ul>
</p>
        <form action="modyfikuj_klienci.php" method="POST">
            Wybierz ID klienta, którego dane chcesz zmodyfikować:<br><br>
            <label>ID klienta:
                <select name="id">
                    <?php
                    $conn = mysqli_connect("localhost", "root", "", "ksiegarnia_bazy_danych");
                    $query = "SELECT  `Id_klient`, `Imię`, `Nazwisko`, `Adres`, `Adres_numer_domu`, `Adres_miasto`, `Numer_telefonu`, `Płeć` FROM klient";
                    $result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['Id_klient'] . "'>" . $row['Id_klient'] . " - " . $row['Imię'] . " " . $row['Nazwisko'] . ", adres: " . $row['Adres'] . " " . $row['Adres_numer_domu'] . " " . $row['Adres_miasto'] . ", numer telefonu: " . $row['Numer_telefonu'] . " " . $row['Płeć'] . "</option>";
                    }
                    ?>
                </select>
            </label><br><br>
            <label> Podaj nowe imię: <input type="text" name="im"></label><br><br>
            <label> Podaj nowe nazwisko: <input type="text" name="naz"></label><br><br>
            <label>Podaj nową ulicę: <input type="text" name="ad"></label><br><br>
            <label>Podaj nowy numer domu/mieszkania: <input type="text" name="ad_nr_d"></label><br><br>
            <label>Podaj nowe miasto: <input type="text" name="ad_m"></label><br><br>
            <label>Podaj nowy telefon: <input type="text" name="tel"></label><br><br>
            Płeć:
            kobieta<input type="radio" name="plec" value="Kobieta"> 
            mężczyzna<input type="radio" name="plec" value="Mężczyzna"><br><br>
            <input type="reset"  value="Wyczyść">
            <input type="submit" value="Wprowadź">
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $conn = mysqli_connect("localhost", "root", "", "ksiegarnia_bazy_danych");

            if (empty($_POST["id"]) || !isset($_POST["id"]) || empty($_POST["im"]) || !isset($_POST["im"]) || empty($_POST["naz"]) || 
                !isset($_POST["naz"]) || empty($_POST["ad"]) || !isset($_POST["ad"]) || empty($_POST["ad_nr_d"]) || !isset($_POST["ad_nr_d"]) 
                || empty($_POST["ad_m"]) || !isset($_POST["ad_m"]) || empty($_POST["tel"]) || !isset($_POST["tel"])) 
            {
                echo "<h2>Wprowadź wszystkie dane do modyfikacji</h2>";
            } else {
                $id = $_POST["id"];
                $imie = $_POST["im"];
                $nazwisko = $_POST["naz"];
                $adres = $_POST["ad"];
                $adres_numer_domu = $_POST["ad_nr_d"];
                $adres_miasto= $_POST["ad_m"];
                $telefon = $_POST["tel"];
                $plec = $_POST["plec"]; 
                $zap = "INSERT INTO `klient` (`Id_klient`, `Imię`, `Nazwisko`, `Adres`, `Adres_numer_domu`, `Adres_miasto`, `Numer_telefonu`, `Płeć`) VALUES
            (null,'$imie', '$nazwisko', '$adres', '$adres_numer_domu', '$adres_miasto', '$telefon','$plec')";
                $zap = "UPDATE klient SET Imię='$imie', Nazwisko='$nazwisko', Adres='$adres', 
                Adres_numer_domu='$adres_numer_domu', Adres_miasto='$adres_miasto', Numer_telefonu='$telefon', Płeć='$plec' 
                WHERE Id_klient = $id";
                if (mysqli_query($conn,$zap)) 
               {
                   echo "<h3>Wprowadzono pomyślnie</h3>";
               }
               else { 
                   echo "<h2>Błąd wprowadzania</h2>";
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
