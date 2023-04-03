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
        <h1>Lekcja 5 - Pętle oraz składnia alternatywna</h1>
    </header>    
    <h1>Pętle</h1>
<p>Instrukcje, które pozwalają wielokrotnie powtórzyć fragment programu nazywają się iteracjami lub pętlami. <br>Pętle posiadają alternatywne składnie struktur sterujących – pierwszy nawias klamrowy pętli zamieniamy na : i zamiast ostatniego } piszemy odpowiednio endwhile;, endfor; lub endforeach; </p>

<h1>Pętle for… i foreach…</h1>
<p>Budowa <b>pętli for</b> wygląda następująco</p>


for( inicjalizacja zmiennych; sprawdzenie warunku; modyfikacja zmiennych) <br>
{ <br>
   instrukcja1; <br>
   instrukcja...; <br>
} <br>
<b>Przykład 1:</b> Napisz skrypt, który wyświetli 100 kolejnych liczb całkowitych począwszy od 3. <br>

for ($i = 3; $i <= 100; $i++) <br>
{ <br>
	$text= $i; <br> 
	if ($i < 100) $text.= ', '; //oddzielamy kolejne liczby przecikami, z wyjątkiem ostatniej <br>
	echo $text; <br>
} <br>

<b>Przykład 2:</b> Napisz skrypt, obliczający n! (n silnia). <br>
<br>
$n = 5; <br> 
if($n==0) echo $silnia=1; //$n jest równe zero, więc zwracamy jeden  <br>
if($n==1) echo $silnia=1; //$n jest równe jeden, zwracamy jeden  <br>
if($n>1)  <br>
{ <br>
   $silnia= 1; <br>
   for($i=2; $i<=$n; $i++) <br> 
   { <br>
       $silnia *= $i; <br>
   }  <br>
   echo $silnia; <br> 
} <br>
<b>Przykład 3:</b> Napisz skrypt, który za pomocą znaków * (gwiazdki) narysuje trójkąt.
<br>
define('X', 15); //liczba musi być nieparzysta <br>
echo '<pre>'; <br>
for ($w = 1; $w <= X; $w++) <br>
{ <br>
	for ($k = 1; $k <= X + $w; $k++) <br>
	{ <br>
		if ($k == X + $w) echo "\n"; else <br>
		if ($k > X - $w && $k < X + $w) echo '*'; <br>   
		else echo ' '; <br>
	} <br>
} <br>
echo '</pre>'; <br>
<b>Przykład 4:</b> Napisz skrypt wyświetlający ciąg Fibonacciego i wypisz wartość ostatniego elementu.
<br>
$n = 10; <br>  
if($n<=2) <br>
 echo($n.' elementem ciagu Fibonacciego jest 1'); <br>
else <br>
{ <br>
	$f1=0; //wartość pierwszego elementu <br>
	$f2=1; //wartość drugiego elementu <br>
	$temp; //zmienna pomocnicza <br>
	for($i=2;$i<=$n;$i++) <br>
	{ <br>
		$fn=$f1+$f2; <br>
		$f1=$f2; <br>
		$f2=$fn; <br>
		echo $fn; if($i<$n) echo ' '; <br>
	} <br>
	echo(';<br>'.$n.' elementem ciagu Fibonacciego jest '.$f2); <br>
} <br>
Pętla for może operować na literach, zakres literowy jest podobny jak podział kolumn w Excelu <br>

<h1>Zatrzymywanie pętli i skryptu</h1>
Działanie pętli lub skryptu możemy przerwać w dowolnej chwili lub możemy pominąć część instrukcji do wykonania:

<ul>
<li>instrukcja break; powoduje natychmiastowe wyjście z pętli </li>
<li>instrukcja continue; powoduje przeskoczenie do następnego obiegu pętli </li>
<li>instrukcja exit; powoduje zakończenie wykonywania skryptu </li>
</ul>
</body>
</html>