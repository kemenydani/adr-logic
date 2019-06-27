<?php


namespace app\src\action;


use app\src\lib\Payload;
use app\src\lib\Request;
use app\src\lib\Response;
use app\src\responder\AjaxServerErrorResponder;
use app\src\responder\Responder;
use app\src\responder\ServerErrorResponder;

final class ServerErrorAction extends Action {

    public function getResponder(Request $request, Response $response): Responder {
        if($request->isAjax()) {
            return new AjaxServerErrorResponder($response);
        }
        return new ServerErrorResponder($response);
    }

    public function main(Request $request, Response $response, array $args = []): Payload {
        return new Payload();
    }
}