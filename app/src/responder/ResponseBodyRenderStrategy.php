<?php

namespace app\src\responder;


use app\src\ViewModel;

abstract class ResponseBodyRenderStrategy {

    public $viewModel;

    abstract public function render(ViewModel $viewModel) : string;

}