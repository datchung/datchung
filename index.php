<?php

$f3 = require('vendor/bcosca/fatfree/lib/base.php');

$f3->set('UI_PATH', 'ui/');
$f3->set('CONTENT_PATH', $f3->get('UI_PATH') . 'content/');

$f3->set('AUTOLOAD','autoload/');

$f3->route('GET /',
    function($f3) {
        MainTemplate::render($f3, $f3->get('CONTENT_PATH') . 'about.json');
    }
);

$f3->route('GET /mobile-apps',
    function($f3) {
        MainTemplate::render($f3, $f3->get('CONTENT_PATH') . 'mobile-apps.json');
    }
);

$f3->route('GET /open-source',
    function($f3) {
        MainTemplate::render($f3, $f3->get('CONTENT_PATH') . 'open-source.json');
    }
);

$f3->route('GET /contact',
    function($f3) {
        MainTemplate::render($f3, $f3->get('CONTENT_PATH') . 'contact.json');
    }
);

$f3->run();
