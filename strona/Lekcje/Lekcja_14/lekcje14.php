<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Stylesheet" href="../styl_lekcje.css">
    <title>Document</title>
</head>
<body>
    <header>
    <h1>Lekcja 14 - obsługa cookies i sesje.</h1>
    <hr>
    </header>
<main>
    <h1><u><b>Podstawowe rodzaje ciasteczek</b></u></h1>
<ul>
    <li>„Cookies” sesyjne – są to tymczasowe informacje przechowywane w pamięci przeglądarki do momentu zakończenia sesji przeglądarki, czyli do momentu jej zamknięcia. </li>
    <li>„Cookies” stałe, nazywane również „śledzące„cookie” (ang. tracking cookies) –pozostają w pamięci przeglądarki przez dłuższy okres. Czas ten zależy od wyboru, którego można dokonać w ustawieniach przeglądarki. Ten rodzaj cookies zezwala na przekazywanie informacji na serwer za każdym razem, gdy odwiedzana jest dana strona. </li>
    <li>„Cookies” podmiotów zewnętrznych – (ang. third parties cookies) – to informacje pochodzące np. z serwerów reklamowych, serwerów firm i dostawców usług (np. wyszukiwania albo map umieszczanych na stronie) współpracujących z właścicielem danej strony internetowej. Ten rodzaj cookie pozwala dostosowywać np. reklamy do preferencji i zwyczajów ich użytkowników. </li>
</ul>
<hr>
</main>
<form metho="post">
    <input type="text" name="pole1" />
    <input type="text" name="pole2" />
    <input type="submit" name="wyślij" value="Wyślij" />
</form>


<?php
session_start();

$zmienna=$_SESSION['zmienna'] = "Ta zmienna działa w sesji";

if(isset($zmienna))
{
    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
}
else
{
    echo "Nie ma takiej zmiennej";
}

?>

<?php
$nazwa_ciasteczka = $_POST['pole1'];
$wartosc_ciasteczka = $_POST['pole2'];
$waznosc_ciasteczka = time() + (60 * 60 * 24 * 30);
setcookie($nazwa_ciasteczka,$wartosc_ciasteczka,$waznosc_ciasteczka);
echo '<pre>';
print_r($_COOKIE);
echo '</pre';
?>
</body>
</html>