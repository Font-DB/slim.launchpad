<?php

    // Because I'm lazy
    define('__DS__', DIRECTORY_SEPARATOR);

    // Change this to reflect your path
    define('ROOT_PATH', dirname(__DIR__) . __DS__  );
    define('APP_PATH', ROOT_PATH . 'app' . __DS__ );

    // Change this to reflect your structure
    define('BOOTSTRAP_PATH', APP_PATH . 'bootstrap' . __DS__ );
    define('RESOURCE_PATH', APP_PATH . 'resources' . __DS__ );
    define('ROUTES_PATH', RESOURCE_PATH . 'routes' . __DS__ );

    define('VIEW_PATH',       RESOURCE_PATH . 'views' . __DS__ );
    define('CACHE_PATH',      VIEW_PATH     . 'cache'. __DS__ );
    define('TWIG_CACHE_PATH', CACHE_PATH    . 'twig'. __DS__ );




    define('SUPPORT_PATH', APP_PATH . 'Support' . __DS__ );

    define('CONFIG_PATH', SUPPORT_PATH . 'Config'. __DS__ );
    define('ERROR_PATH', SUPPORT_PATH  . 'Errors'. __DS__ );
    define('LOG_PATH', SUPPORT_PATH . 'logs'. __DS__ );



    define('TEMPLATE_PATH', VIEW_PATH . 'Templates' . __DS__ );

// -------------------------------------------------------------------

    // Bootstrap the app
    require_once BOOTSTRAP_PATH . 'app.php';

    // Fire away!
    $app->run();
