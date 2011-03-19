<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'lib/limonade.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'lib/tito/src/Tito.php';

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
    return html('book.html.php');
  }

dispatch('/ticket', 'ticket');
  function ticket()
  {
    return html('ticket.html.php');
  }

run();

