<?php
if (!isset($hazApp) || $hazApp !== true) {
    throw new LogicException('Problem?');
}

# our little web framework
require_once __DIR__ . DIRECTORY_SEPARATOR . 'lib/limonade.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'lib/tito/src/Tito.php';

use orchestra\services\Tito;

function configure()
{
  $localhost = preg_match('/^localhost(\:\d+)?/', $_SERVER['HTTP_HOST']);
  $env =  $localhost ? ENV_DEVELOPMENT : ENV_PRODUCTION;
  option('env', $env);
  
  $tito = new Tito($env == ENV_PRODUCTION ? 'r8pmQaAEygMWg6fLPsh0' : 'pXGOXwx1JcQXxypcoPhX', $env == ENV_PRODUCTION);
  option('tito', $tito);
  
  date_default_timezone_set('UTC');
}

function before()
{
  layout('layout.html.php');
}

dispatch('/', 'index');
  function index()
  {
    return html('index.html.php');
  }

dispatch('/info', 'info');
  function info()
  {
    return html('info.html.php');
  }

dispatch('/book', 'book');
  function book()
  {
    // $event = option('tito')->getEvent('funconf');
    // set('event', $event->event);
    // set('ticket_types', $event->event->ticket_types);
    return html('book.html.php');
  }

dispatch_post('/book', 'book_post');
  function book_post()
  {
    $event = option('tito')->getEvent('funconf');
    set('event', $event->event);
    set('ticket_types', $event->event->ticket_types);
    
    $ticketInfo = new stdClass();
    $ticketInfo->{1} = new stdClass();
    $ticketInfo->{1}->ticket_type_id = $_POST['ticket_type_id'];
    $ticketInfo->{1}->release_id = $_POST['release_id'];
    $ticketInfo->{1}->quantity = $_POST['quantity'];

    // Here you set your own data.
    $name = $_POST['name'];
    $email = $_POST['email'];

    // The first param is the event to add the ticket to. The second parameter
    // is the array of information to pass. See the ticketInfo hack above, this has
    // to be done otherwise we will pass an actual array to line_items_attributes (IE [{},{}])
    $purchase = option('tito')->addPurchase('funconf', array(
        'name' => $name,
        'email' => $email,
        'payment_type' => 'paypal',
        'line_items_attributes' => $ticketInfo
    ));
    
    set('purchase', $purchase);
    
    if(@$purchase->redirect_to)
    {
      return redirect_to($purchase->redirect_to);
    }
    else
    {
      return html('book.html.php');
    }
  }

dispatch('/ticket/:purchase_id', 'ticket');
  function ticket()
  {
    $purchase = option('tito')->getPurchase(params('purchase_id'))->purchase;
    set('purchase', $purchase);
    return html('ticket.html.php');
  }

