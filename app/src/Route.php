<?php

namespace app\src;


use app\src\action\Action;
use app\src\lib\Request;
use app\src\lib\Response;

final class Route {

    public const METHOD_GET = 'GET';
    public const METHOD_POST = 'POST';

    protected $method;
    protected $path;
    protected $action;
    protected $responder;
    protected $name;
    protected $arguments;

    public function __construct(string $method, string $path, string $action, string $responder) {
        $this->method = $method;
        $this->path = $path;
        $this->action = $action;
        $this->responder = $responder;
    }

    public function __invoke(Request $request) {
        call_user_func($this->action, $request);
    }

    private static function create(string $method, string $path, string $action, string $responder): Route {
        return new Route($method, $path, $action, $responder);
    }

    public static function get(string $path, string $action, string $responder): Route {
        return self::create(self::METHOD_GET, $path, $action, $responder);
    }

    public static function post(string $path, $action, string $responder): Route {
        return self::create(self::METHOD_POST, $path, $action, $responder);
    }

    public function getPath(): string {
        return $this->path;
    }

    public function getAction() : Action {
        return new $this->action(new $this->responder);
    }

}