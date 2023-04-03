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
        <h1>Lekcja 9 - operacje na tablicach</h1>
        <hr>
    </header>
    Tablice są typem zmiennych zawierającym uporządkowany zbiór danych. Pełnią ważną rolę w aplikacjach internetowych z bazą danych – służą do gromadzenia wyselekcjonowanych danych i manipulowania nimi.
Do zmiennych tych uzyskuje się dostęp przez pole w nawiasie kwadratowym, które nazywamy index, podane bezpośrednio po nazwie zmiennej tablicowej. Podobnie przypisuje się wartość do elementu tablicy.

Tworzenie tablicy nazywamy inicjowaniem.

Przykład 1:

Inicjowanie tablicy za pomocą nawiasów kwadratowych [].

//tworzymy tablicę o nazwie $tablica

$tablica[0] = "Element w indeksie 0";
$tablica[1] = "Element w indeksie 1";
$tablica[2] = "Element w indeksie 2";
echo $tablica[2]; // Wyświetlony zostanie napis "Element w indeksie 2";

//tablicę możemy zdefiniować też tak

$tablica_index_nr=['wartość1','wartość2','wartość3'];
W powyższym przykładzie wskazujemy konkretny nr indeksu w jaki ma zostać wpisana wartość np. $tablica[0] = „Przykładowa wartość”;. Odczytujemy ten zapis jako: w tablicy o nazwie „tablica” wstaw do indexu „0” wartość „Przykładowa wartość”.

Podawanie indeksów nie jest konieczne:

$tablica[0] = "Wpis numer 0"; 
$tablica[] = "Wpis numer 1"; 
$tablica[] = "Wpis numer 2";

echo '<pre>';
print_r($tablica);
echo '</pre>';

/*
Wyświetli:
Array (
    [0] => Wpis numer 0 
    [1] => Wpis numer 1 
    [2] => Wpis numer 2
)
*/
Nie wskazanie podczas inicjowania tablicy konkretnych indexów danych uruchamia proces autonumerowania od ostatniej najwyższej wartości.

Przykład 2:

Inicjowanie tablicy za pomocą konstrukcji array().

//wymyślamy nazwę tablicy np. $tablica_index_nr_array

$tablica_index_nr_array=array('wartość1','wartość2','wartość3');

echo '<pre>';
print_r($tablica_index_nr_array);
echo '</pre>';

//lub

$tablica_index_nr_array = array (1 =>"pierwszy", 'a' =>"drugi", "trzeci")
Możemy wskazywać konkretne indeksy, w których chcemy wstawić wartości. Wykonujemy to za pomocą wskazania „index => wartość”.

Trochę więcej o array() niżej.

Elementem tablicy może być każdy typ zmiennej (z innymi tablicami i obiektami włącznie).

Tablica dwuwymiarowa, zawiera dwa indeksy, np. $tablica[0][2] = 1; O nich troszkę niżej.

is_array()
Funkcja ta sprawdza, czy zmienna jest tablicą. Zwraca TRUE lub FALSE

$zmienna= array('to ','jest ', 'tablica');
echo is_array($zmienna) ? 'tablica' : 'nie tablica'; //wyświetli "tablica"
 
Tablica asocjacyjna
W PHP występuje też inny rodzaj tablic, tak zwane tablice asocjacyjne. Są to tablice, w których zamiast indeksów liczbowych używa się identyfikatorów znakowych (kluczy), a po polsku – nadajemy indeksom nazwy słowne, tak jak w nagłówkach zwykłej tabeli:

$tablica["imie"] = "Ala";
$tablica["nazwisko"] = "Jabłońska";
$tablica["adres"] = "Łaska 61";
echo $tablica["imie"]." ".$tablica["nazwisko"].", ul. ".$tablica['adres']."<br />";
Zwróćcie uwagę na poniższy skrypt:

$tablica[0]["nazwa"] = "konserwa";
$tablica[0]["cena"] = 10.5;
$tablica[1]["nazwa"] = "chleb";
$tablica[1]["cena"] = 2.76;

for ($i=0;$i<2;$i++)
    {
    echo $tablica[$i]["nazwa"].
        " ".$tablica[$i]["cena"]."<br>";
    };
echo $tablica[0]["cena"]+$tablica[1]["cena"];
Do poszczególnych pól w tablicy są wpisywane różne typy danych: zarówno liczby (integer), jak i ciągi znaków (string). Nie ma to wpływu na działanie tablicy, nie musimy ujednolicać typu zmiennych.

W powyższym przykładzie została zastosowana pętla for do odczytu elementów tablicy, przy założeniu że znamy liczbę elementów w tablicy.

Inny sposób definiowania tablic i tablica wielowymiarowa
Tablice można również definiować wykorzystując składnię array() o czym wspomniałam wyżej.
Składnia „indeks => wartości”, oddzielona przecinkami, definiuje pary indeksów i wartości. Indeks może być dowolnego typu – int lub string. Jeśli indeks zostanie pominięty, automatycznie wygenerowany zostanie indeks będący liczbą całkowitą, poczynając od 0. Jeśli indeks jest liczbą całkowitą, następny wygenerowany indeks będzie miał wartość „największy indeks + 1”. Jeśli pojawią się dwie wartości o tym samym indeksie, ostatnia nadpisze wcześniejsze.

