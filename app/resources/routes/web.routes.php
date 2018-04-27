<?php

    /** @var Slim\App $app */
    $app->group('/', function () {
        $this->get('', 'RootController:root')
             ->setName('root.root');

        $this->get('ping', 'RootController:ping')
             ->setName('root.ping');
    });


    $app->get('/users', 'UserController:index')
        ->setName('users');
