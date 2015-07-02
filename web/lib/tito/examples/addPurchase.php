<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'Allfiles.php';

use orchestra\services\Tito;

// When instantiating, the first parameter is the token and the
// second parameter is whether or not to use the production endpoint.
// The default for the second parameter is true, pass false to use the
// staging endpoint.
$tito = new Tito('TOKEN', false);

// Create a ticketinfo class
// Then create a "1" object property that is an object.
$ticketInfo = new stdClass();
$ticketInfo->{1} = new stdClass();
$ticketInfo->{1}->ticket_type_id = 1;
$ticketInfo->{1}->release_id = 1;
$ticketInfo->{1}->quantity = 1;

// Here you set your own data.
$name = 'David Test 001';
$email = 'david@orchestra.io';

// The first param is the event to add the ticket to. The second parameter
// is the array of information to pass. See the ticketInfo hack above, this has
// to be done otherwise we will pass an actual array to line_items_attributes (IE [{},{}])
$purchase = $tito->addPurchase('funconf', array(
    'name' => $name,
    'email' => $email,
    'line_items_attributes' => $ticketInfo
));

print_r($purchase);
