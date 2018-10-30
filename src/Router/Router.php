<?php
/**
 * Created by PhpStorm.
 * User: gesparo
 * Date: 30.10.2018
 * Time: 9:04
 */

namespace App\Router;


class Router
{
    private $routes = [];

    /**
     * Register new path
     *
     * @param string $path
     * @param string $controller
     * @param string $action
     * @param string $type
     * @return bool
     */
    public function register(string $path, string $controller, string $action, string $type = 'GET'): bool
    {
        $this->routes[] = [
            'path' => $path,
            'controller' => $controller,
            'action' => $action,
            'type' => $type,
        ];
        
        return true;
    }

    /**
     * Resolve current path
     *
     * @throws \Exception
     */
    public function resolve()
    {
        $relativePath = $this->getRelativePath();
        $routeIndex = $this->searchRoute($relativePath);

        if(false === $routeIndex) {
            throw new \Exception("Route '$relativePath' not found.");
        }

        $controllerName = $this->getControllerFullName($this->routes[$routeIndex]['controller']);

        $controller = new $controllerName;
        return $controller->{$this->routes[$routeIndex]['action']}();
    }

    private function getRelativePath(): string
    {
        return explode('?', $_SERVER['REQUEST_URI'])[0];
    }

    private function searchRoute($relativePath)
    {
        return array_search($relativePath, array_column($this->routes, 'path'), true);
    }

    private function getControllerFullName($controller): string
    {
        return "\App\Controllers\\$controller";
    }
}