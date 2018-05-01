<?php

    namespace App\Controllers;

    use Psr\Http\Message\ServerRequestInterface;
    use Psr\Http\Message\ResponseInterface;

    use App\Models\User;

    class UserController extends Controller
    {
        // DONE!
        /**
         * @param \Psr\Http\Message\ServerRequestInterface $request
         * @param \Psr\Http\Message\ResponseInterface      $response
         *
         * @return mixed
         *
         */
        public function allUsers(ServerRequestInterface $request, ResponseInterface $response)
        {
            $users = User::getAll();

            return $this->view->render($response, 'Users/users.twig', [
                'title' => 'Users',
                'users' => $users]
            );
        }

        // DONE!
        public function newUser(ServerRequestInterface $request, ResponseInterface $response)
        {
            return $this->view->render($response, 'Users/user.twig', [
                    'title' => 'New User',
                    'status' => 'new'
                ]
            );
        }

        // DONE!
        public function addUser(ServerRequestInterface $request, ResponseInterface $response)
        {
            // Stick them in the DB
            User::addUser($request);

            // Jump back to main page
            return $response->withRedirect('/user');
        }

        // DONE!
        public function pullUser(ServerRequestInterface $request, ResponseInterface $response, array $args)
        {
            $user = User::getById ($args['id']);
            $user = $user[$args['id']];

            return $this->view->render($response, 'Users/user.twig', [
                'user' => $user,
                'title' => 'User Data',
                'status' => 'update'
                ]
            );
        }

        // Pulled USER can be updated or removed
        public function updateUser(ServerRequestInterface $request, ResponseInterface $response, array $args)
        {
            User::updateUser($request, $args['id']);

            $pathRootUrl = $request->getUri()
                                   ->getBaseUrl() .
                              $this->router
                                   ->pathFor('user.all');

            return $response->withStatus(307)
                            ->withHeader('Location', $pathRootUrl);
        }

        // Pulled USER can be updated or removed
        public function deleteUserById(ServerRequestInterface $request, ResponseInterface $response, array $args)
        {

            User::deleteUserById($args['id']);

            // Jump back to main page
            return $response->withRedirect('/user');
        }
    }
