<?php
$hazApp = true;

try {
    require_once __DIR__ . '/setup.php';
    run();
} catch (Exception $e) {
    echo '*sadface*';
    echo '<!-- ' . (string) $e . ' -->';
}
