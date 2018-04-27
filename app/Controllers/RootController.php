<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

class RootController extends Controller
{
    public function root(ServerRequestInterface $request, ResponseInterface $response) {
        return $this->view->render($response, 'root.twig');
    }

    public function ping(ServerRequestInterface $request, ResponseInterface $response) {
        return $this->view->render($response, 'ping.twig');
    }
}
