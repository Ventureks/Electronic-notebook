<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Stylesheet" href="../styl_lekcje.css" >
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Lekcja 8 - Łańcuchy znaków i wyrażenia regularne</h1>
        <hr>
    </header>
    <!--
          Łańcuchy znaków
Łańcuchy znaków (ciągi), to zmienne typu string, które możemy formatować za pomocą wielu funkcji wbudowanych języka PHP.

Pełną listę funkcji znajdziecie w dokumentacji PHP,  poniżej najczęściej wykorzystywane.

echo/print
Drukowanie treści na ekranie. Różnice pomiędzy nimi są znikome, jeżeli chodzi o szczegóły (ilość argumentów, które zachowuje się jak funkcja, a które nie) – odsyłam do dokumentacji. Jedno jest pewne – echo jest szybsze!
<?php 
echo "Hello World!"; // wyświetli napis: Hello World! 
print "Hello World!"; // alternatywne wyświetlanie: Hello World! 
echo "<br>"; //w ten sposób dodajemy wyświetlanie nowej linii

//wyświetlanie wielu linii
echo "Ten zapis obejmuje wiele linii.
Będą one wyświetlane, ale w jednej linii.
Nie zostanie automatycznie dodany znacznik nowego wiersza."; 

echo "<br>Ten zapis również obejmuje wiele linii.<br>
Będą one wyświetlane, w wielu liniach,<br>
przez dodanie znacznika nowego wiersza."; 

echo "<br>"; 

//wyświetlanie znaków specjalnych tj. "" musimy poprzedzić backslash'em
echo "Jeżeli chcemy wyświetlić cudzysłów \"Przykład\"."; 

echo "<br>"; 

// Wyświetlanie zawartości zmiennych 
$zmienna1 = "wartość zmiennej 1"; 
$zmienna2 = "wartość zmiennej 2"; 
echo "zmienna1 = $zmienna1, a zmienna2 = $zmienna2"; // foo is foobar 

echo "<br>"; 

// używając apostrofu wyświetlamy dokładnie to co znajduje się pomiędzy apostrofami (nie pobiera zawartości zmiennej)
echo 'wartość zmiennej 1 znajduje się w $zmienna1'; // wartość zmiennej 1 znajduje się w $zmienna1 

echo "<br>"; 

// jeżeli wyświetlamy samą zmienną nie musimy używać cudzysłowów, ani apostrofów 
echo $zmienna1; // wartość zmiennej 1 

echo "<br>"; 

//łączenie wielu elementów do wyświetlenia
echo $zmienna1.$zmienna2."<br>"; // za pomocą kropki dołączamy kolejne zmienne 
echo $zmienna1,$zmienna2."<br>"; // przecinek działa podobnie, nie jest używany - stosujemy kropkę


// Some people prefer passing multiple parameters to echo over concatenation. 
echo 'Można ', 'łączyć ', 'wiele ', 'elementów ', ' oraz dodawać zmienne ', $zmienna1, '<br>'; 
echo 'Można '. 'łączyć '. 'wiele '. 'elementów '. ' oraz dodawać zmienne '. $zmienna1. '<br>'; 

//alternatywna metoda wyświetlania. Działa pod warunkiem, iż łańcuch rozpocznie się i zakończy tym samym słowem, w tym wypadku END. Nie jest to jednak metoda często spotykana.
echo <<<END
Ten tekst może być wielolinijkowy w wedytorze.
Niestety w przeglądarce zostanie wyświetlony w jednej linii.
END;

echo "<br>";

// wyświetlanie tablicowe
$tablica = array("indeks" => "wartość"); 
echo "wartość dla indeksu = {$tablica['indeks']} !"; // wyświetli: wartość dla indeksu = wartość ! 

echo "<br>";

// wyświetlanie z warunkiem jeżeli (warunek) ? 'wartość gdy prawda' : 'wartość gdy fałsz'
echo ($zmienna1) ? 'true' : 'false';
  
?>
<p>użycie PHP w HTML <?php echo $zmienna1; ?></p>
<p>użycie PHP w HTML w skróconej formie <?=$zmienna1;?></p>

addslashes()/stripslashes()
Funkcje te są stosowane przy operacjach na bazie danych.

Przed zapisem jakiegokolwiek łańcucha znaków do bazy danych należy go sformatować przy użyciu funkcji addslashes().

Funkcja addslashes() dodaje backslash \ do ciągu znaków zawsze wtedy, gdy natrafi na tzw. „znak ucieczki”, czyli taki znak który najczęściej pozawala na dokonanie ataku SQL Injection – pojedynczy cudzysłów ( ’), podwójny cudzysłów ( „), backslash (\) i NULL.

