<?php

namespace app\src\action;


class ActionLoaderException extends \Exception {

    public const MESSAGE_FAILED_TO_LOAD = 'Failed to load action.';

    public function __construct($message) {
        parent::__construct($message);
    }

}