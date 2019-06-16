<?php

namespace app\src;


use app\src\lib\Request;

final class Router {

    protected $routes = [];
    protected $matchedPathArgs = [];

    /**
     * @param Request $request
     * @return Route
     * @throws RouterException
     */
    public function findRoute(Request $request) : Route {
        foreach($this->routes as $route) {
            if (preg_match($route->getPath(), $request->getPath(),$matchedPathArgs)) {
                if (count($matchedPathArgs)) {
                    $this->setMatchedPathArgs($matchedPathArgs);
                }
                return $route;
            }
        }
        throw new RouterException(RouterException::MESSAGE_ROUTE_NOT_FOUND);
    }

    public function getRoutes() : array {
        return $this->routes;
    }

    public function getMatchedPathArgs(): array {
        return $this->matchedPathArgs;
    }

    public function setMatchedPathArgs(array $matchedPathArgs): void {
        $this->matchedPathArgs = $matchedPathArgs;
    }

    public function setRoutes(array $routes) : void {
        $this->routes = $routes;
    }

}