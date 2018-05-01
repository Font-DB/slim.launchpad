<?php

    // This is the middleware

    /**
     * Add the Cross-Origin Resource Sharing (CORS) header to every request
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @param \Psr\Http\Message\ResponseInterface      $response
     *
     * @return \Psr\Http\Message\ResponseInterface      $response
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
     * @link https://www.slimframework.com/docs/v3/cookbook/enable-cors.html
     *
     */
    $app->add(function ($request, $response, $next) use ($container) {
        $settings = $container['settings']['cors'];

        $route = $request->getAttribute('route');

        $methods = [];

        if (!empty($route)) {
            $pattern = $route->getPattern();

            foreach ($this->router->getRoutes() as $route) {
                if ($pattern === $route->getPattern()) {
                    $methods = array_merge_recursive($methods, $route->getMethods());
                }
            }
            //Methods holds all of the HTTP Verbs that a particular route handles.
        } else {
            $methods[] = $request->getMethod();
        }

        $response = $next($request, $response);

        if (isset($settings['origin'])) {
            $response = $response->withHeader(
                'Access-Control-Allow-Origin',
                implode(',', $settings['origin'])
            );
        }

        if (isset($settings['allowHeaders'])) {
            $response = $response->withHeader(
                'Access-Control-Allow-Headers',
                implode(',', $settings['allowHeaders'])
            );
        }

        if (isset($settings['maxAge'])) {
            $response = $response->withHeader(
                'Access-Control-Allow-Max-Age',
                $settings['maxAge']
            );
        }

        if (isset($settings['exposeHeaders'])) {
            $response = $response->withHeader(
                'Access-Control-Expose-Headers',
                $settings['exposeHeaders']
            );
        }

        if ($settings['allowCredentials']) {
            $response = $response->withHeader(
                'Access-Control-Allow-Credentials',
                $settings['allowCredentials']
            );

        }

        $response = $response->withHeader(
            'Access-Control-Allow-Methods',
            implode(',', $methods)
        );

        return $response;
    });
