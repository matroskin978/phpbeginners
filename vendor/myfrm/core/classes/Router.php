<?php


namespace myfrm;


class Router
{

    protected $routes = [];
    protected $uri;
    protected $method;
    public static array $route_params = [];

    public function __construct()
    {
        $this->uri = trim(parse_url($_SERVER['REQUEST_URI'])['path'], '/');
        $this->method = $this->getMethod();
    }

    protected function getMethod()
    {
        $method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
        return strtoupper($method);
    }

    public function match()
    {
        $matches = false;
        foreach ($this->routes as $route) {
            if ((preg_match("#^{$route['uri']}$#", $this->uri, $matches)) && (in_array($this->method, $route['method']))) {
                if ($route['middleware']) {
                    $middleware = MIDDLEWARE[$route['middleware']] ?? false;
                    if (!$middleware) {
                        throw new \Exception("Incorrect middleware {$route['middleware']}");
                    }
                    (new $middleware)->handle();
                }
                foreach ($matches as $k => $v) {
                    if (is_string($k)) {
                        self::$route_params[$k] = $v;
                    }
                }
                require CONTROLLERS . "/{$route['controller']}";
                $matches = true;
                break;
            }

            /*if (($route['uri'] === $this->uri) && (in_array($this->method, $route['method']))) {

                if ($route['middleware']) {
                    $middleware = MIDDLEWARE[$route['middleware']] ?? false;
                    if (!$middleware) {
                        throw new \Exception("Incorrect middleware {$route['middleware']}");
                    }
                    (new $middleware)->handle();
                }

                require CONTROLLERS . "/{$route['controller']}";
                $matches = true;
                break;
            }*/
        }
        if (!$matches) {
            abort();
        }
    }

    public function only($middleware)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $middleware;
        return $this;
    }

    public function add($uri, $controller, $method)
    {
        if (is_array($method)) {
            $method = array_map('strtoupper', $method);
        } else {
            $method = [$method];
        }
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null,
        ];
        return $this;
    }

    public function get($uri, $controller)
    {
        return $this->add($uri, $controller, 'GET');
    }

    public function post($uri, $controller)
    {
        return $this->add($uri, $controller, 'POST');
    }

    public function delete($uri, $controller)
    {
        return $this->add($uri, $controller, 'DELETE');
    }

    public function getRoutes(): array
    {
        return $this->routes;
    }

}