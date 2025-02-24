<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Check if the application is in maintenance mode
if (file_exists($maintenance = __DIR__ . '/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader
require __DIR__ . '/../vendor/autoload.php';

// Bootstrap the application
$app = require_once __DIR__ . '/../bootstrap/app.php';

// Retrieve the HTTP kernel
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

// Capture the incoming request
$request = Request::capture();

// Handle the request through the kernel
$response = $kernel->handle($request);

// Send the response back to the client
$response->send();

// Terminate the kernel (runs any termination middleware, like session cleanup)
$kernel->terminate($request, $response);
