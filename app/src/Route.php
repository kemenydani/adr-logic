<?php

namespace app\src;


use app\src\action\Action;
use app\src\lib\Request;

final class Route {

    public const METHOD_GET = 'GET';
    public const METHOD_POST = 'POST';

    protected $method;
    protected $path;
    protected $action;
    protected $name;
    protected $arguments;

    public function __construct(string $method, string $path, $action) {
        $this->method = $method;
        $this->path = $path;
        $this->action = $action;
    }

    public function __invoke(Request $request) {
        call_user_func($this->action, $request);
    }

    private static function create(string $method, string $path, string $action): Route {
        return new Route($method, $path, $action);
    }

    public static function get(string $path, $action): Route {
        return self::create(self::METHOD_GET, $path, $action);
    }

    public static function post(string $path, $action, $responder = null): Route {
        return self::create(self::METHOD_POST, $path, $action);
    }

    public function getPath(): string {
        return $this->path;
    }

    public function getAction() : Action {
        return new $this->action;
    }

}