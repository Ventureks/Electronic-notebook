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
        <h1>Lekcja 3 - Zmienne, stałe, typy danych i operatory.</h1>
        <hr>
    </header>    
    <b>Zmienna</b> jest to rzecz którą podczas prowadzenia kodu można zmieniać. <br>
    <b>Stała</b> jest to rzecz która jest na stałe przypisane do pewnych liczb czy też wyrazów.
    <h1>ZDEFINIOWANIE ZMIENNYCH</h1> <br>
<b>Zmienna</b>, to nic innego jak kontener przechowujący w sobie pewną wartość, którą można „podmieniać” w trakcie realizacji skryptu. <br>

W celu zdefiniowania zmiennej w języku php, należy użyć znaku $, a następnie podać nazwę zmiennej np. $zmienna, $suma itd. <br>

Podczas tworzenia nazw zmiennych powinniśmy przestrzegać pewnych zasad: <br>
<ul>
<li>nazwa zmiennej nie może rozpoczynać się od cyfry</li>
<li>nie powinna zawierać polskich znaków</li>
<li>w nazwie nie umieszczamy spacji</li>
<li>używamy tylko liter, cyfr i znaków podkreślnika</li>
<li>rozróżniana jest wielkość liter</li>
</ul>

<h3>Przykład deklaracji zmiennych:</h3>

$a = 10; <br>
$b = 3;
<br><br>
Jak możemy zauważyć – nie trzeba deklarować typu zmiennej! <br> PHP sam identyfikuje typ zmiennej, w zależności od jej zawartości.
<h1>STAŁE</h1>
<b>Stała</b>, to kontener przechowujący wartość, która jest niezmienna w trakcie realizacji skryptu. <br>

W odróżnieniu od zmiennej, stałą należy zdefiniować, a jej nazwę podajemy drukowanymi literami: <br>

<u>define(’NAZWA_STALEJ’, wartość_stałej);</u> <br> <br>

<h1>WYŚWIETLANIE ZMIENNYCH I STAŁYCH</h1> <br>
W celu wyświetlenia zmiennej i/lub stałej wystarczy użyć instrukcji echo: <br>
<br>
$zmienna = "Ala"; <br>
echo $zmienna; 
<br>
define('STALA', "kota"); <br>
echo STALA;
<h1>ZADANIA</h1>
    <h1>Zadanie 1</h1>
<?php
echo "Tomorrow I’ll learn PHP global variables.";
echo "This is a bad command : del c:\\*.*";
?>
<hr>
<h1>Zadanie 2</h1>
<?php
$zmienna = "KOCHAM PHP";
echo $zmienna;
?>
<hr>
<h1>Zadanie 3</h1>
<?php
define('URL', "www.facebook.com");
echo URL;
?>
</body>
</html>