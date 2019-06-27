<?php

namespace app\src\action;


use app\src\lib\Payload;
use app\src\lib\Request;
use app\src\lib\Response;
use app\src\responder\Responder;

abstract class Action {

    public $responder;

    public function __construct(Responder $responder) {
        $this->responder = $responder;
    }

    abstract public function getResponder(Request $request, Response $response) : Responder;

    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function getResponse(Request $request, Response $response, array $args = []) : Response {
        return $this->getResponder($request, $response)->getResponse(
            $this->main($request, $response, $args)
        );
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Payload
     * Calculates the payload from data (domain, resource)
     */
    abstract public function main(Request $request, Response $response, array $args = []) : Payload;
}