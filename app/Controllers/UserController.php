<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

class UserController extends Controller
{
    public function index(ServerRequestInterface $request, ResponseInterface $response) {
        return $this->view->render($response, 'users.twig');
    }
}
