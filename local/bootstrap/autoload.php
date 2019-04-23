<?php

if (!isset($_SERVER) || empty($_SERVER["DOCUMENT_ROOT"])) {
    $_SERVER["DOCUMENT_ROOT"] = __DIR__ . '/../..';
}

require_once('autoloader.php');
$loader = new Psr4AutoloaderClass();
$loader->register();
$loader->addNamespace('App', $_SERVER["DOCUMENT_ROOT"] . "/local/classes/App/");
$loader->addNamespace('Areal', $_SERVER["DOCUMENT_ROOT"] . "/local/classes/Areal/");

require_once($_SERVER["DOCUMENT_ROOT"] . '/vendor/autoload.php');
