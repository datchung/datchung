<?php

$f3 = require('vendor/bcosca/fatfree/lib/base.php');

$f3->set('UI_PATH', 'ui/');

$f3->set('AUTOLOAD','autoload/');

$f3->route('GET /',
    function($f3) {
        MainTemplate::render($f3, 'content/about.json');
    }
);

$f3->route('GET /mobile-apps',
    function($f3) {
        MainTemplate::render($f3, 'content/mobile-apps.json');
    }
);

$f3->run();
