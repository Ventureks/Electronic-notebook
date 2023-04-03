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
        <h1>Lekcja 4 - Instrukcje sterujące - instrukcje warunkowe, wyboru oraz operatory warunkowe.</h1>
    </header>
<hr>
<h1>Instrukcje warunkowe if…, else…, elseif…</h1> <br>
  Najprościej rzecz ujmując instrukcje warunkowe tj. if…, else…, ? oraz switch… pozwalają, w trakcie pisania programu, na rozważanie wielu możliwości odpowiadając na pytania co jeżeli? <br>

<br>
Podam wam teraz prosty przykład: <br>

Jeżeli liczba jest większa od zera, to wypisz że jest dodatnia

zapis tego stwierdzenia za pomocą instrukcji if będzie wyglądał następująco: <br>

<h1>Zapis instrukcji if</h1>
if($liczba>0) echo "jest dodatnia"; <br>
Jeżeli potrzebujemy rozwinąć naszą myśl o zapytanie „a co gdy warunek nie jest spełniony?” – używamy else. <br>

Jeżeli liczba jest większa od zera, to wypisz że jest dodatnia – w przeciwnym wypadku napisz, że nie jest dodatnia <br>
<h1>if większa od 0</h1> <br>
if($liczba>0)  <br>
{ <br>
  echo "jest dodatnia"; <br>
}  <br>
else  <br>
{ <br>
  echo "nie jest dodatnia"; <br>
} <br>
Oczywiście instrukcje możemy zagnieżdżać jedna w drugiej. <br>

Może zajść sytuacja, że przed użyciem else chcemy sprawdzić jeszcze jakieś inne warunki, wtedy przychodzi nam z pomocą instrukcja elseif. <br>

<h1>Instrukcja else if</h1> <br>
if($liczba>0)  <br>
{ <br>
echo "jest dodatnia"; <br>
}  <br> 
elseif($liczba==0) <br>
{ <br> 
echo "liczba jest zerem"; <br>
} <br>
else  <br>
{ <br> 
echo "jest ujemna"; <br>
}switch <br>
Gdy wiemy, że nasza zmienna będzie przyjmowała jakieś konkretne wartości, możemy użyć wtedy instrukcji switch. <br>

<h1>switch</h1> 
($plec) <br>
{ <br>
case "K": <br>
echo "Kobieta"; <br>
break; <br>
case "M": <br>
echo "Mężczyzna"; <br>
break; <br>
default: <br>
echo "Nierozpoznany wybór"; <br>
break; <br>
} <br>
break; <br> używamy by przerwać działanie instrukcji, gdy warunek zostanie spełniony. <br>

default; oznacza akcję domyślą, gdy żaden z warunków nie zostanie spełniony.

<h1>Alternatywna składnia if i switch</h1> <br>
Występuje alternatywa zapisów przedstawionych wyżej – można zastąpić nawias { znakiem : i zamiast zamykającego } użyć odpowiednio endif; lub endswitch; <br>

Przykład dla if: 
if ($a == 5):
    echo "a jest równe 5";
    echo "...";
elseif ($a == 6):
    echo "a jest równe 6";
    echo "!!!";
else:
    echo "a nie jest 5 ani 6";
