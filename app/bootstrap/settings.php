<?php

    return [
        'settings' => [
            'displayErrorDetails'               => true,   // set to false in production
            'addContentLengthHeader'            => false,  // Allow the web server to send the content-length header,
            'determineRouteBeforeAppMiddleware' => true,   // required for the middleware to work

            // App settings
            'app'                               => [
                'name' => 'Walters Base Slim Tree w/DB'
            ],

            // Twig settings
            'view'                              => [
                'view_path' => VIEW_PATH,
                'twig_options' => [
                    'cache' => TWIG_CACHE_PATH,
                    'debug' => true,
                    'auto_reload' => true,
                ],
            ],

            // Database
            'db'                                => [
                'driver' => 'mysql',
                'host' => 'localhost',
                'port' => 3306,
                'username' => 'slimapp',
                'password' => 'slimapp',
                'database' => 'slimapp',

                'charset' => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix' => null,
                'socket' => null,

                'options' => [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                    PDO::ATTR_PERSISTENT         => true
                ],

            ],

            // Monolog settings
            'logger' => [
                'name' => 'slim-app',
                'path' => isset($_ENV['docker']) ? 'php://stdout' : LOG_PATH . 'app.log',
                'level' => \Monolog\Logger::DEBUG,
            ],

            //CORS definitions
            'cors' => [
                'origin' => [
                    ' *.example.com'
                    , 'example.com'
                    , '*.slimtree.test'
                    , '192.168.*','10.*'
                ],
                'exposeHeaders'    => null,
                'maxAge'           => 120,
                'allowCredentials' => true,
                'allowHeaders'     => [
                      'Accept'
                    , 'Accept-Language'
                    , 'Authorization'
                    , 'Content-Type'
                    , 'DNT'
                    , 'Keep-Alive'
                    , 'User-Agent'
                    , 'X-Requested-With'
                    , 'If-Modified-Since'
                    , 'Cache-Control'
                    , 'Origin'
                ],
            ]
        ]
    ];
