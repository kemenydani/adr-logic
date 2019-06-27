<?php

namespace app\src;


use app\src\lib\Request;
use app\src\lib\Response;

final class ActionLoader {

    private $router;
    private $request;
    private $response;

    public function __construct() {
        $this->router = new Router();
        $this->request = new Request();
        $this->response = new Response();
    }

    public function listen() : void {
        try {
            $router = $this->getRouter();

            $route  = $router->findRoute($this->request);
            $args   = $router->getMatchedPathArgs();
            $action = $route->getAction();

            $this->response = $action->getResponse(
                $this->request,
                $this->response,
                $args
            );

        } catch (RouterException $e) {
            $this->response->setStatus(404);
            $this->response->setHeaderLocation('404');
        } catch (\Exception $e) {
            $this->response->setStatus(500);
            $this->response->setHeaderLocation('/500');
        } finally {
            $this->response->send();
        }
    }

    public function setResponse(Response $response): void {
        $this->response = $response;
    }

    public function getResponse(): Response {
        return $this->response;
    }

    public function sendResponse(): void {
        $this->response->send();
    }

    public function getRouter(): Router {
        return $this->router;
    }

    public function setRoutes(array $routes): void {
        $this->getRouter()->setRoutes($routes);
    }

}
