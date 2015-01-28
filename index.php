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
        $f3->set('submitted', $f3->get('QUERY') == 'submitted=true');
        MainTemplate::render($f3, $f3->get('CONTENT_PATH') . 'contact.json');
    }
);

$f3->route('POST /contact-form',
    function($f3) {
        // Example of $_POST
        //array(4) { ["email-input"]=> string(5) "a@a.a" ["recipient-input"]=> string(8) "Option 3" ["message"]=> string(4) "a b" ["send-yourself-copy"]=> string(2) "on" }

        $email = htmlspecialchars($_POST['email-input']);
        $option = $_POST['recipient-input'];
        $message = htmlspecialchars($_POST['message']);

        // In case any of our lines are larger than 70 characters, we should use wordwrap()
        $message = wordwrap($message, 70, "\r\n");

        $subjectMap = array (
            'Option 1'  => 'Questions',
            'Option 2' => 'Admiration',
            'Option 3' => 'Consultation'
        );

        $subject = $subjectMap[$option] . ';' . $email;

        // Send
        mail('innochi.contact@gmail.com', $subject, $message);

        $f3->reroute('/contact?submitted=true');
    }
);

$f3->run();
