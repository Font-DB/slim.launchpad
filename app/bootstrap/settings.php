<?php

    return [
        'settings' => [
            'displayErrorDetails' => true, // set to false in production
            'addContentLengthHeader' => false, // Allow the web server to send the content-length header

            // App settings
            'app' => [
                'name' => 'CodeCourse Base Slim Tree'
            ],

            'view' => [
                'view_path' => VIEW_PATH,
                'twig_options' => [
                    'cache' => TWIG_CACHE_PATH,
                    'debug' => true,
                    'auto_reload' => true,
                ],
            ],
        ]

    ];