<?php
$text = "Muszę zapisać znak ', czyli apostrof.";
echo addslashes($text); 
//zostanie wyświetlone: Muszę zapisać znak \', czyli apostrof. 
?>
Po odczytaniu łańcucha znaków z bazy danych, należy przywrócić oryginalną składnię znaków specjalnych, czyli usunąć poprzedzające je znaki backslash. Do tego celu służy funkcja stripslashes().

<?php 
$text = "Muszę odczytać z bazy znak \', czyli usunąć backslash."; 
echo stripslashes($text); 
//zostanie wyświetlone: Muszę zapisać znak ', czyli usunąć backslash. 
?>
W pliku php.ini istnieje opcja magic_quotes_gpc, która może przyjmować wartość On lub Off. Gdy jest włączona, będzie wykonywała za nas opcje funkcji addslashes().

explode/implode()
PHP umożliwia zamianę ciągów tekstowych na tablice i odwrotnie. Zamiana ciągu na tablicę jest bardzo przydatna jeśli zachodzi potrzeba „wyciągnięcia” jakiegoś fragmentu danych z ciągu. Załóżmy że w odczytaliśmy z pliku z danymi (o odczycie z plików w jednym z kolejnych rozdziałów) linię z logu zapisanego przez licznik WWW: „12/11/2000;19:23:33;Netscape Navigator;192.168.1.1”. Jak widać dane rozdzielone są średnikami. Do rozdzielania ciągów na tablicę służy funkcja explode(). Jako pierwszy parametr trzeba do niej podać znak lub dłuższy ciąg który oddziela kolejne pola, jako drugi ciąg do rozdzielenia. Opcjonalnie można podać trzeci argument, który oznacza maksymalną liczbę pól – jeśli jest ich więcej niż ta liczba, to ostatnie pole będzie zawierało wszystkie pozostałe pola. Funkcja zwraca tablicę zawierającą kolejne pola.
Przykładowo:

<?php 
$dane="alfa;beta;gamma;delta";
$tablica = explode(";", $dane); 
?>
 
Czasem potrzebne jest działanie pozwalające na złącznie pól tablicy w jeden ciąg, w którym pola oddzielone są jakimś znakiem (lub kilkoma). Do tego służy funkcja implode(). Jako pierwszy parametr podawany jest ciąg za pomocą którego „sklejane” są elementy tablicy, a jako drugi właśnie tablica do posklejania. Zwracany jest ciąg zawierający „posklejane” elementy. Przykład zastosowania:

<?php $dane = implode(";", $tablica); ?>
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
 htmlspecialchars()/strip_tags()
Pozwala zapewnić bezpieczeństwo strony www przed niechcianym kodem. Obie funkcje filtrują znaki specjalne pod kontem znaczników HTML i PHP.

<?php

// niebezpieczny tekst zawierający link do strony konkurencji
$string = '<a href="adres">Niebiezpieczny link</a> do <b>strony konkurencji</b>.';

$string_html = htmlspecialchars($string); // wyświetli: <a href="adres">Niebiezpieczny link</a> do <b>strony konkurencji</b>.

$string_strip = strip_tags($string); // wyświetli: Niebiezpieczny link do strony konkurencji.

echo $string_html .'<br/>'.$string_strip ;

?>
Funkcja htmlspecialchars() zamienia znaki specjalne na ich „bezpieczne” odpowiedniki wg wzoru:

& (ampersand) zmieniany jest na &amp;

” (cudzysłów) zmieniany jest na &quot;

’ (apostrof) zmieniany jest na &#039; (lub &apos;)

< (mniejsze) zmieniany jest na &lt;

> (większe) zmieniany jest na &gt;

Funkcja strip_tags() usuwa znaczniki HTML-a pozostawiając sam tekst.

nl2br()
Funkcja zamienia wszystkie znaki \n na znacznik HTML <br />

<?php
echo nl2br("Zamieniamy znak nowej linii\n na znacznik HTML");
?>
password_hash()
Jest to funkcja hashująca dany ciąg znaków. Używana jest najczęściej do szyfrowania haseł.

<?php
echo password_hash("rasmuslerdorf", PASSWORD_DEFAULT); ?>
 
password_verify()
Jest to funkcja sprawdzająca czy zahashowane hasła zgadzają się z podanymi.

