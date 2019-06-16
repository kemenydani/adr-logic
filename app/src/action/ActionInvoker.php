<?php

namespace app\src\action;


use app\src\lib\Request;
use app\src\lib\Response;
use app\src\responder\ResponseRenderException;
use app\src\Route;

final class ActionInvoker {

    public function invokeAction(Action $action, Request $request, array $args = []) : Response {
        return $action->__invoke($request, $args);
    }

    public function getRouteAction(Route $route) : Action {
        return $route->getAction();
    }
}