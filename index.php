<?php

$f3 = require('vendor/bcosca/fatfree/lib/base.php');

$f3->set('UI_PATH', 'ui/');

$f3->set('AUTOLOAD','autoload/');

$f3->route('GET /',
    function($f3) {
        $submenuItems = array(
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
        );
        $submenuOffset = 'offset-by-three';
        $content = 'about.html';
        MainTemplate::setup($f3, $submenuItems, $submenuOffset, $content);

        echo Template::instance()->render('ui/template.html');
    }
);

$f3->route('GET /mobile-apps',
    function($f3) {
        $submenuItems = array(
            array(
                'title' => 'Android',
                'name' => 'android'
                ),
            array(
                'title' => 'Windows Phone',
                'name' => 'wp'
                )
        );
        $submenuOffset = 'offset-by-four';
        $content = 'mobile-apps.html';
        MainTemplate::setup($f3, $submenuItems, $submenuOffset, $content);

        echo Template::instance()->render('ui/template.html');
    }
);

$f3->run();
