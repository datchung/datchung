<?php

$f3 = require('vendor/bcosca/fatfree/lib/base.php');

$f3->set('UI_PATH', 'ui/');

// $f3->route('GET /',
//     function($f3) {
//         $f3->set('name','world');
//         //echo View::instance()->render('ui/template.html');
//         echo Template::instance()->render('ui/template.html');
//     }
// );

$f3->route('GET /',
    function($f3) {
        $UI_PATH = $f3->get('UI_PATH');

        $f3->set('submenuItems', array(
            array(
                'title' => 'Skills/Experience',
                'name' => 'skills'
                ),
            array(
                'title' => 'Interests',
                'name' => 'interests'
                ),
            array(
                'title' => 'Extracurricular',
                'name' => 'extra'
                )
            )
        );

        $f3->set('submenuOffset', 'offset-by-three');
        $f3->set('submenu', $UI_PATH . 'sub-menu.html');
        $f3->set('content', $UI_PATH . 'about.html');

        echo Template::instance()->render('ui/template.html');
    }
);

$f3->route('GET /mobile-apps',
    function($f3) {
        // echo Template::instance()->render('ui/index.html');
        $UI_PATH = $f3->get('UI_PATH');
        $f3->set('submenu', $UI_PATH . 'sub-menu.html');
        $f3->set('content', $UI_PATH . 'about.html');
        echo Template::instance()->render('ui/template.html');
    }
);

$f3->run();