Tablica wielowymiarowa to nic innego jak umieszczanie tablic wewnątrz indeksów.
Poniższy przykład demonstruje jak stworzyć wielowymiarową tablicę.

Przykład bardziej złożonego użycia array( ):

$owoce = array (
  "owoce"  => array ("a"=>"pomarańcza", "b"=>"banan", "c"=>"jabłko"),
  "liczby" => array (1, 2, 3, 4, 5, 6),
  "dziury" => array ("pierwszy", 5 =>"drugi", "trzeci")
);
echo $owoce["owoce"]["a"]." ".$owoce["owoce"]["b"];

//liczby w sekwencji rosnącej
$liczby=range(1, 10); //rosną o 1 
$liczby2=range(1, 10, 2); //rosną o 2

//litery w sekwencji rosnącej
$litery=range('a', 'z');

//kopiowanie tablicy
$kopia_tablicy=$tablica_index_nr_array;
Aby w całości wyświetlić tablicę (podejrzeć jej zawartość) – wykorzystujemy funkcje:
print_r ($zmienna_tablicowa);
lub
var_dump($zmienna_tablicowa);

 
print_r()
wyświetla tablice w sposób jasny i przejrzysty dla programisty, pokazując nazwy indeksów:

<pre>
<?php

    $a=array(
      'a' => 'jabłko', 
      'b' => 'banan', 
      'c' => array ('x', 'y', 'z')
    );

print_r($a);

?>
</pre>

/*zostanie wyświetlone:
Array
(
    [a] => jabłko
    [b] => banan
    [c] => Array
        (
            [0] => x
            [1] => y
            [2] => z
        )
)
*/
Aby  dodać kolejny wpis na końcu tabeli wystarczy przy przypisywaniu wartości nie wpisywać indeksu do nawiasów kwadratowych. Jeśli w ten sposób dodawane są wpisy do nowej tablicy, to pierwszy wpis ma indeks 0.

Indeks można też podawać ze zmiennej, a nawet z innej tablicy czy funkcji:

$tablicaA[] = 0;
$tablicaA[] = 1;

$tab_as_index[] = "something";
$tab_as_index[] = "else";

echo $tab_as_index[$tablicaA[0]];
array_push()
Funkcja dodaje element/y na końcu tablicy i jest szybsza niż [].

$array = array(); //deklarujemy pustą tablicę
for ($i = 1; $i <= 10; $i++)
{
    array_push($array, $i); // dodajemy do istniejącej tablicy następne elementy
}
echo '<pre>';
print_r($array);
echo '</pre>';
/* wyświetlone zostanie:
Array ( 
   [0] => 1 
   [1] => 2 
   [2] => 3 
   [3] => 4 
   [4] => 5 
   [5] => 6 
   [6] => 7 
   [7] => 8 
   [8] => 9 
   [9] => 10 
)
*/
 
Przeglądanie tablic
Zazwyczaj po utworzeniu tablicy chcemy wykonać na niej operacje, czyli chcemy przejrzeć jej elementy. Dokonać tego możemy za pomocą pętli: for, while, do…while lub foreach.

W sytuacji, gdy chcemy przejrzeć tablicę z indexami numerycznymi, korzystamy z pętli for, while, do…while lub foreach.

W przypadku tablicy asocjacyjnej lub z indexami mieszanymi należy skorzystać z pętli foreach lub konstrukcji list().

Przykład przeglądania tablicy z indexami numerycznymi, gdy znamy liczbę elementów:

$tablica = array(1,2,3,4,5,6);
for($i = 0; $i <= 5; $i++) {  
    echo $tablica[$i];
}
Gdy nie znamy liczby elementów tablicy korzystamy z funkcji count():

count($nazwa_tablicy)
Zwraca ona liczbę elementów podanej w nawiasach tablicy.

for($i = 0; $i <= 5; $i++)
{
   $tablica[]=$i;
}

for($i = 0; $i < count($tablica); $i++){
   echo $tablica[$i];
}
 
list()
Przypisuje zmienne tak jakby były tablicą
Instrukcja list() jest używana do przypisywania listy zmiennych w jednej operacji.

