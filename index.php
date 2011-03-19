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
    set('event', $event);
    return html('book.html.php');
  }

dispatch('/ticket', 'ticket');
  function ticket()
  {
    return html('ticket.html.php');
  }

run();

