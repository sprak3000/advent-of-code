<?php

date_default_timezone_set('UTC');

/**
 * This makes our life easier when dealing with paths. Everything is relative
 * to the application root now.
 */
chdir(dirname(__DIR__, 2));

$vendorRoot = '';
if (false !== array_key_exists('VENDOR_ROOT', $_SERVER) || !empty($_SERVER['VENDOR_ROOT'])) {
    $vendorRoot = $_SERVER['VENDOR_ROOT'];
}

// Setup autoloading
require $vendorRoot . 'vendor/autoload.php';

$configFile = 'test/phpunit/config.php';

if (file_exists($configFile)) {
    include $configFile;
}

return 0;
