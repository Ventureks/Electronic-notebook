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
        <h1>Lekcja 6 - Funkcje, definiowanie funkcji oraz zwracanie ich wartości. Funkcje wbudowane.</h1>
        <hr>
    </header>
<!--
    Funkcje
Funkcja to zbiór instrukcji, który posiada nazwę, zbiór argumentów (ale nie musi posiadać argumentów) i znajduje się pomiędzy nawiasami {}. Pozwala na wyodrębnienie fragmentu kodu programu w celu uniknięcia powtórzeń i może być wielokrotnie wywoływana w kodzie.

W celu zdefiniowania funkcji należy podać jej nazwę, argumenty i instrukcje:

function przykladowa_nazwa_funkcji ($argument1,$argument2,$argument3.........) 
{
instrukcja1; 
instrukcja2; 
instrukcja3......
}
Funkcje mogą zwracać konkretne wartości lub wyświetlać komunikat.

Aby wywołać funkcję wystarczy podać jej nazwę z nawiasami!

przykladowa_nazwa_funkcji(); // wywołanie funkcji w kodzieecho i return
echo nie zwraca wartości tylko wyświetla wynik na ekranie;

return zwraca wartość, którą możemy później wykorzystać jako zmienną.

Przykład funkcji bez argumentów:

function wyswietl_tekst() // deklaracja funkcji bez argumentów
{
   echo "Witam serdecznie!";  // instrukcje do wykonania
}

wyswietl_tekst(); //ponieważ wewnątrz funkcji jest echo to dostaniemy napis: Witam serdecznie!
Przykład funkcji z argumentami:

function dodawanie($liczba1, $liczba2) 
{
   $wynik = $liczba1+$liczba2;
   echo $wynik;
}

dodawanie(2,3); //ponieważ wewnątrz funkcji jest echo to dostaniemy napis: 5
Przykład funkcji z return:

function dodawanie($liczba1, $liczba2) 
{ 
$wynik = $liczba1+$liczba2; 
return $wynik; 
} 
echo dodawanie(2,3);  // 5Zasięg zmiennych
NIE POWINNO SIĘ KORZYSTAĆ ZE ZMIENNYCH GLOBALNYCH! z uwagi na niebezpieczeństwo ataków z zewnątrz lub nieplanowanej zmiany zadeklarowanej wcześniej zmiennej (są one zapamiętywane w tablicy superglobalnej $GLOBALS).

$zmienna_poza_funkcja = 'zmienna gdzieś w kodzie';

function wykorzystuje_zmienna_spoza_funkcji()
{
global $zmienna_poza_funkcja; //musimy dodac słowo "global" do zmiennej z kodu
echo 'To ja, '.$zmienna_poza_funkcja;
}

wykorzystuje_zmienna_spoza_funkcji();
Przykładowe funkcje
Funkcja formatująca przekreślenie
function skresl($text) {
        echo "<s>".$text."</s>";
}
echo "To jest tekst niesformatowany<br />";
skresl("to jest tekst przekreślony.");
Funkcja kantor przeliczająca wartość kupna EUR na PLN wg podanego kursu
function kantor($kurs, $kwota) {
    $wartosc=$kurs*$kwota;
    echo "Kupno ".$wartosc." PLN";
}
kantor($kurs= 4.3051, $kwota=10);
//można zapisać kantor(4.3051, 10);
Funkcja obliczająca silnię
function silnia($n) { 
   if($n==0) echo $silnia=1; 
   if($n==1) echo $silnia=1; 
   if($n>1) 
   { 
      $silnia= 1; 
      for($i=2; $i<=$n; $i++) {$silnia *= $i; } 
      return $silnia; 
   } 
} 
echo silnia(3);
Funkcja, która za pomocą znaków * (gwiazdki) narysuje trójkąt.
function rysuj_trojkat($n) {
   define('X', $n); //liczba musi być nieparzysta
   echo '<pre>';
   for ($w = 1; $w <= X; $w++)
   {
	for ($k = 1; $k <= X + $w; $k++)
	{
		if ($k == X + $w) echo "\n"; else
		if ($k > X - $w && $k < X + $w) echo '*';   
		else echo ' ';
	}
   }
   echo '</pre>';
}
rysuj_trojkat(15);
 
