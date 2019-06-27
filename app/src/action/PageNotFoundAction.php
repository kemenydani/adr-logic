<?php


namespace app\src\action;


use app\src\lib\Payload;
use app\src\lib\Request;
use app\src\lib\Response;
use app\src\responder\AjaxPageNotFoundResponder;
use app\src\responder\PageNotFoundResponder;
use app\src\responder\Responder;

final class PageNotFoundAction extends Action {

    public function getResponder(Request $request, Response $response): Responder {
        if ($request->isAjax()) {
            return new AjaxPageNotFoundResponder($response);
        }
        return new PageNotFoundResponder($response);
    }

    public function main(Request $request, Response $response, array $args = []): Payload {
        return new Payload();
    }
}