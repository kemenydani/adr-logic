<?php

namespace app\src\responder;


use app\src\ViewModel;

final class PHTMLResponseBodyRenderStrategy extends ResponseBodyRenderStrategy {

    private const extension = 'phtml';

    public $templatePath;

    public function __construct(string $templatePath) {
        $this->templatePath = $templatePath;
    }

    public function render(ViewModel $viewModel): void {
        $file = $this->templatePath . '.' . static::extension;
        try {
            ob_start();
            include $file;
            echo ob_get_clean();
        } catch (\Exception $e) {
            var_dump($e);
        }
    }
}