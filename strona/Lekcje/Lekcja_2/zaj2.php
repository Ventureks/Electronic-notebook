<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styl_lekcje.css">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Lekcja 2 - Pierwszy skrypt, komentarze i echo.</h1>
        <hr>
    </header>
<h1>Wyświetlanie tekstu w przeglądarce</h1>
<?php
echo "<br>"; //w ten sposób dodajemy wyświetlanie nowej linii

//wyświetlanie wielu linii
echo "Ten zapis obejmuje wiele linii, ale zostaną one wyświetlone w jednej linii, ponieważ sama instrukcja echo nie widzi w tym przypadku znaków nowej linii"; 

echo "<br>";
echo "<br>Ten zapis również obejmuje wiele linii.<br>
Będą one wyświetlane, w wielu liniach,<br>
przez dodanie znacznika nowego wiersza.";  

echo "<br>";
//alternatywna metoda wyświetlania. PHP umożliwia tworzenie wielowierszowych ciągów znaków za pomocą operatora <<<, czyli tzw. składni heredoc (here-document) umożliwiającej dosłowne wstawianie bloków tekstowych z zachowaniem miejsc łamania wierszy i innych białych znaków (w tym wcięć).Działa pod warunkiem, iż łańcuch rozpocznie się i zakończy tym samym słowem, w tym wypadku END. Nie jest to jednak metoda często spotykana.
echo <<<_END
Ten tekst może być wielolinijkowy w w edytorze.
Sprawdź czy zostanie tak wyświetlony w przeglądarce.
_END;

echo "<br>";

//wyświetlanie znaków specjalnych tj. "" musimy poprzedzić backslash'em
echo "Jeżeli chcemy wyświetlić cudzysłów \"Przykład\"."; 

echo "<br>"; 
 
echo "Znak dolara \$";
echo "<br>";
echo "\"Tekst ujęty w znaki cudzysłowia\"";
echo "<br>";

// Wyświetlanie zawartości zmiennych 
$zmienna1 = "wartość zmiennej 1"; 
$zmienna2 = "wartość zmiennej 2"; 
echo "zmienna1 = $zmienna1, a zmienna2 = $zmienna2"; // wyświetli: zmienna1 = wartość zmiennej 1, a zmienna2 = wartość zmiennej 2

echo "<br>"; 

// używając apostrofu wyświetlamy dokładnie to co znajduje się pomiędzy apostrofami (nie pobiera zawartości zmiennej)
echo 'wartość zmiennej 1 znajduje się w $zmienna1'; // wyświetli: wartość zmiennej 1 znajduje się w $zmienna1 

echo "<br>"; 

// jeżeli wyświetlamy samą zmienną nie musimy używać cudzysłowów, ani apostrofów 
echo $zmienna1; // wartość zmiennej 1

echo "<br>"; 

echo "Wartością zmiennej \$zmienna1 jest $zmienna1 <br>"; 

echo "<br>"; 
//łączenie wielu elementów do wyświetlenia
echo $zmienna1.$zmienna2."<br>"; // za pomocą kropki dołączamy kolejne zmienne 
echo $zmienna1,$zmienna2,"<br>"; // przecinek działa podobnie, nie jest używany - stosujemy kropkę

// łączenie wielu elemetów - tekstu i zmiennych  
echo 'Można '.'łączyć '.'wiele '.'elementów '.' oraz dodawać zmienne '.$zmienna1.'<br>';

// wyświetlanie tablicowe
$tablica = array("indeks" => "wartość"); 
echo "wartość dla indeksu = {$tablica['indeks']} !"; 
// wyświetli: wartość dla indeksu = wartość !

echo "<br>";

// wyświetlanie z warunkiem jeżeli (warunek) ? 'wartość gdy prawda' : 'wartość gdy fałsz'
echo ($zmienna1) ? 'true' : 'false';
?>
<hr>
<br><br>
    <?php
    //komentarz liniowy
    # też komentarz

    /*
    komentarz wieloliniowy
    */

    //wyświetlanie tekstu

    echo "Hello World<br><br>"; //Wyświetli piekna nazwe

    echo 'wyswietlanie apostrofem';

    $zmienna = "Ala";

    echo $zmienna;

    echo "to jest\"slowo\" w cudzys lowie";

    $zmienna2 = "Kot ma";

    echo $zmienna." ma kota. I".$zmienna2."Alę.</br>";
    echo "$zmienna ma kota. I $zmienna2 Alę.</br>";

    echo "<h2>nagłówek</h2>";
    echo "<a href=\"zaj1.php\">link</a>"
    ?>
</body>
</html>