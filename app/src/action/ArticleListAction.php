<?php

namespace app\src\action;


use app\src\lib\Request;
use app\src\lib\Response;
use app\src\responder\ArticleListResponder;
use app\src\lib\Payload;
use app\src\responder\Responder;

final class ArticleListAction extends Action {

    public function main(Request $request, Response $response, array $args = []): Payload {
        return new Payload();
    }

    public function getResponder(Request $request, Response $response): Responder {
        return new ArticleListResponder($response);
    }
}