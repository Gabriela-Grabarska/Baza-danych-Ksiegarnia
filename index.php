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
    <a href="baza.php">Struktura bazy</a>
    <a href="wprowadz.php">Wprowadzanie danych</a>
    <a href="wyswietl.php">Wyświetlanie danych</a>
    <a href="kasuj.php">Kasowanie danych</a>
    <a href="modyfikuj.php">Modyfikowanie danych</a>
    <a href="raport.php">Raport</a>
</nav>
<main>
    <span>
    <h1><a class="button">STRONA GŁÓWNA</a></h1>
        <p>
       
            Celem ćwiczenia jest utworzenie w języku SQL przykładowej struktury relacyjnej.<br>
            Rozpoczynamy od zapoznania się z przygotowanymi szczegółowymi założeniami. <br>
            Należy określić wymagane relacje i związki między nimi.<br>
            Następnie, z wykorzystaniem programu MySQL Workbench/phpMyAdmin zaimplementować <br>
            strukturę relacyjną. Do bazy należy wprowadzić kilka przykładowych rekordów do <br>
            każdej z tabel. Dane powinny być „sensowne” (przykładowo dla kolumn: <br>
            imie, nazwisko, data_urodzenia sensowne dane to „Jan Nowak 10-03-1954” a zupełnie <br>
            bezsensowne „aghfggfdsas jhfdjf 03-01-2600”). <br>
            <br>Na koniec należy utworzyć witrynę zawierającą skrypty:<br>
            <ul>
                <li> wprowadzające dane do bazy;</li>
                <li> wyświetlające dane z bazy (samodzielnie ustalić kryteria wybierania danych do wyświetlenia);</li>
                <li> kasujący dane;</li>
                <li> modyfikujący dane;</li>
                <li>forma raportu (np.: sprzedaż w poszczególnych miesiącach: /miesiąc/kwota/ilość.</li>
            </ul>
        </p>
    </span>
</main>
<<footer>
<p>Stronę wykonała: Gabriela Grabarska, numer albumu 43840 </p>
&copy wszelkie prawa zastrzeżone
</footer>  
</body>
</html>
