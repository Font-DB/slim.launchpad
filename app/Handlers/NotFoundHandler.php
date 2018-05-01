<?php

    namespace App\Handlers;

    use Slim\Handlers\AbstractHandler;
    use Psr\Http\Message\ServerRequestInterface;
    use Psr\Http\Message\ResponseInterface;
    use Slim\Views\Twig;

    class NotFoundHandler extends AbstractHandler
    {

        protected $view;

        public function __construct(Twig $view) {
            $this->view = $view;
        }

        public function __invoke(ServerRequestInterface $request, ResponseInterface $response) {

            switch ($this->determineContentType($request)) {
                case 'application/json':
                    $output = $this->renderNotFoundJson($request, $response);
                    break;

                case 'text/html':
                    $output = $this->renderNotFoundHtml($request, $response);
                    break;
            }

            return $output->withStatus(404);

        }

        protected function renderNotFoundJson (ServerRequestInterface $request, ResponseInterface $response) {

            return $response->withJson([
                'error' => 'Not Found',
                'path' => (string)$request->getUri()
            ]);
        }

        protected function renderNotFoundHtml (ServerRequestInterface $request, ResponseInterface $response) {

            return $this->view
                ->render($response, 'errors/404.twig', [
                    'error' => '404 - Not Found',
                    'path' => (string)$request->getUri()
                ])
                ->withStatus(404);

        }
    }

