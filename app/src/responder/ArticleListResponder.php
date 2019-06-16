<?php

namespace app\src\responder;


use app\src\lib\Payload;
use app\src\ViewModel;

final class ArticleListResponder extends JsonResponder {

    public $templatePath = 'article.list';

    public function getTemplatePath(): string {
        return $this->templatePath;
    }

    public function main(Payload $payload) : ViewModel {
        return new ViewModel();
    }

}