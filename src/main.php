<?php

require_once __DIR__ . '/VillaPeruana.php';

use App\VillaPeruana;

$villaPeruana = new VillaPeruana();

$villaPeruana->addProduct('Helado', 20, 20);
$villaPeruana->addProduct('Café', 15, 5);
$villaPeruana->addProduct('Pisco Peruano', 14, 5);
$villaPeruana->addProduct('Ticket VIP al concierto de Pink Floyd', 20, 20);
$villaPeruana->addProduct('Tumi', 40, 5);

// Un mes en dias. 
for ($i=0; $i < 31; $i++) { 
    $villaPeruana->update();
}