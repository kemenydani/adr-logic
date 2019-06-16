<?php

namespace app\src\action;


use app\src\lib\Request;

abstract class NonResponsiveAction extends Action {

    public function __invoke(Request $request, array $args = []) : void {
        $this->main($request, $args);
    }

}