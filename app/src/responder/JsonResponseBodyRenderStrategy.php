<?php

namespace app\src\responder;


use app\src\ViewModel;

final class JsonResponseBodyRenderStrategy extends ResponseBodyRenderStrategy {

    public function render(ViewModel $viewModel): string {
        return json_encode($viewModel);
    }
}