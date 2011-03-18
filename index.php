<?

require_once('lib/limonade.php');

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

?>