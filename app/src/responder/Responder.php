<?php

namespace app\src\responder;


use app\src\lib\Payload;
use app\src\lib\Response;
use app\src\ViewModel;

abstract class Responder {

    public $response;

    public function __construct(Response $response) {
        $this->response = $response;
    }

    /**
     * @param Payload $payload
     * @return Response
     */
    public function getResponse(Payload $payload) : Response {
        $response = new Response();
        try {
            $renderer = new ResponseBodyRenderer($this->getRenderStrategy());
            $response->setBody(
                $renderer->render($this->main($payload))
            );
            $response->setStatus(200);
            //throw new \Exception();
        } catch (\Exception $e) {
            $response->setStatus(500);
            $response->setBody('500');
        }
        return $response;
    }

    abstract public function main(Payload $payload) : ViewModel;
    abstract public function getRenderStrategy() : ResponseBodyRenderStrategy;

}