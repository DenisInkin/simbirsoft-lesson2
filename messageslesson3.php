<?php
namespace chat\App;
require 'functions.php';
use PhpChat\Functions as Functions;
if (isset($_POST['Message'])) {
    $errors = Functions\validateMessage($_POST['Message']);
    if ($errors) {
        Functions\sendErrors($errors);
    } else {
        Functions\saveMessageToFile($_POST['Message']);
    }
} else {
    $messages = Functions\readMessagesFromFile();
    Functions\sendMessages($messages);
}