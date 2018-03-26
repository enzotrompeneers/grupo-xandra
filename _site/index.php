<?php

require __DIR__ . '/vendor/autoload.php';

use App\App;

session_start();

// Instantiate the app
$settings = require __DIR__ . '/app/settings.php';

$app = new App($settings);
$container = $app->getContainer();

// Set up dependencies
require __DIR__ . '/app/bootstrap.php';

// Run app
$app->run();