Przykład użycia list() (https://www.php.net/manual/en/function.list.php)

$info = array('kawa', 'brązowa', 'kofeina');
// Listowanie wszystkich zmiennych
list($napój, $kolor, $składnik) = $info;
print $napój." jest ".$kolor." a ".$składnik." czyni ją wyjątkową"."<BR/>";
// Listowanie niektórych elementów
list($napój, , $składnik) = $info;
print $napój." zawiera:". $składnik."<br />";
// Albo przeskoczmy od razu do trzeciego
list( , , $składnik) = $info;
echo "Potrzebna jest mi". $składnik."<br />"; 
We wcześniejszych wersjach PHP (poniżej 7.2) wykorzystywano również konstrukcję each(), została ona zdeprecjonowana i usunięta w PHP 8.0.

Pętla foreach służy do wykonywania operacji na kolejnych elementach tablicy.

$tablica=array('a' => 'jabłko', 'b' => 'banan', 'c' => 'gruszka');
foreach ($tablica as $wart) 
{ 
	echo $wart.'<br>'; 
}
jeżeli chcemy operować również na indeksach, możemy je pobrać:

$tablica=array('a' => 'jabłko', 'b' => 'banan', 'c' => 'gruszka');
foreach ($tablica as $klucz=>$wart) 
{ 
	echo $klucz.'->'.$wart.'<br>'; 
}
reset()
Ustawia wskaźnik na 1szym elemencie tablicy.

Sortowanie tablic
PHP oferuje cały zestaw funkcji służących do sortowania tablic. Są to: asort(), arsort(), ksort(), krsort(), sort(), rsort(), uasort(), usort(), i uksort(). Większość funkcji (oprócz trzech ostatnich) przyjmuje jeden parametr: zmienną zawierającą tablicę do posortowania. Żadna z funkcji nie zwraca żadnego wyniku.

UWAGA: funkcje zwracają uwagę na wielkość znaków – najpierw sortują po wielkich literach, później po małych.

Działanie poszczególnych funkcji:

asort()
sortuje tablice asocjacyjne zachowując przypisanie kluczy do wartości:

$owoce = array ("d"=>"mango", "a"=>"papaja", "b"=>"banan", "c"=>"aronia");
asort ($owoce);
foreach ($owoce as $key=>$o)
{
    echo $key." = ".$o."<br/>";
}
Wynikiem działania powyższego przykładu powinno być:
c = aronia
b = banan
d = mango
a = papaja

arsort()
sortuje w odwrotnej kolejności tablice asocjacyjne zachowując przypisanie kluczy do wartości. Funkcja prawie identyczna jak poprzednia, tyle że dane sortowane są „od tyłu”.

ksort()
sortuje tablice asocjacyjne według kluczy. Powyższy przykład po podmianie funkcji asort na ksort powinna dać taki wynik:
a = papaja
b = banan
c = aronia
d = mango

krsort()
sortuje w odwrotnej kolejności tablice asocjacyjne według kluczy. Funkcja prawie identyczna jak poprzednia, tyle że dane sortowane są „od tyłu”.

sort()
sortuje zwykłe tablice (nie asocjacyjne) w kolejności alfabetycznej po wartościach. Funkcja resetuje przypisanie kluczy.

rsort()
sortuje zwykłe tablice (nie asocjacyjne) w odwróconej kolejności. Funkcja resetuje przypisanie kluczy.

uasort()
funkcja sortująca tablice asocjacyjne za pomocą zdefiniowanej przez użytkownika funkcji porównującej elementy (nazwa funkcji jest podawana za pomocą drugiego parametru). https://www.php.net/manual/en/function.uasort.php

usort()
funkcja sortująca zwykłe tablice za pomocą funkcji zdefiniowanej przez użytkownika. https://www.php.net/manual/en/function.usort.php

uksort()
funkcja sortująca tablice asocjacyjne według klucza za pomocą funkcji zdefiniowanej przez użytkownika. https://www.php.net/manual/en/function.uksort.php

  Tworzenie ciągów tekstowych z tablic i odwrotnie
PHP umożliwia zamianę ciągów tekstowych na tablice i odwrotnie. Działa to podobnie jak w przypadku Excel’owskiego pliku CSV rozdzielanego przecinkami lub innym znakiem. Ale możliwości jest dużo więcej.

explode()
funkcja służy do rozdzielania ciągów na tablicę

Jako pierwszy parametr trzeba do niej podać znak lub dłuższy ciąg który oddziela kolejne pola, jako drugi ciąg do rozdzielenia. Opcjonalnie można podać trzeci argument, który oznacza maksymalną liczbę pól – jeśli jest ich więcej niż ta liczba, to ostatnie pole będzie zawierało wszystkie pozostałe pola. Funkcja zwraca tablicę zawierającą kolejne pola.
Przykład:

$dane="alfa;beta;gamma;delta";
$tablica = explode(";", $dane);
implode()
funkcja służy do łączenia pól tablicy w jeden ciąg

Jako pierwszy parametr podawany jest ciąg za pomocą którego „sklejane” są elementy tablicy, a jako drugi właśnie tablica do posklejania. Zwracany jest ciąg zawierający „posklejane” elementy. Przykład zastosowania:

$dane = implode(";", $tablica);
str_split()
Funkcja rozdziela ciąg na tablicę. Budowa:

str_split(tekst[,długość_podziału]) 

<?php
$str = "Hello Friend";

$arr1 = str_split($str);
$arr2 = str_split($str, 3);
echo '<pre>';
print_r($arr1);
print_r($arr2);
echo '</pre>';

/* zostanie wyświetlone
Array
(
    [0] => H
    [1] => e
    [2] => l
    [3] => l
    [4] => o
    [5] =>  
    [6] => F
    [7] => r
    [8] => i
    [9] => e
    [10] => n
    [11] => d
)
Array
(
    [0] => Hel
    [1] => lo 
    [2] => Fri
    [3] => end
)
*/
?>
</body>
</html>