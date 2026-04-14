<?php

$jamAwal = 8;
$jamDurasi = 10;
$mod = 24;

$jamAkhir = ($jamAwal + $jamDurasi) % $mod;
echo "Jam Awal : " . $jamAwal . "<br>";
echo "Durasi : " . $jamDurasi . "<br>";
echo "Format : " . $mod . "<br>";
echo "Jam Akhir : " . $jamAkhir . "<br>";

?>