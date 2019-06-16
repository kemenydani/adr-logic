<?php

namespace app\src\responder;


abstract class PHTMLResponder extends Responder {

    public function getRenderStrategy(): ResponseBodyRenderStrategy {
        return new PHTMLResponseBodyRenderStrategy($this->getTemplatePath());
    }

    abstract public function getTemplatePath() : string;

}