<?php


namespace app\src\responder;


use app\src\ViewModel;

final class ResponseBodyRenderer {

    public $strategy;

    public function __construct(ResponseBodyRenderStrategy $strategy) {
        $this->strategy = $strategy;
    }


    public function render(ViewModel $viewModel) : string {
        return $this->strategy->render($viewModel);
    }

}