<?php

namespace Renderer;

use Widget;

interface FactoryRendererInterface
{
    /**
     * Create renderer for $widget
     * @param Widget $widget
     * @return RendererInterface
     */
    public function getRenderer(Widget $widget);
}