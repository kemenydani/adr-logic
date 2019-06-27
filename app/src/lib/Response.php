<?php

namespace app\src\lib;


class Response {

    public $body = '';
    public $header;

    public function __construct() {
        $this->header = new Header();
        //$this->body = new Body();
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

    public function setHeaderLocation(string $path): void {
        header("Location: {$path}");
    }

    public function __toString() : string {
        return $this->body;
    }

    public function send() : void {
        echo $this;
    }

}