<?php
// Bene, inizio il programma recuperando una data random
// Non userò date() ma rand()
$giorno = rand(1, 30);   // Se capita febbraio mi incazzo
$mese = rand(1, 12);

// Recupero il santo da a-centauri (grazie lego)
$santo = file_get_contents("https://sunfire.a-centauri.com/api/saintsaas/");

// Decodifico il JSON
$santo = json_decode($santo);

// Recupero il nome dall'array
$santo=$santo->saint;

// Rimuovo le cagate in HTML
$santo = str_replace(' <FONT SIZE=', "", $santo);
$santo = str_replace('><b>', "", $santo);
$santo = str_replace('-1', "", $santo);
$santo = str_replace('""', "", $santo);

// E finalmente annuncio il santo!
echo "Porco $santo";

// Aggiungo l'audio
echo '
<bgsound>
<audio autoplay>
  <source src="https://www.ispeech.org/p/generic/getaudio?text=Porco ' .$santo. '&voice=euritalianmale&speed=0&action=convert" type="audio/mp3">
</audio>
</bgsound>
';
