<?php


namespace app\src\responder;


use Throwable;

class ResponseRenderException extends \Exception {

    public const MESSAGE_FAILED = '';

    public function __construct($message = '', $code = 0, Throwable $previous = null) {
        parent::__construct($message, $code, $previous);
    }

}