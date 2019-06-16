<?php

namespace app\src\lib;


class Response {

    public $body = '';

    public function __construct() {

    }

    public function setBody(string $body) : void {
        $this->body = $body;
    }

    public function getBody() : string {
        return $this->body;
    }

    public function setStatus(int $code) : void {
        http_response_code($code);
    }

    public function getStatus() : int {
        return http_response_code();
    }

    public function setHeader(string $value) : void {
        header($value);
    }

    public function setHeaderContentType(string $type) : void {
        header("Content-Type: {$type}");
    }

    public function __toString() : string {
        return $this->body;
    }

    public function send() : void {
        echo $this;
    }

}