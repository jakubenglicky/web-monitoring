<?php

require_once __DIR__ . '/vendor/autoload.php';

$console = new \Symfony\Component\Console\Application('Web monitoring runner');
$console->add(new \jakubenglicky\WebMonitoring\Commands\MonitoringCommand());
$console->run();