Funkcja, która za pomocą znaków * (gwiazdki) narysuje „koło”.
function rysuj_kolo($n) {
    define('R', $n); //liczba musi być nieparzysta
    echo '<pre>';    
    for($y=-R; $y<=R; $y++)
    {
        for($x=-R; $x<=R; $x++)
	{ 
	    if($x**2+$y**2<=(R+0.3)**2) echo '*'; 
	    else echo ' '; 				
	    echo ' ';			
	}   
	echo "<br>"; 
    }
    echo '</pre>';
}
rysuj_kolo(10);
Funkcja rysująca tabelę w HTML składająca się z podanej ilości wierszy i kolumn.
function rysuj_tabelę($wiersze, $kolumny) {
	echo "<table border=\"1\">";    
    for ($w = 1; $w <= $wiersze; $w++)    
	{
		echo "<tr>";
		for($k=1; $k<=$kolumny; $k++ ) {
			echo "<td>kolumna $k</td>";
		}
		echo "</tr>";
	}
    echo "</table>"; 
}	
rysuj_tabelę(4,5);
Funkcja rysująca tabliczkę mnożenia.
function tabliczka_mnozenia($liczba) {
	echo "<p>Tabliczka mnożenia</p><br />";
	echo "<table style=\"border-collapse: collapse\">";
	for($i=1; $i<=$liczba; $i++) 
	{
		echo "<tr>";
		for($j=1; $j<=$liczba; $j++) 
		{
			if (($i==1) || ($j==1)) 
			{
				echo "<td style=\"border: 1px black solid; background-color: black; color: white; text-align: center\">".$i*$j."</td>";
			} 
			else 
			{
				echo "<td style=\"border: 1px black solid; text-align: center\">".$i*$j."</td>";
			}
		}
		echo "</tr>";
	}
        echo "</table>";
}	
tabliczka_mnozenia(15);
Ciąg Fibonacciego PHP
function fibo($n) { 
  if($n<=2) echo($n.' elementem ciagu Fibonacciego jest 1');
  else
  {
	$f1=0; //wartość pierwszego elementu
	$f2=1; //wartość drugiego elementu
	$temp; //zmienna pomocnicza
	for($i=2;$i<=$n;$i++)
	{
		$fn=$f1+$f2;
		$f1=$f2;
		$f2=$fn;
		echo $fn; if($i<$n) echo ' ';
	}
	echo(';<br>'.$n.' elementem ciagu Fibonacciego jest '.$f2);
  } 
} 
fibo(10);
Funkcje wbudowane
Pełną listę funkcji znajdziecie w dokumentacji PHP,  poniżej najczęściej wykorzystywane.

Funkcje daty i czasu – opracowane w temacie PHP – obsługa daty i czasu

Funkcje operacji na ciągach – opracowane w temacie PHP. Łańcuchy znaków i wyrażenia regularne.

Funkcje operacji na katalogach – opracowane w temacie PHP – operacje na strukturze systemu plików

Funkcje operacji na plikach – opracowane w temacie PHP – Operacje na plikach

Funkcje tablicowe – opracowane w temacie PHP – operacje na tablicach

phpinfo()
Wyświetla informacje o konfiguracji serwera.

<?php phpinfo(); ?>  Funkcje obsługi zmiennych
Pełną listę funkcji znajdziecie w dokumentacji PHP,  poniżej najczęściej wykorzystywane.

 
empty()
ustala czy zmienna jest pusta.

$zmienna=0;
if (empty($zmienna)) { echo '$var jest równe zero, puste lub w ogóle nie zostało ustalone';}
Następujące wartości są uważane za puste:

„” (pusty ciąg)
0 (0 jako integer)
0.0 (0 jako float)
„0” (0 jako string)
NULL
FALSE
array() (pusta tablica)
 
gettype()
pobiera typ zmiennej

echo gettype(1);        //wyświetli integer
echo gettype(1.);       //wyświetli double
echo gettype(NULL);     //wyświetli NULL
echo gettype('tekst');  //wyświetli string
 
is_null()
ustala czy zmienna jest ustawiona na NULL

$zmienna=NULL;
echo is_null($zmienna) ? 'jest NULL' : 'nie jest NULL';
 
is_numeric()
sprawdza czy zmienna jest liczbą, lub liczbowym stringiem

echo is_numeric("42");     //wyświetli is numeric
echo is_numeric(1337);     //wyświetli is numeric
echo is_numeric("1e4");    //wyświetli is numeric
echo is_numeric(array());  //wyświetli is NOT numeric
echo is_numeric(9.1);      //wyświetli is numeric
 
isset()
Sprawdza czy zmienna została przesłana i nie jest NULL

$zmienna='';
echo isset($zmienna) ? 'zmienna została przesłana i nie jest NULL' : 'zmienna nie została przesłana lub jest NULL';
 
settype()
ustawia typ zmiennej

$zmienna1 = "5bar"; // string
$zmienna2 = true;   // boolean

settype($zmienna1, "integer"); // $zmienna1 jest teraz 5   (integer)
settype($zmienna2 , "string");  // $zmienna2 jest teraz "1" (string)
 
unset()
usuwa zmienną

$zmienna=5;
echo is_null($zmienna) ? 'jest NULL' : 'nie jest NULL';
unset($zmienna);
echo isset($zmienna) ? 'istnieje' : 'nie istnieje';Funkcje matematyczne
Pełną listę funkcji znajdziecie w dokumentacji PHP,  poniżej najczęściej wykorzystywane.

 
abs()
Wartość bezwzględna (moduł z liczby)

echo abs(-4.2); // 4.2 (double/float)
echo abs(5);    // 5 (integer)
echo abs(-5);   // 5 (integer)
 
round()
Zaokrągla liczbę zmiennoprzecinkową

echo round(3.4);         // 3
echo round(3.5);         // 4
echo round(3.6);         // 4
echo round(3.6, 0);      // 4
echo round(1.95583, 2);  // 1.96
echo round(1241757, -3); // 1242000
echo round(5.045, 2);    // 5.05
echo round(5.055, 2);    // 5.06
 
