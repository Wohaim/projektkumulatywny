<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$wlasciciel = "Nieznany";
if(isset($_POST['imie']) && isset($_POST['nazwisko']) && isset($_POST['password'])){
    $imie = htmlspecialchars($_POST['imie']);
    $nazwisko = htmlspecialchars($_POST['nazwisko']);
    $wlasciciel = $imie." ".$nazwisko;
};
$saldo = 1200;

echo "=== Witaj w Banku  ===<br>";
echo "Właściciel konta: $wlasciciel<br>";
echo "Saldo początkowe: $saldo zł<br><br>";

$operacja = "wplata"; 
$kwota = 300;

// Wybór operacji
if ($operacja == "wplata") {
    $saldo += $kwota;
    echo "Wpłacono: $kwota zł<br>";
} elseif ($operacja == "wyplata") {
    if ($kwota <= $saldo) {
        $saldo -= $kwota;
        echo "Wypłacono: $kwota zł<br>";
    } else {
        echo "Błąd: niewystarczające środki<br>";
    }
} elseif ($operacja == "saldo") {
    echo "Sprawdzenie salda...<br>";
} else {
    echo "Nieznana operacja<br>";
}

echo "Saldo końcowe: $saldo zł";
?>
</body>
</html>