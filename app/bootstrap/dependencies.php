<?php


    use Psr\Container\ContainerInterface;
    use Psr\Http\Message\ServerRequestInterface;
    use Psr\Http\Message\ResponseInterface;


    $container = $app->getContainer();

// -----------------------------------------------------------------------------
// Service providers
// -----------------------------------------------------------------------------

    // Twig engine
    $container['view'] = function (ContainerInterface $container) {
        $settings = $container->get('settings')['view'];

        $view = new \Slim\Views\Twig(
            $settings['view_path'],
            ['cache' => false]
        );

        // Instantiate and add Slim specific extension
        $basePath = rtrim(str_ireplace(
            'index.php',
            '',
            $container['request']->getUri()->getBasePath()
        ), '/');

        $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));
        $view->addExtension(new Twig_Extension_Debug());

        return $view;
    };

    // Illuminate DB Library
    $capsule = new \Illuminate\Database\Capsule\Manager;
    $capsule->addConnection($container->get('settings')['db']);
    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    $container['db'] = function (ContainerInterface $container) use ($capsule) {
        return $capsule;
    };

    // monolog
    $container['logger'] = function ($c) {
        $settings = $c['settings']['logger'];

        $logger = new Monolog\Logger($settings['name']);
        $logger->pushProcessor(new Monolog\Processor\UidProcessor());
        $logger->pushHandler(new Monolog\Handler\StreamHandler($c['settings']['logger']['path'], $c['settings']['level']));

        return $logger;
    };

// -----------------------------------------------------------------------------
// Service factories
// -----------------------------------------------------------------------------

    $container['notFoundHandler'] = function (ContainerInterface $container) {
        return new App\Handlers\NotFoundHandler($container['view']);
    };


// -----------------------------------------------------------------------------
// Action Definitions
// -----------------------------------------------------------------------------

    $container['RootController'] = function (ContainerInterface $container) {
        return new \App\Controllers\RootController($container);
    };

    $container['UserController'] = function (ContainerInterface $container) {
        return new \App\Controllers\UserController($container);
    };

