<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'Allfiles.php';

use orchestra\services\Tito;

$tito = new Tito('TOKEN', false);
$event = $tito->getEvent('funconf');

print_r($event);
