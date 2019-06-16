<?php

namespace app\src\responder;


use app\src\lib\Response;

abstract class JsonResponder extends Responder {

    public function __construct(Response $response) {
        parent::__construct($response);
        $response->setHeaderContentType('application/json');
    }

    public function getRenderStrategy(): ResponseBodyRenderStrategy {
        return new JsonResponseBodyRenderStrategy();
    }
}