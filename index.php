<?php

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

dispatch('/book', 'book');
  function book()
  {
    $event = option('tito')->getEvent('funconf');
    set('event', $event->event);
    set('ticket_types', $event->event->ticket_types);
    return html('book.html.php');
  }

dispatch_post('/book', 'book_post');
  function book_post()
  {
    
  }

dispatch('/ticket', 'ticket');
  function ticket()
  {
    return html('ticket.html.php');
  }

run();

