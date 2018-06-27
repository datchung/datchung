<?php

class ContactForm {
    public static function submit() {
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
    }
}