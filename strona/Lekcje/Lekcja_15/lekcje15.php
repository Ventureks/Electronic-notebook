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
    <h1>Lekcja 15 - Obiektówka</h1
    <hr>
    </header>
    <?php

class Czlowiek {

  public $kolorOczu;
  public $kolorWlosow;
  public $wiek=17; //nadajemy wartość domyślną

//teraz tworzymy metodę
  public function pobierzWiek() {
    return $this->wiek;
  }

}

$czlowiek_1 = new Czlowiek();
$czlowiek_1 -> wiek=16;

$czlowiek_2 = new Czlowiek();
$czlowiek_2 -> wiek=18;

$czlowiek_3 = new Czlowiek();


echo '<pre>';
print_r($czlowiek_1);
echo '</pre>';

echo 'Pobrany wiek to: '.$czlowiek_1 -> pobierzWiek().'<br>';

echo '<pre>';
print_r($czlowiek_2);
echo '</pre>';

echo 'Pobrany wiek to: '.$czlowiek_2 -> pobierzWiek().'<br>';

echo '<pre>';
print_r($czlowiek_3);
echo '</pre>';

echo 'Pobrany wiek to: '.$czlowiek_3 -> pobierzWiek().'<br>';
?>
<!--
Zostanie wyświetlone:
Czlowiek Object
(
    [kolorOczu] => 
    [kolorWlosow] => 
    [wiek] => 16
)

Pobrany wiek to: 16

Czlowiek Object
(
    [kolorOczu] => 
    [kolorWlosow] => 
    [wiek] => 18
)

Pobrany wiek to: 18

Czlowiek Object
(
    [kolorOczu] => 
    [kolorWlosow] => 
    [wiek] => 17
)

Pobrany wiek to: 17


    Class Car{
        private $color = 'black';

        public function setColor($color){
            $this->$color = $color;
        }

        public function getColor(){
            return $this->color;
        }
    }

    $car1 = new Car();
    $car1->setColor('blue');
    echo $car1->getColor();
    echo '<pre>';
    print_r($car1);
    echo '</pre>';
*/
/*
Class Car{
    private $color = 'black';

    public function __construct($color){
        $this->$color = $color;
    }

    public function getColor(){
        return $this->color;
    }

    public function __destruct()
    {
        echo 'obiekt został usunięty';
    }

}

$car1 = new Car('white');

unset($car1);
echo $car1->getColor();



echo '<pre>';
print_r($car1);
echo '</pre>';

!-->
</body>
</html>