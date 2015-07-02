<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'Allfiles.php';

use orchestra\services\Tito;

$tito = new Tito('TOKEN', false);
$purchase = $tito->getPurchase('smjqenfgig8dzpegucupq');

print_r($purchase);