<?php
if (password_verify('rasmuslerdorf', $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
} ?>
strlen()
Wyświetla długość ciągu.

<?php
$str = 'abcdef';
echo strlen($str); // 6

$str = ' ab cd ';
echo strlen($str); // 7
?>
strpos()
Zwraca numeryczną pozycję pierwszego wystąpienia szukanego znaku w ciągu. Jako trzeci parametr, można ustawić numer znaku, od którego funkcja ma zacząć przeszukiwać.

strpos(string,find[,start])

<?php
echo strpos("I love php, I love php too!", "php")."<br>"; //7
echo strpos("I love php, I love php too!", "php", 8); //19
?>
 
strtolower()/strtoupper()/ucfirst()/ucwords()
Funkcje odpowiedzialne za zmianę wielkości liter.

<?php
$str = "Marysia Ma Małego Baranka, Którego Bardzo KOCHA.";

//zmiana na wielkie litery
$str = strtoupper($str); 
echo $str.'<br>'; // Wyświetli: MARYSIA MA MAłEGO BARANKA, KTóREGO BARDZO KOCHA

//zmiana na małe litery
$str = strtolower($str); 
echo $str.'<br>'; // Wyświetli: marysia ma małego baranka, ktorego bardzo kocha

//jak w zdaniu
$str = ucfirst($str); 
echo $str.'<br>'; // Wyświetli: Marysia ma małego baranka, którego bardzo kocha

//wielka każda pierwsza litera wyrazu
$str = ucwords($str); 
echo $str.'<br>'; // Wyświetli: Marysia Ma Małego Baranka, Którego Bardzo Kocha
?>
str_replace()
Funkcja zastępuje podany tekst innym. Budowa:

str_replace(znajdź, zastąp, string[, $jakaś_nazwa]), gdzie do opcjonalnej zmiennej $jakaś_nazwa zostanie wpisana ilość zmian jakich dokona funkcja

<?php

$tekst = "Jeśli jesteś za podnieś rękę";
$wynik = str_replace("za", "przeciw", $tekst, $count); //ostatni 

echo $tekst."<br>";//Jeśli jesteś za podnieś rękę
echo $wynik."<br>";//Jeśli jesteś przeciw podnieś rękę 
echo "Zmieniono: $count<br>";


//przykład z tablicami
$arr = array("blue","red","blue","yellow");
echo '<pre>';
print_r(str_replace("blue","pink",$arr,$count));//ostatni
echo '</pre>';
echo "Zmieniono: $count";

?>
 
substr()
Funkcja substr() wycina fragment ciągu wg podanych parametrów. Budowa:

substr(string, początek[, długość])

jeżeli:

początek>0 – wycinanie zacznie się od znaku o podanym numerze

początek<0 – wycinanie zacznie się od miejsca = długość-początek

długość>0 – wycinanie zacznie się od podanej cyfry określającej początek do początek+długość

długość<0 – wycinanie zakończy się o podaną liczbę znaków przed końcem

<?php
echo substr("abcdef", -1); // zwraca "f" 
echo substr("abcdef", -2); // zwraca "ef" 
echo substr("abcdef", -3, 1); // zwraca "d" 
echo substr("abcdef", 0, -1); // zwraca "abcde" 
echo substr("abcdef", 2, -1); // zwraca "cde" 
echo substr("abcdef", 4, -4); // zwraca false 
echo substr("abcdef", -3, -1); // zwraca "de"
echo substr('abcdef', 1); // bcdef 
echo substr('abcdef', 1, 3); // bcd 
echo substr('abcdef', 0, 4); // abcd 
echo substr('abcdef', 0, 8); // abcdef 
echo substr('abcdef', -1, 1); // f

//metoda zapisu dla tablic
$string = 'abcdef'; 
echo $string[0]; // a 
echo $string[3]; // d 
echo $string[strlen($string)-1]; // f
?>
 
substr_replace()
Funkcja substr_replace() zastępuje fragment łańcucha innym, określonym przez użytkownika. Budowa: substr_replace(string,zamiennik,początek[,długość])

jeżeli:

początek>0 – zastępowanie zacznie się od znaku o podanym numerze

początek<0 – zastępowanie zacznie się od miejsca = długość-początek

długość>0 – tyle znaków ciągu zostanie zmienione od początku

długość<0 – zastępowanie zakończy się o podaną liczbę znaków przed końcem

<?php
$var = 'ABCDEFGH:/MNRPQR/'; 
echo "Orginalny tekst: $var<hr />\n"; 

/* poniższe przykłady zamieniają całe $var na 'bob'. */ 
echo substr_replace($var, 'bob', 0) . "<br />\n"; 
echo substr_replace($var, 'bob', 0, strlen($var)) . "<br />\n"; 

/* Dołącza napis 'bob' przed zmienną $var. */ 
echo substr_replace($var, 'bob', 0, 0) . "<br />\n"; 

/* Zastępuje napis 'MNRPQR' w zmiennej $var napisem 'bob'. */ 
echo substr_replace($var, 'bob', 10, -1) . "<br />\n"; 
echo substr_replace($var, 'bob', -7, -1) . "<br />\n"; 

/* usuwa 'MNRPQR' z $var. */ 
echo substr_replace($var, '', 10, -1) . "<br />\n"; 

//operacje na tablicach
$input = array('A: XXX', 'B: XXX', 'C: XXX'); 
//zamienia XXX w każdym elemencie tablicy na YYY. 
echo implode('; ', substr_replace($input, 'YYY', 3, 3))."\n"; 

// sytuacja kiedy każdy element tablicy jest inny 
$replace = array('AAA', 'BBB', 'CCC'); 
echo implode('; ', substr_replace($input, $replace, 3, 3))."\n"; 

// sytuacja kiedy długości sa pobierane z tablicy. 
$length = array(1, 2, 3); 
echo implode('; ', substr_replace($input, $replace, 3, $length))."\n"; 
?>
 
strstr()
strstr(string,find[,przed_czy_po])

Wyszukuje podane znaki w ciągu, po czym wyświetla to co jest za znakiem (trzeci argument domyślnie ustawiony jest na false). Jeżeli użyjemy trzeciego argumentu z wartością true to wyświetli ciąg znaków poprzedzający szukany element. Funkcja rozróżnia wielkość znaków.

<?php
$email  = 'name@example.com';
$domain = strstr($email, '@');
echo $domain.'<br>';
// wyświetli: '@example.com'

$user = strstr($email, '@', true); // PHP 5.3.0
echo $user;
// wyświetli: 'name'
?>
strtr()
Zamienia podany ciąg znaków na inny. Budowa: strtr(string,from,to) lub strtr(string,array)

<?php
echo strtr("Hilla Warld","ia","eo");//wyświetli: Hello World 

$arr = array("Hello" => "Hi", "world" => "earth");
echo strtr("Hello world",$arr); //wyświetli: Hi earth 
?>
trim()
Funkcja trim() usuwa następujące znaki z początku i końca ciągu: odstępy, tabulacje poziome (\t) i pionowe (\x0b), nowy wiersz (\n), NULL (\0), powrót karetki (\r). Budowa:

trim(string[, lista_znaków])

parametr lista_znaków pozwala na określenie niestandardowych znaków do usunięcia.

<?php

$text   = "\t\tTutaj jest kilka słów :) ...  ";
$binary = "\x09Przykładowy napis\x0A";
$hello  = "Hello World";
var_dump($text, $binary, $hello);

print "\n";

$trimmed = trim($text);
var_dump($trimmed);

$trimmed = trim($text, " \t.");
var_dump($trimmed);

$trimmed = trim($hello, "Hdle");
var_dump($trimmed);

$trimmed = trim($hello, 'HdWr');
var_dump($trimmed);

// trim the ASCII control characters at the beginning and end of $binary
// (from 0 to 31 inclusive)
$clean = trim($binary, "\x00..\x1F");
var_dump($clean);

?>
Przykład:
Funkcja PHP tworząca przyjazne linki

function clearDiacritics($sText)
{
$aReplacePL = array(
'ą' => 'a', 'ę' => 'e', 'ś' => 's', 'ć' => 'c',
'ó' => 'o', 'ń' => 'n', 'ż' => 'z', 'ź' => 'z', 'ł' => 'l',
'Ą' => 'A', 'Ę' => 'E', 'Ś' => 'S', 'Ć' => 'C',
'Ó' => 'O', 'Ń' => 'N', 'Ż' => 'Z', 'Ź' => 'Z', 'Ł' => 'L'
);

return str_replace(array_keys($aReplacePL), array_values($aReplacePL), $sText);
}

function prepareURL($sText)
{
// pozbywamy się polskich znaków diakrytycznych
$sText = clearDiacritics($sText);

// dla przejrzystości wszystko z małych liter
$sText = strtolower($sText);

// wszystkie spacje zamieniamy na myślniki
$sText = str_replace(' ', '-', $sText);

// usuń wszytko co jest niedozwolonym znakiem
$sText = preg_replace('/[^0-9a-z\-]+/', '', $sText);

// zredukuj liczbę myślników do jednego obok siebie
$sText = preg_replace('/[\-]+/', '_', $sText);

// usuwamy możliwe myślniki na początku i końcu
$sText = trim($sText, '-');

return $sText;
}
Przykład:
Kwota, liczba słownie PHP


?>
!-->
<h1>Notatka cała w kodzie!</h1>
</body>
</html>