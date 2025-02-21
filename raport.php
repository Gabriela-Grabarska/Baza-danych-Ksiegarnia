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
        <h1><a class="button">RAPORT</a></h1>
        <a href="index.php" class="button">Powrót do strony głównej</a><br>

        <div class="tabela">
            <h4>Sprzedaż książek w poszczególnych miesiącach</h4>
            <form method="GET">
                <button type="submit" class="button" name="sort" value="ilosc_asc">Sortuj po ilości (rosnąco)</button>
                <button type="submit" class="button" name="sort" value="ilosc_desc">Sortuj po ilości (malejąco)</button>
                <button type="submit" class="button" name="sort" value="kwota_asc">Sortuj po kwocie (rosnąco)</button>
                <button type="submit" class="button" name="sort" value="kwota_desc">Sortuj po kwocie (malejąco)</button>
            </form>
            <table>
                <tr>
                    <th>Rok</th>
                    <th>Miesiąc zakupu</th>
                    <th>Ilość sprzedanych produktów</th>
                    <th>Łączna kwota (PLN)</th>
                </tr>
                <?php
                    $conn = mysqli_connect("localhost", "root", "", "ksiegarnia_bazy_danych");
                    $sql = "SET lc_time_names = 'pl_PL';";
                    mysqli_query($conn, $sql);

                    // Ustal sortowanie
                    $sort = 'IloscSprzedanychProduktow DESC, SumaCenaProduktow DESC'; // domyślne sortowanie

                    if (isset($_GET['sort'])) {
                        switch ($_GET['sort']) {
                            case 'ilosc_asc':
                                $sort = 'IloscSprzedanychProduktow ASC';
                                break;
                            case 'ilosc_desc':
                                $sort = 'IloscSprzedanychProduktow DESC';
                                break;
                            case 'kwota_asc':
                                $sort = 'SumaCenaProduktow ASC';
                                break;
                            case 'kwota_desc':
                                $sort = 'SumaCenaProduktow DESC';
                                break;
                        }
                    }

                    $sql = "SELECT YEAR(Data_zakupu) AS Rok,
                            CONCAT(UCASE(LEFT(DATE_FORMAT(Data_zakupu, '%M'), 1)), LCASE(SUBSTRING(DATE_FORMAT(Data_zakupu, '%M'), 2))) AS Miesiac,
                            COUNT(*) AS IloscSprzedanychProduktow,
                            ROUND(SUM(Cena_w_zł), 2) AS SumaCenaProduktow
                            FROM zakupy_klient_i_produkty
                            GROUP BY Rok, Miesiac
                            ORDER BY $sort;";

                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo
                        "<tr>
                            <td>" . $row['Rok'] . "</td>
                            <td>" . $row['Miesiac'] . "</td>
                            <td>" . $row['IloscSprzedanychProduktow'] . "</td>
                            <td>" . $row['SumaCenaProduktow'] . "</td>
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
&copy wszelkie prawa zastrzeżone
</footer>
</body>
</html>