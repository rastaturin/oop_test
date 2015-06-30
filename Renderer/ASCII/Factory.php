<?php

namespace Renderer\ASCII;

use Renderer\FactoryRendererInterface;
use Renderer\RendererInterface;
use Widget;

class Factory implements FactoryRendererInterface
{
    protected $rendered;

    public function __construct()
    {
        $this->rendered = new Generic();
    }

    /**
     * Create renderer for given $widget
     * @param Widget $widget
     * @return RendererInterface
     */
    public function getRenderer(Widget $widget)
    {
        return $this->rendered;
    }
}