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
        <h1>Lekcja 13 - odbieranie danych z przeglądarki – formularze html, metody GET i POST. Wysyłanie danych do przeglądarki.</h1>
        <hr>
</header>
<?php
echo "<pre>";
print_r($_GET);
echo "</pre>";

if(!empty($_GET['przycisk']))
{
    //czy user wypełnił pola imię i nazwisko
    if(!empty($_GET['imie']) && !empty($_GET['nazwisko']))
    {
    //Wyswietlamy powitanie{
        $info="";
    $info.="Witaj {$_GET['imie']} {$_GET['nazwisko']} na mojej stronie.</br>";
        //Wyświetlanie wiadomości
    if(!empty($_GET['text']))
    { 
        $info.="Wiadomość: {$_GET['text']}.</br>"; 
    }
        //Płeć
        if(!empty($_GET['plec']))
    { 
            $info.="Płeć: {$_GET['plec']}.</br>"; 
    }
        //ulubione jedzenie
        if(!empty($_GET['food']))
        {

            $info.="Ulubione jedzenie: ";
            foreach ($_GET['food'] as $f) 
            {
                $info.= $f.";";
           }
            $info.="</br>";
        }
        //Wyswietlanie klasa
        if(!empty($_GET['klasa']))
        {

            $info.="Ulubiona klasa: "; 
            {
                $info.="Klasa: {$_GET['klasa']}.</br>";
           }
            $info.="</br>";
        }
        //Wyswietlanie gier
        if(!empty($_GET['gry']))
        {
            $info.="Ulubiona Gra: "; 
            foreach ($_GET['gry'] as $g) 
            {
                    $info.=$g. ";";
            }
                $info.="</p>";
        }
    echo $info;
    }    
    else
    {
        echo "Uzupełnij imię i nazwisko";
    }
}
else
{
    echo "Nie wysłano";
}


?>
<form action="" method="GET">
    <p>
    Nazwisko <input type="text" name="nazwisko"/>
    Imię <input type="text" name="imie" />
    </p>

    <p>
    Wiadomość: <textarea name="text" cols="30" rows="10"></textarea>
    </p>

    <p>Płeć:
        <input type="radio" name="plec" value="k"> Kobieta
        <input type="radio" name="plec" value="m"> Mężczyzna
        <input type="radio" name="plec" value="i"> Inne
    </p>

    <p> Ulubione jedzenie:
        <input type="checkbox" name="food[]" value="krewetki">Krewetki
        <input type="checkbox" name="food[]" value="cyganska">cygańska z Polo
        <input type="checkbox" name="food[]" value="hot-dog">Hot-dogi z Polo
        <input type="checkbox" name="food[]" value="budki_za_drogie">Budki są za drogie
    </p>

    <p>Klasa:
        <select name="klasa">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
    </p>

    <p>Ulubione gry:
        <select name="gry[]" multiple>
            <option value="CS">COUNTER STRIKE</option>
            <option value="LOL">LOL</option>
            <option value="WOW">WOW</option>
            <option value="planszowe">planszowe</option>
        </select>
    </p>
        <p><input type="submit" name="przycisk" value="Wyślij"></p>
</form>
</body>
</html>