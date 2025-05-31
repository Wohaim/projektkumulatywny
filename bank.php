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
$saldo = 12000;

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
  
<!--//Funkcjonalności js-->
<h2>System bankowy</h2>
<p>Saldo konta: <span id="saldo"></span></p>

<input type="number" id="kwota" placeholder="Wpisz kwotę" step="0.01" />
<button onclick="wykonajOperacje('wplata')">Wpłać</button>
<button onclick="wykonajOperacje('wyplata')">Wypłać</button>
<script>
    let saldo = <?php echo $saldo; ?>;

    function pokazSaldo() {
      document.getElementById('saldo').textContent = saldo.toFixed(2) + " PLN";
    }

    function wykonajOperacje(typ) {
      const input = document.getElementById('kwota');
      const kwota = parseFloat(input.value);

      if (isNaN(kwota) || kwota <= 0) {
        alert("Podaj poprawną kwotę większą od 0");
        return;
      }

      if (typ === 'wplata') {
        saldo += kwota;
        alert("Wpłacono " + kwota.toFixed(2) + " PLN");
      } else if (typ === 'wyplata') {
        if (kwota > saldo) {
          alert("Brak wystarczających środków na koncie!");
          return;
        }
        saldo -= kwota;
        alert("Wypłacono " + kwota.toFixed(2) + " PLN");
      }

      pokazSaldo();
      input.value = '';
    }

    window.onload = pokazSaldo;
  </script>
</body>
</html>