ceil()
Zaokrągla ułamki w górę

echo ceil(4.3);       // 5; 
echo ceil(9.999);     // 10; 
echo ceil(-3.14);     // -3
 
floor()
Zaokrągla ułamki w dół

echo floor(4.3);       // 4; 
echo floor(9.999);     // 9; 
echo floor(-3.14);     // -4
 
hypot()
Oblicza długość przeciwprostokątnej trójkąta prostokątnego. hypot() zwraca długość przeciwprostokątnej trójkąta prostokątnego, o długościach przyprostokątnych x i y, lub odległość punktu o współrzędnych (x, y) od początku układu współrzędnych. Jest to równoważne wyrażeniu sqrt(x*x + y*y).

echo hypot(20,21); //29
 
log()
Logarytm naturalny. Jeśli opcjonalny argument podstawa został podany, log() zwraca logpodstawaargument, w przeciwnym przypadku log() zwraca logarytm naturalny z argument.  

echo log(1000000,10); //6
 
pi() lub M_PI
Funkcja pi() wyświetla wartość liczby Pi, tą samą wartość można wywołać używając stałej wbudowanej M_PI.

echo pi(); // 3.1415926535898
echo M_PI; // 3.1415926535898
 
pow()
potęgowanie.

number pow ( number $podstawa , number $wykładnik )
echo 2**3;     //8
echo pow(2,3); //8
 
sqrt()
Pierwiastek kwadratowy.

echo sqrt(9); // 3 
echo sqrt(10); // 3.16227766 ...
 
max() i min()
max() znajduje największą liczbę, a min() najmniejszą.

PHP będzie uznawał nieliczbowe wartości typu string jako 0, jednakże zwracany będzie ciąg znakowy, jeśli zostanie on uznany numerycznie za największą/najmniejszą wartość. Jeśli wiele argumentów zostanie uznanych za wartość 0, to max()/min() zwróci wartość największą/najmniejszą alfanumerycznie, jeśli zostały podane jakiekolwiek ciągi znakowe. W przeciwnym przypadku zwrócona zostanie wartość 0.  

echo max(1, 3, 5, 6, 7);  // 7
echo max(array(2, 4, 5)); // 5
echo max(0, 'hello');     // 0
echo max('hello', 0);     // hello
echo max(-1, 'hello');    // hello

// W przypadku podania wielu tablic, max porównuje je od lewej do prawej, a więc w poniższym przykładzie 2 == 2, ale 4 < 5
print_r($val = max(array(2, 4, 8), array(2, 5, 7))); // wyświetli tablicę array(2, 5, 7)
// Jeśli podane zostaną tablice i nie-tablice, zawsze zwracana jest tablica, jako że zawsze jest uznawana za element największy
print_r($val = max('string', array(2, 5, 7), 42)); // wyświetli tablicę array(2, 5, 7)



echo min(1, 3, 5, 6, 7); // 1 
echo min(array(2, 4, 5)); // 2 
echo min(0, 'hello'); // 0 
echo min('hello', 0); // hello 
echo min(-1, 'hello'); // -1 

// W przypadku podania wielu tablic, max porównuje je od lewej do prawej, a więc w poniższym przykładzie 2 == 2, ale 4 < 5 
print_r($val = min(array(2, 4, 8), array(2, 5, 7))); // wyświetli tablicę array(2, 4, 8) 
// Jeśli podane zostaną tablice i nie-tablice, zawsze zwracana jest tablica, jako że zawsze jest uznawana za element największy 
print_r($val = min('string', array(2, 5, 7), 42)); // wyświetli string
 
deg2rad()
Przelicza stopnie na radiany.

echo deg2rad(45); //0.785398163397
 
rad2deg()
Przelicza radiany na stopnie.

echo rad2deg(0.785398163397); //44.999999999974
 
Funkcje trygonometryczne
sin()
Oblicza sinus kąta. Kąt musi zostać podany w radianach.

echo sin(deg2rad(60)); //  0.866025403 ...
echo sin(60);          // -0.304810621 ...
 
cos()
Oblicza cosinus kąta. Kąt musi zostać podany w radianach.

$stopnie=360;
echo cos(deg2rad($stopnie)); //1
 
tan()
Oblicza tangens kąta. Kąt musi zostać podany w radianach.

$stopnie=60;
echo tan(deg2rad($stopnie)); //1.7320508075689
 
Funkcje związane z losowaniem
rand() i mt_rand()
rand() generuje losową liczbę stałoprzecinkową, mt_rand() generuje lepsza liczbę losową, funkcja ta jest szybsza od rand().

echo rand();      //7771
echo rand();      //22264
echo rand(5, 15); //11

echo mt_rand();      //1604716014
echo mt_rand();      //1478643278
echo mt_rand(5, 15); //6
 
getrandmax() i mt_getrandmax()
Pokazuje największą możliwą do wylosowania przez funkcję rand() lub mt_rand() liczbę. mt_getrandmax() jest szybsza.

echo getrandmax(); //2147483647

echo mt_getrandmax(); //2147483647

!-->
</body>
</html>