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
        <h1>Lekcja 7 - obsługa daty i czasu</h1>
        <hr>
    </header>
    <h1>Funkcje daty i czasu</h1> <br>
Pełną listę funkcji znajdziecie w dokumentacji PHP,  poniżej najczęściej wykorzystywane. <br>

time() <br>
Zwraca aktualny uniksowy znacznik czasu

int time(void) <br>
Zwraca aktualny czas, podawany jako liczba sekund, które upłynęły od nastania Ery Unixu: 1 stycznia 1970, 0:00:00 GMT. <br>

$teraz = time(); <br>
$następnyTydzien = time() + (7 * 24 * 60 * 60); // 7 dni; 24 godziny; 60 minut; 60 sekund <br>
date() <br>
Formatuje lokalny czas/datę. <br>

string date ( string $format [, int $timestamp = time() ] ) <br> <br> <br>

<!--
    Poniższych znaków używa się jako tekstu w parametrze format

Zawartość parametru format	Opis	Przykład zwróconej wartości
Dzień	—	—
d	Dzień miesiąca, 2 cyfry z wiodącymi zerami	01 do 31
D	Tekstowy opis angielskiej nazwy dnia, trzy litery	Mon kończąc na Sun
j	Dzień miesiąca bez zer wiodących	1 do 31
l (mała litera 'L’)	Pełen angielski opis dnia tygodnia	Sunday aż do Saturday
N	Liczbowa forma dnia tygodnia, zgodna z normą ISO-8601 (dodana
w PHP 5.1.0)	1 (dla Poniedziałku) aż do 7 (dla Niedzieli)
S	Angielski przyrostek porządkowy dla dnia miesiąca, 2 litery	st, nd, rd lub
th. Dobrze wygląda w połączeniu z j
w	Liczbowa forma dnia tygodnia	0 (dla Niedzieli) aż do 6 (dla Soboty)
z	Dzień roku (Zaczynając od 0)	0 aż do 365
Tydzień	—	—
W	Numer tygodnia w roku, zgodny z normą ISO-8601, Tygodnie rozpoczynają Poniedziałki (dostępne od PHP 4.1.0)	Przykład: 42 (42. tydzień roku)
Miesiąc	—	—
F	Pełen angielski opis, dnia miesiąca, taki jak January czy March	January aż do December
m	Liczbowa forma miesiąca, z zerami wiodącymi	01 aż do 12
M	Krótki, angielski opis miesiąca, trzy litery	Jan a do Dec
n	Liczbowa forma miesiąca, bez zer wiodących	1 aż do 12
t	Ilość dni w danym miesiącu	28 do 31
Rok	—	—
L	Informacja o tym, czy rok jest przestępnym	1 jeśli rok jest przestępny, 0 w przeciwnym wypadku.
o	Numer roku, zgodny z normą ISO-8601. Zwraca to taką samą wartość jak
Y, z takim wyjątkiem, że numer tygodnia ISO
(W) należy do poprzedniego lub następnego roku, niż rok
użyty w tym miejscu. (dodane w PHP 5.1.0)	Przykłady: 1999 lub 2003
Y	Pełna liczbowa forma roku, 4 cyfry	Przykłady: 1999 lub 2003
y	Dwie cyfry reprezentujące rok	Przykłady: 99 or 03
Czas	—	—
a	Pora dnia – dwie małe litery (przed/po południu) (ang. Ante/Post meridiem)	am lub pm
A	Pora dnia – dwie duże litery (przed/po południu) (ang. Ante/Post meridiem)	AM lub PM
B	Swatch Internet Time	000 aż do 999
g	Godzina, w formacie 12-godzinnym, bez zer wiodących	1 aż do 12
G	Godzina, w formacie 24-godzinnym, bez zer wiodących	0 aż do 23
h	Godzina, w formacie 12-godzinnym, z zerami wiodącymi	01 aż do 12
H	Godzina, w formacie 24-godzinnym, z zerami wiodącymi	00 through 23
i	Minuty z zerami wiodącymi	00 do 59
s	Sekundy, z zerami wiodącymi	00 aż do 59
u	Mikrosekundy (dodano w PHP 5.2.2)	Przykład: 54321
v	Milisekundy (dodano w PHP 7.0.0).	Przykład: 654
Strefa czasowa	—	—
e	Identyfikator strefy czasowej (dodano w PHP 5.1.0)	Przykłady: UTC, GMT, Europe/Zagreb
I (duże i)	Informacja o tym, czy czas jest letni	1 jeśli czas jest letni, 0 w przeciwnym razie.
O	Różnica z czasem Greenwich (GMT) w godzinach	Przykład: +0200
P	Różnica z czasem Greenwich (GMT) z dwukropkiem pomiędzy godzinami i minutami (dodano w PHP 5.1.3)	Przykład: +02:00
T	Skrót dla strefy czasowej	Przykłady: EST, MDT …
Z	Różnica dla strefy czasowej w sekundach. Wyrównanie to jest zawsze ujemne dla stref położonych na zachód
od południka 0, oraz dodatnie dla tych leżących na wschódod niego.	-43200 aż do 50400
Pełna Data/Czas	—	—
c	Data w standardzie ISO 8601 (dodana w PHP 5)	2004-02-12T15:19:21+00:00
r	Data sformatowana zgodnie z » RFC 2822	Przykład: Thu, 21 Dec 2000 16:01:07 +0200
U	Sekundy liczone od ery UNIX-a (1 stycznia 1970 00:00:00 czasu Greenwich – GMT)	Zobacz także time()
!-->

<h1>getdate()</h1>
Pobiera informację o dacie/czasie

array getdate ([ int $timestamp = time() ] ) <br>
Funkcja zwraca tablicę asocjacyjną, a $timestamp to znacznik czasowy – nie musimy go podawać, jest ustawiany automatycznie (jest to ilość sekund od nastania Ery Unixu: 1 stycznia 1970, 0:00:00 GMT). <br>

Przykład: <br>

$dzisiaj = getdate(); <br>
print_r($dzisiaj); <br>
Zostanie wyświetlone: <br>

Array <br>
( <br>
    [seconds] => 40 <br>
    [minutes] => 58 <br>
    [hours]   => 21 <br>
    [mday]    => 17 <br>
    [wday]    => 2 <br>
    [mon]     => 6 <br>
    [year]    => 2003 <br>
    [yday]    => 167 <br> 
    [weekday] => Tuesday <br>
    [month]   => June <br> 
    [0]       => 1055901520 <br>
) <br>
<h1>microtime() </h1>
Zwraca aktualny uniksowy znacznik czasu z mikrosekundami <br>

string microtime(void) <br>
Zwraca łańcuch znaków „msec sec”, gdzie sec jest aktualnym czasem, mierzonym jako liczba sekund od uniksowej Epoki (1 stycznia 1970, 0:00:00 GMT), natomiast msec jest aktualną liczbą mikrosekund. Funkcja ta dostępna jest wyłącznie na systemach operacyjnych, które obsługują wywołanie systemowe gettimeofday(). <br>

Obydwie części łańcucha znaków są podawane w sekundach.

$time_start = microtime(true);
usleep(100);  //zawiesza wykonanie skryptu na czas wyrażony w mikrosekundach <br>
$time_end = microtime(true); <br>
$time = $time_end - $time_start; <br>

echo "Nie robiłeś nic przez $time sekund\n"; <br>
<h1>mktime() </h1> 
Zwraca uniksowy znacznik czasu dla konkretnej daty <br>

int mktime ([ int $hour = date("H") [, int $minute = date("i") [, int $second = date("s") [, int $month = date("n") [, int $day = date("j") [, int $year = date("Y") [, int $is_dst = -1 ]]]]]]] ) <br>
    <?php

    function sameDay($ts1, $ts2)
    {
       if (date("Y", $ts1) != date("Y", $ts2)) {
          return False;
       }
       if (date("m", $ts1) != date("m", $ts2)) {
          return False;
       }
       if (date("d", $ts1) != date("d", $ts2)) {
          return False;
       }
       return True;
    }
    
    $date1 = mktime(19, 30, 0, 12, 10, 2001);   
    $date2 = mktime(10, 12, 0, 12, 10, 2001);   
    $date3 = mktime(19, 30, 0, 12, 11, 2001);   
    
    if (sameDay($date1, $date2)) {
       echo "Daty 1 i 2 są z tego samego dnia";
    }
    
    if (sameDay($date1, $date3)) {
       echo "Daty 1 i 3 są z tego samego dnia";
    }
    ?>
    ?>
</body>
</html>