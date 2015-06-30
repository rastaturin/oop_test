<?php

namespace Renderer\Web;

use Renderer\RendererInterface;
use Widget;

class Rectangle implements RendererInterface
{
    public function render(Widget $widget)
    {
        /** @var \Figure\Rectangle $figure */
        $figure = $widget->getFigure();
        return sprintf('<div class="rectangle" style="width: %d, height: %d">Rectangle</div>', $figure->getHeight(), $figure->getWidth());
    }
}