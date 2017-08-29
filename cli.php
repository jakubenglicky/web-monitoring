<?php

require_once __DIR__ . '/vendor/autoload.php';

$console = new \Symfony\Component\Console\Application('Web monitoring runner');

$console->run();