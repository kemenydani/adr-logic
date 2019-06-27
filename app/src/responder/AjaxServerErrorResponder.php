<?php


namespace app\src\responder;


use app\src\lib\Payload;
use app\src\ViewModel;

final class AjaxServerErrorResponder extends JsonResponder {

    public function main(Payload $payload): ViewModel {
        return new ViewModel();
    }

}