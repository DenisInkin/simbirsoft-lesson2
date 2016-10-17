<?php
namespace chat\Functions;
define('DATA_FILE', __DIR__ . '/data/messages.txt');
function validateMessage($message) {
    
    $errors = [];
    if (empty($message['name'])) {
        $errors['name'] = 'Введите имя!';
    }
    if (empty($message['text'])) {
        $errors['text'] = 'Введите сообщение!';
    }
    return $errors;
}

 function saveMessageToFile($message) {
    $message['time'] = time();
    $messages = readMessagesFromFile();
    $messages[] = $message;
    return file_put_contents(DATA_FILE, serialize($messages)) !== false;
}

function readMessagesFromFile() {
    $messages = [];
    if (file_exists(DATA_FILE)) {
        $messages = unserialize(file_get_contents(DATA_FILE));
    }
    return $messages;
}

function sendErrors($errors) {
    header('HTTP/1.1 400 Bad Request');
    echo implode("\n", $errors);
}

