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
<h1><a class="button">WPROWADZANIE DANYCH PRODUKTU</a></h1>
    <a href="index.php" class="button">Powrót do strony głównej</a><br>
    <span>
    <p>
            <a href="wprowadz_klienci.php" class="button">Wprowadzanie danych klienta</a><br>
            <a href="wprowadz_ksiazki.php" class="button">Wprowadzanie danych produktu</a><br>
            <a href="wprowadz_zakupy.php" class="button">Wprowadzanie danych zakupu</a><br>     
</ul>
</p>
</span>
    <form action="wprowadz_ksiazki.php" method="POST">
        Podaj dane produktu, które chcesz wprowadzić:<br><br>
       <label> Podaj nazwę wydawnictwa: <input type="text" name="wyd"></label><br><br>
       <label> Podaj autora książki: <input type="text" name="au"></label><br><br>
        <label>Podaj tytuł książki: <input type="float" name="tyt"></label><br><br>
        <label>Podaj rok wydania książki: <input type="text" name="rw"></label><br><br>
        <label> Podaj kod książki: <input type="text" name="kod"></label><br><br>
        <label> Podaj cenę książki: <input type="text" name="ce"></label><br><br>
            <input type="reset" VALUES="Wyczyść">
            <input type="submit" VALUES="Wprowadź">
    </form>
    <?php
    $conn = mysqli_connect("localhost","root","","ksiegarnia_bazy_danych");
    if (empty($_POST["wyd"]) || !isset($_POST["wyd"]) ||empty($_POST["au"]) || !isset($_POST["au"]) || empty($_POST["tyt"]) || !isset($_POST["tyt"]) || empty($_POST["rw"]) || 
    !isset($_POST["rw"]) || empty($_POST["kod"]) || !isset($_POST["kod"]) || empty($_POST["ce"]) || !isset($_POST["ce"]))
    {
        return;
    } 
    $wydawnictwo = $_POST["wyd"];
    $autor = $_POST["au"];
    $tytul = $_POST["tyt"];
    $rok_wydania= $_POST["rw"];
    $kod = $_POST["kod"];
    $cena = $_POST["ce"];
    $zap = "INSERT INTO `produkt` (`Id_produkt`, `Wydawnictwo`, `Autor`, `Tytuł`, `Rok_wydania`, `Kod_produktu`, `Cena_w_zł`) VALUES
(null,'$wydawnictwo','$autor', '$tytul', '$rok_wydania','$kod', '$cena')";
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