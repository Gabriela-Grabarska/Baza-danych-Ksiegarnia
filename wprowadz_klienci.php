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
<main><span>
<h1><a class="button">WPROWADZANIE DANYCH KLIENTA</a></h1>
    <a href="index.php" class="button">Powrót do strony głównej</a><br>
    <span>
    <p>
            <a href="wprowadz_klienci.php" class="button">Wprowadzanie danych klienta</a><br>
            <a href="wprowadz_ksiazki.php" class="button">Wprowadzanie danych produktu</a><br>
            <a href="wprowadz_zakupy.php" class="button">Wprowadzanie danych zakupu</a><br>     
</ul>
</p>

</span>
    <form action="wprowadz_klienci.php" method="POST">
        <br>Podaj dane klienta, którego chcesz wprowadzić:<br>
        <br><br>
       <label> Podaj imię: <input type="text" name="im"></label><br><br>
        <label>Podaj nazwisko: <input type="text" name="naz"></label><br><br>
        <label>Podaj ulicę: <input type="text" name="ad"></label><br><br>
        <label>Podaj numer domu/mieszkania: <input type="text" name="ad_nr_d"></label><br><br>
        <label>Podaj miasto: <input type="text" name="ad_m"></label><br><br>
        <label>Podaj telefon: <input type="text" name="tel"></label><br><br>
        Płeć:
        kobieta<input type="radio" name="plec" value="Kobieta"> 
        mężczyzna<input type="radio" name="plec" value="Mężczyna"><br><br>
            <input type="reset" VALUES="Wyczyść">
            <input type="submit" VALUES="Wprowadź">
    </form>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "ksiegarnia_bazy_danych");
    if (empty($_POST["im"]) || !isset($_POST["im"]) || empty($_POST["naz"]) || 
    !isset($_POST["naz"]) || empty($_POST["ad"]) || !isset($_POST["ad"]) || empty($_POST["ad_nr_d"]) || !isset($_POST["ad_nr_d"]) 
    || empty($_POST["ad_m"]) || !isset($_POST["ad_m"]) || empty($_POST["tel"]) || !isset($_POST["tel"])) 
    {
        return;
    } 
    $imie = $_POST["im"];
    $nazwisko = $_POST["naz"];
    $adres = $_POST["ad"];
    $adres_numer_domu = $_POST["ad_nr_d"];
    $adres_miasto= $_POST["ad_m"];
    $telefon = $_POST["tel"];
    $plec = $_POST["plec"]; 
    $zap = "INSERT INTO `klient` (`Id_klient`, `Imię`, `Nazwisko`, `Adres`, `Adres_numer_domu`, `Adres_miasto`, `Numer_telefonu`, `Płeć`) VALUES
(null,'$imie', '$nazwisko', '$adres', '$adres_numer_domu', '$adres_miasto', '$telefon','$plec')";
    if (mysqli_query($conn,$zap)) 
   {
       echo "<h3>Wprowadzono pomyślnie</h3>";
   }
   else { 
       echo "<h2>Błąd wprowadzania</h2>";
    }
    mysqli_close($conn);
    ?>
</span>
</main>
<footer>
<p>Stronę wykonała: Gabriela Grabarska, numer albumu 43840 </p>
&copy wszelkie prawa zastrzeżone
</footer>
</body>
</html>