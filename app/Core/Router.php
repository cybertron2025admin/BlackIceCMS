<?php
namespace App\Core;

class Router {
    public static function dispatch() {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $routes = require __DIR__ . '/../../config/routes.php';
    
        foreach ($routes as $pattern => $handler) {
            $regex = '#^' . $pattern . '$#';
            if (preg_match($regex, $uri, $matches)) {
                array_shift($matches); // usuń pełne dopasowanie
                [$controller, $method] = $handler;
                call_user_func_array([new $controller, $method], $matches);
                return;
            }
        }
    
        http_response_code(404);
        echo "404 - Not Found";
    }
    
}