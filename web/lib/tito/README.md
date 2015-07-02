Tito API Wrapper
================

So you want to use Tito with PHP? Here's how you do this:

  - Include the file
  - "use" the namespace
  - Instantiate the object with 2 parameters. The first one is your user-token, the second one is optional 
    and is a production flag. By default set to true, if you want to use the staging server pass `false` as
    the second parameter.


Example
-------

<pre><code>&lt;?php

// Step 1: Include
require_once 'path/to/lib/tito/src/Tito.php';

// Step 2: Use namespace
use orchestra\services\Tito;

// Step 3: Instantiate the class
$tito = new Tito('TOKEN');

// Step 4: Get your events
print_r(
    $tito->getEvents()
);

</code></pre>
