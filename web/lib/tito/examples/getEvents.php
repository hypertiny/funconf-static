<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'Allfiles.php';

use orchestra\services\Tito;

$tito = new Tito('TOKEN', false);
$events = $tito->getEvents();

print_r($events);
