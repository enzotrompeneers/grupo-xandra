<?php

namespace App\Views\Extensions;

use Brunelencantado\Content\Translator;

class TranslateExtension extends \Twig_Extension
{
    protected $translator;

    public function __construct(Translator $translator)
    {
        $this->translator = $translator;
    }

    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('trans', [$this, 'trans']),
            new \Twig_SimpleFunction('trans_choice', [$this, 'transChoice']),
        ];
    }

    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('trans', [$this, 'trans']),
            new \Twig_SimpleFilter('trans_choice', [$this, 'transChoice']),
        ];
    }

    public function trans($key, $parameters = [])
    {
        return $this->translator->trans($key, $parameters);
    }

    public function transChoice($key, $count = 1, $parameters = [])
    {
        return $this->translator->transChoice($key, $count, $parameters);
    }
}
