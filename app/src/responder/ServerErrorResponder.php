<?php


namespace app\src\responder;


use app\src\lib\Payload;
use app\src\ViewModel;

final class ServerErrorResponder extends TwigResponder {

    public $templatePath = '500';

    public function main(Payload $payload): ViewModel {
        return new ViewModel();
    }

    public function getTemplatePath(): string {
        return $this->templatePath;
    }
}