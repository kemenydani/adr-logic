<?php

namespace app\src\responder;


use app\src\ViewModel;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

final class TwigResponseBodyRenderStrategy extends ResponseBodyRenderStrategy {

    private const extension = 'twig';
    private const folder = __TEMPLATES__ . 'twig/';
    private const caching = false;

    protected $twig;
    protected $templatePath;

    /**
     * TwigRenderStrategy constructor.
     * @param string $templatePath
     * @throws ResponseRenderException
     */
    public function __construct(string $templatePath) {
        $this->templatePath = $templatePath;
        try {
            $this->twig = new Environment(new FilesystemLoader(static::folder), [
                'cache' => static::caching,
            ]);
        } catch (\Exception $e) {
            throw new ResponseRenderException($e->getMessage());
        }
    }

    public function render(ViewModel $viewModel) : string {
        $file = $this->templatePath . '.' . static::extension;

        try {
            return $this->twig->render($file, ['viewModel' => $viewModel]);
        } catch (\Exception $e) {

        }

    }

}