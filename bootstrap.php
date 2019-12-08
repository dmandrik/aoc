<?php

spl_autoload_register(function($className) {
    if (preg_match('/^Forge/', $className)) {
        $filePath = __DIR__ . '/' . str_replace('\\', '/', $className) . '.php';
    } else {
        $filePath = __DIR__ . '/App/' . str_replace('\\', '/', $className) . '.php';
    }

    if (file_exists($filePath)) {
        include_once $filePath;
    }
});
