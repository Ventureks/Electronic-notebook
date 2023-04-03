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
        <h1>Lekcja 11 - Operacje na plikach</h1>
        <hr>
    </header>
<!--

    Pełną listę funkcji znajdziecie w dokumentacji PHP – funkcje systemu plików,  poniżej najczęściej wykorzystywane.

Operacje na plikach w PHP mają podobną formę jak w C.

Zapisywanie danych w pliku następuje w 3 etapach:

Otwieramy plik lub go tworzymy
Zapisujemy dane w pliku
Zamykamy plik
Odczytywanie danych z pliku również przebiega 3-etapowo:

Otwieramy plik, a jeżeli takowy nie może zostać otwarty musi zostać oprogramowane zgłoszenie błędu
Odczytujemy dane
Zamykamy plik
SPRAWDZAMY CZY PLIK ISTNIEJE
file_exists()
Funkcja sprawdza czy plik lub katalog istnieje.

if (file_exists("plik.txt")) echo "plik istnieje";  OTWIERANIE PLIKU
fopen(nazwa_pliku, tryb otwierania);
Przykład:

//instrukcja otwierająca plik, dobrą praktyką jest od razu przypisywanie do zmiennej
$plik=fopen("plik.txt", "w") or die("Nie udało się utworzyć pliku");
nazwa pliku – musimy pamiętać o ścieżce dostępu do naszego pliku, jeżeli tryb otwierania jest ustawiony na ”r” czyli tylko do odczytu, to za nazwę pliku może służyć adres URL do pliku. Należy uważać, by nie stworzyć pliku o nazwie, która już istnieje – istniejący plik zostanie wtedy trwale usunięty w miejsce nowo stworzonego.
tryb otwierania:
”r”	Otwiera tylko do odczytu; umieszcza wskaźnik pliku na jego początku.
”r+”	Otwiera do odczytu i zapisu; umieszcza wskaźnik pliku na jego początku.
”w”	Otwiera tylko do zapisu; umieszcza wskaźnik pliku na jego początku i obcina plik do zerowej długości. Jeśli plik nie istnieje to próbuje go utworzyć.
”w+”	Otwiera do odczytu i zapisu; umieszcza wskaźnik pliku na jego początku i obcina plik do zerowej długości. Jeśli plik nie istnieje to próbuje go utworzyć.
”a”	Otwiera tylko do zapisu; umieszcza wskaźnik pliku na jego końcu. Jeśli plik nie istnieje to próbuje go utworzyć.
”a+”	Otwiera do odczytu i zapisu; umieszcza wskaźnik pliku na jego końcu. Jeśli plik nie istnieje to próbuje go utworzyć.
”x”	Tworzy i otwiera plik tylko do zapisu; umieszcza wskaźnik pliku na jego początku. Jeśli plik juz istnieje, wywołanie fopen() nie powiedzie się, zwróci FALSE i wygeneruje błąd na poziomie E_WARNING. Jeśli plik nie istnieje, spróbuje go utworzyć. To jest równoważne z określeniem flag O_EXCL|O_CREAT stosowanym w wywołaniu systemowym open(2).
”x+”	Tworzy i otwiera plik odczytu i zapisu; umieszcza wskaźnik pliku na jego początku. Jeśli plik juz istnieje, wywołanie fopen() nie powiedzie się, zwróci FALSE i wygeneruje błąd na poziomie E_WARNING. Jeśli plik nie istnieje, spróbuje go utworzyć. To jest równoważne z okresleniem flag O_EXCL|O_CREAT stosowanym w wywołaniu systemowym open(2).
ZAPISYWANIE DO PLIKU
fwrite($uchwyt, $tresc);
Powyższa funkcja zapisuje do pliku tekst, zawarty w zmiennej $tresc. Podczas wywołania funkcji można dodać trzeci, opcjonalny argument, $dlugosc. Jeżeli go zamieścimy, do pliku zostanie zapisanych maksymalnie $dlugosc znaków. Zależnie od trybu otwarcia, zawartość zostanie dopisana na końcu pliku, lub nadpisze istniejącą treść. Jest ona równoważna z instrukcją fputs().

// otwieramy plik w trybie umożliwiającym zapis na końcu pliku
$plik=fopen("plik.txt", "a") or die("Nie udało się utworzyć pliku");

// przypisanie zawartości do zmiennej 
$zawartosc = "Przykładowa treść, którą umieścimy w pliku."; 
fwrite($plik, $zawartosc) or die("Nie udało się zapisać danych w pliku"); 
Poniżej przykład z użyciem limitu znaków:

// otwieramy plik w trybie umożliwiającym zapis na końcu pliku
$plik=fopen("plik.txt", "a") or die("Nie udało się utworzyć pliku");

// przypisanie zawartości do zmiennej 
$zawartosc = "Przykładowa treść, którą umieścimy w pliku. "; 
// zwróć uwagę jak łączymy zmienne z treścią do zapisania w pliku
$zawartosc .= "Utniemy ciąg po 30 znakach."; 
fwrite($plik, $zawartosc, 30) or die("Nie udało się zapisać danych w pliku"); ODCZYTYWANIE PLIKU
Istnieje kilka sposobów na odczytanie zawartości pliku.

fread($uchwyt, $długość)
Funkcja  czyta z pliku określoną długość znaków. Czytanie zakończy się, jeżeli osiągnięta zostanie $dlugość znaków, koniec pliku lub odczytanych zostanie 8192 bajtów.

Przykład:

// otwieramy plik w trybie umożliwiającym zapis na końcu pliku 
$plik=fopen("plik.txt", "r"); 
// przypisanie zawartości do zmiennej
$zawartosc = fread($plik, 8192); 
echo $zawartosc; 
fgets($uchwyt)
Innym sposobem na czytanie zawartości jest funkcja . Czyta ona jedną linię pliku, dopóki nie napotka znacznika przejścia do kolejnej linii. Żeby odczytać cały plik, wystarczy użyć pętli. W przypadku tej metody nie musimy się martwić, czy cały plik zostanie odczytany, czy przypadkiem nie przekroczyliśmy długości znaków. Funkcja feof() zwraca true, jeśli osiągnęliśmy koniec pliku. Przykład czytania pliku z użyciem fgets:

// utworzenie uchwytu do pliku 
$plik = fopen('index.html','r'); 
$zawartosc = ''; 
// przypisanie zawartości do zmiennej 
while(!feof($plik)) 
{ 
    $linia = fgets($plik); 
    $zawartosc .= $linia; 
} 
echo $zawartosc; 
fgetc($plik)
jest bardzo podobna w użyciu do fgets, z tą jednak różnicą, że czytamy po jednym znaku. Przykład niemal identyczny:

// utworzenie uchwytu do pliku 
$plik = fopen('index.html','r'); 
$zawartosc = ''; 
// przypisanie zawartości do zmiennej 
while(!feof($plik)) 
{ 
    $linia = fgetc($plik); 
    $zawartosc .= $linia; 
} 
echo $zawartosc; USUWANIE PLIKU
unlink(nazwa_pliku);
Przykład:

// instrukcja otwierająca plik 
$uchwyt = fopen("plik.txt", "w"); 
// usunięcie pliku 
unlink("plik.txt"); 
Nie każdy plik może zostać usunięty, wszystko zależy od odpowiednich praw dostępu.
    !-->
    <h1>Notatka w kodzie!</h1>
</body>
</html>