<?php

    /** @var Slim\App $app */
    $app->group('/', function () {
        $this->get('', 'RootController:root')
             ->setName('root.root');

        $this->get('ping', 'RootController:ping')
             ->setName('root.ping');
    });


    /** @var Slim\App $app */
    $app->group('/user', function () {

        // Load all users     ***
        /** @var Slim\Router $this */
        $this->get('', 'App\Controllers\UserController:allUsers')
             ->setName('user.all');

        // Add user from above call     ***
        $this->post('', 'App\Controllers\UserController:addUser')
             ->setName('user.post');




        $this->get('/new', 'App\Controllers\UserController:newUser')
             ->setName('user.new');


        $this->get('/{id:[0-9]+}', 'App\Controllers\UserController:pullUser')
             ->setName('user.single');

        $this->put('/{id:[0-9]+}', 'App\Controllers\UserController:updateUser')
             ->setName('user.put');

        $this->delete('/{id:[0-9]+}', 'App\Controllers\UserController:deleteUserById')
             ->setName('user.delete');

        // remove user
//        $this->delete('/{id:[0-9]+}',  'App\Controllers\UserController:deleteUserById')
//             ->setName('user.delete');
//
    });


    // Catch-all route to serve a 404 Not Found page if none of the routes match
    // NOTE: make sure this route is defined last
//    $app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function($req, $res) {
//        $handler = $this->notFoundHandler; // handle using the default Slim page not found handler
//        return $handler($req, $res);
//    });
