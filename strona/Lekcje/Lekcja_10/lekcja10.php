<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styl_lekcje.css" >
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Lekcja 10 - operacje na strukturze systemu plików</h1>
        <hr>
    </header>
   <h1> Dołączanie plików </h1>
   <br>
Jeżeli nasz skrypt zawiera dużo kodu możemy go podzielić na mniejsze partie, a później „sklejać” w całość. Po co? Zobaczmy.

<h3>dołączanie pliku</h3><br>
Wiemy już jaki jest sens dzielenia pliku, ale jak to później połączyć? ano tak:

<h3>include()</h3> <br>
dołącza plik do kodu, w razie braku pliku generuje ostrzeżenie kontynuując pracę skryptu

<h3>include_once()</h3> <br>
dołącza plik do kodu jednokrotnie, w razie braku pliku generuje ostrzeżenie kontynuując pracę skryptu

<h3>require()</h3> <br>
dołącza plik do kodu, w razie braku pliku generuje błąd i przerywa działanie skryptu

<h3>require_once() </h3> <br>
dołącza plik do kodu jednokrotnie, w razie braku pliku generuje błąd i przerywa działanie skryptu

Funkcje include_once() i require_once() są przydatne jeśli chcemy uniknąć ponownego definiowania funkcji i klas z pliku – PHP sprawdza czy dołączany plik nie był dołączony już wcześniej.

Nasze pliki wyglądają teraz tak:

header.php

<!DOCTYPE html> 
    <html> 
        <head> 
            <title>Przykład</title> 
        </head> 
        <body>
menu.php

        <div id="menu">
            <ul>
                <li>Start</li>
                <li>Kontakt</li>
            </ul>
        </div>
footer.php

        <p>to jest stopka strony</p>
    </body>
</html>
index.php
<!--
<?php 
require_once("header.php"); 
require_once("menu.php"); 
?> 

<div>I tutaj umieszczamy wszystko co chcemy na naszej stronie</div> 

<?php 
require_once("footer.php"); 
?>
PAMIĘTAJ gdzie znajdują się pliki żeby podać poprawnie ścieżkę dostępu!

ZADANIE: 

Dostosuj swoją stronę do powyższego przykładu. Podziel ją na poszczególne moduły,
a następnie za pomocą require_once() połącz ją w calość. Funkcje operacji na strukturze systemu plików
Pełną listę funkcji znajdziecie w dokumentacji PHP – funkcje systemu katalogów, poniżej najczęściej wykorzystywane.

getcwd()
Wskazuje bieżący katalog roboczy

echo getcwd();   // bieżący katalog w jakim się znajdujesz np. home/php/
chdir()
Zmienia bieżący katalog roboczy (lokalizację) na podany w parametrze.

echo getcwd() . "\n";   // bieżący katalog w jakim się znajdujesz np. home/php/
chdir('public_html');   // zmiana bieżącego katalogu
echo getcwd() . "\n";   // bieżący katalog np. home/php/public_html/
scandir()
Wypisze wszystkie pliki i katalogi z określonej lokalizacji. Pierwszy parametr to lokalizacja katalogu, drugi to sortowanie: 0 (rosnąco – domyślny) lub 1(malejąco)

$dir    = '/tmp';
$files1 = scandir($dir);
$files2 = scandir($dir, 1);

print_r($files1);
print_r($files2);
otrzymamy

Array
(
    [0] => .
    [1] => ..
    [2] => bar.php
    [3] => foo.txt
    [4] => jakiśkatalog
)
Array
(
    [0] => jakiśkatalog
    [1] => foo.txt
    [2] => bar.php
    [3] => ..
    [4] => .
)
!-->
</body>
</html>