<?php

namespace app\src;


class RouterException extends \Exception {

    public const MESSAGE_ROUTE_NOT_FOUND = 'Route not found for the request path.';

    public function __construct($message) {
        parent::__construct($message);
    }

}