endif;
Przykład dla switch:
switch ($plec):
case "K":
echo "Kobieta";
break;
case "M":
echo "Mężczyzna";
break;
default:
echo "Nierozpoznany wybór";
break;
endswitch; <br>
ta forma zapisu jest bardzo rzadko spotykana.
<hr>
<h1>ZADANIA</h1>
<h1>Zadanie 1</h1>
<?php
$a = 5;	
if($a==0){echo 'podałeś 0';}
elseif ($a%2==0) 
{
	echo 'parzysta';
}
else
{
	echo 'nieparzysta'; 
}
echo '<br /><br />';
?>
<hr>
<h1>Zadanie 2</h1>
<?php
echo "<u>Zadanie 2: Porównaj ze sobą 2 dowolne liczby i wypisz która jest większa.</u></br></br>";
$a = 10;
$b = 5;
$warunek = $a > $b;
echo "porównujemy liczby $a i $b</br>";
if ($warunek) 
{
	echo 'większa jest liczba $a='.$a;
}
else
{
	echo 'większa jest liczba $b='.$b; 
}
echo '<br /><br />';
?>
<hr>
<h1>Zadanie 3</h1>
<?php
echo "<u>Zadanie 3: Porównaj ze sobą 4 nie równe sobie liczby i wypisz największą.</u></br></br>";
$a = 10;
$b = 5;
$c = 18;
$d = 1;	
$m=$a;
echo "porównujemy liczby: $a, $b, $c, $d</br>";	
if($b > $m) {$m = $b;}
if($c > $m) {$m = $c;}
if($d > $m) {$m = $d;} 	
echo 'większa z liczb to '.$m; 	
echo '<br /><br />';	
?>
<hr>
<h1>Zadanie 4</h1>
<?php
echo "<u>Zadanie 4: Porównaj ze sobą 3 nie równe sobie liczby i wypisz je w kolejności od największej do najmniejszej.</u></br></br>";
$a = 10;
$b = 5;
$c = 18;	
echo "porównujemy liczby: $a, $b, $c</br>";	
$min = $a; //zakladamy ze jest to najmniejsza	
if ($b < $a && $b < $c) {$min = $b;} 			
if ($c < $a && $c < $b) {$min = $c;}	 
$max = $a; //zakladamy ze jest to największa
if ($b > $max) {$max = $b;}  
if ($c > $max) {$max = $c;}  
if($a != $min && $a != $max) {$mid = $a;}
if($b != $min && $b != $max) {$mid = $b;}
if($c != $min && $c != $max) {$mid = $c;}    	
echo 'większa z liczb to '.$max.', '.$mid.', '.$min; 	
echo '<br /><br />';	
?>
<hr>
<h1>Zadanie 5</h1>
<?php
echo "<u>Zadanie 5: Porównaj ze soba 4 nie równe sobie liczby i wypisz je w kolejności od największej do najmniejszej.</u></br></br>";
$a = 10;	
$b = 5;	
$c = 18;	
$d = 1;	
echo "porównujemy liczby: $a, $b, $c, $d</br>";	
//szukamy najmniejszej
if ($a < $b && $a < $c && $a < $d) {$l1 = $a;} 
elseif ($b < $a && $b < $c && $b < $d) {$l1 = $b;}	
elseif ($c < $a && $c < $b && $c < $d) {$l1 = $c;}
else $l1 = $d;  
$l4 = $a; //zakladamy ze jest to ostatnia liczba
if ($b > $l4) {$l4 = $b;}  
if ($c > $l4) {$l4 = $c;}  
if ($d > $l4) {$l4 = $d;}	 
if($a != $l1 && $a != $l4) {$m2 = $a;}
if($b != $l1 && $b != $l4) 	{
	$m1 = $b;	(empty($m2) ? $m2 = $b : $m2 = $m2);
}
if($c != $l1 && $c != $l4) 
{
	$m1 = $c;	(empty($m2) ? $m2 = $c : $m2 = $m2);
}
if($d != $l1 && $d != $l4) {$m1 = $d; $m2 = $m2;}
($m1 > $m2 ? $l2 = $m2 : $l2 = $m1);
($m1 < $m2 ? $l3  = $m2 : $l3  = $m1);    	
echo 'większa z liczb to '.$l4.', '.$l3.', '.$l2.', '.$l1; 	
echo '<br /><br />';	
?>
<hr>
<h1>Zadanie 6</h1>
<?php
echo "<u>Zadanie 6: Napisz skrypt, obliczający pierwiastki trójmianu kwadratowego ax<sup>2</sup> + bx + c = 0.	Za obliczanie pierwiastka kwadratowego odpowiada funkcja sqrt(\$zmienna)</u></br></br>";	
$a = 1; 
$b = 2;
$c = 1;
$delta = $b * $b - 4 * $a * $c; //obliczamy wg wzoru
if ($delta > 0)
{
	$x1 = (-$b - sqrt($delta)) / 2 * $a; //sqrt() pierwiastek kwadratowy
	$x2 = (-$b + sqrt($delta)) / 2 * $a;
	echo ' posiada dwa pierwiastki x1 = '.$x1.', x2 = '.$x2;
}
else if ($delta == 0)
{
	$x = -$b / 2 * $a;
	echo ' posiada jeden pierwiastek x = '.$x;
}
else echo ' nie posiada pierwiastków';
?>
<hr>
<h1>Zadanie 7</h1>
<?php
echo "<u>Zadanie 7: Kalkulator</u></br></br>"; 
$liczba1 = 4;
$liczba2 = 2;
$wybor = '/';
switch ($wybor)
{
 case "+":   echo $liczba1+$liczba2;
   break;
 case "-":   echo $liczba1-$liczba2;
   break;
 case "*":   echo $liczba1*$liczba2;
   break;
 case "/":   echo $liczba1/$liczba2;
   break;
}
?>
</body>
</html>