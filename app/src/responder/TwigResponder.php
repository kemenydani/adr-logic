<?php


namespace app\src\responder;


use app\src\lib\Response;

abstract class TwigResponder extends Responder {

    public function __construct(Response $response) {
        parent::__construct($response);
        $response->setHeaderContentType('text/html');
    }

    public function getRenderStrategy(): ResponseBodyRenderStrategy {
        return new TwigResponseBodyRenderStrategy($this->getTemplatePath());
    }

    abstract public function getTemplatePath() : string;

}