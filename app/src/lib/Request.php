<?php

namespace app\src\lib;


final class Request {

    private const REQUEST_METHOD_GET = 'GET';
    private const REQUEST_METHOD_POST = 'POST';
    private const REQUEST_METHOD_HEAD = 'HEAD';
    private const REQUEST_METHOD_PUT = 'PUT';
    private const REQUEST_METHOD_OPTIONS = 'OPTIONS';

    public function __construct() {

    }

    public function method(): string {
        return $_SERVER['REQUEST_METHOD'];
    }

    protected function isPost(): bool {
        return $this->method() === static::REQUEST_METHOD_POST;
    }

    protected function isGet(): bool {
        return $this->method() === static::REQUEST_METHOD_GET;
    }

    protected function isHead(): bool {
        return $this->method() === static::REQUEST_METHOD_HEAD;
    }

    protected function isPut(): bool {
        return $this->method() === static::REQUEST_METHOD_PUT;
    }

    protected function isOptions(): bool {
        return $this->method() === static::REQUEST_METHOD_OPTIONS;
    }

    public function isAjax(): bool {
        return (
            isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
            !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
            strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'
        );
    }

    public function getUri() {
        return $_SERVER['REQUEST_URI'];
    }

    public function getTime() {
        return $_SERVER['REQUEST_TIME'];
    }

    public function getQueryString(): string {
        return $_SERVER['QUERY_STRING'];
    }

    public function getQueryParams(): array {
        return $_GET;
    }

    public function getPath(): string {
        return ltrim(strtok($this->getUri(),  '?'), '/');
    }
}