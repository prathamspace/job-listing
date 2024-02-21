<?php

class Router
{
    protected $routes = [];


    /**
     * Register the Router
     *
     * @param string $method
     * @param string $uri
     * @param string $controller
     * @return void
     */
    public function registerRoutes($method, $uri, $controller)
    {
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller
        ];
    }

    /**
     * Add a Get route
     *
     * @param string $uri
     * @param string $controller
     * @return void
     */
    function get($uri, $controller)
    {
        $this->registerRoutes('GET', $uri, $controller);
    }

    /**
     * Add a Post route
     *
     * @param string $uri
     * @param string $controller
     * @return void
     */
    function post($uri, $controller)
    {
        $this->registerRoutes('POST', $uri, $controller);
    }
    /**
     * Add a Put route
     *
     * @param string $uri
     * @param string $controller
     * @return void
     */
    function put($uri, $controller)
    {
        $this->registerRoutes('PUT', $uri, $controller);
    }
    /**
     * Add a Delete route
     *
     * @param string $uri
     * @param string $controller
     * @return void
     */
    function delete($uri, $controller)
    {
        $this->registerRoutes('DELETE', $uri, $controller);
    }


    /**
     * Error Page
     *
     * @param integer $httpcode
     * @return void
     */
    public function error($httpcode = 404)
    {
        http_response_code($httpcode);
        loadView('errors/' . $httpcode);
        exit;
    }

    /**
     * Route the request
     *
     * @param string $uri
     * @param string $method
     * @return void
     */
    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === $method) {
                require basePath($route['controller']);
                return;
            }
        }

        $this->error();

    }
}