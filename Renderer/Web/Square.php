<?php

namespace Renderer\Web;

use Renderer\RendererInterface;
use Widget;

class Square implements RendererInterface
{
    public function render(Widget $widget)
    {
        /** @var \Figure\Square $figure */
        $figure = $widget->getFigure();
        return sprintf('<div class="rectangle" style="width: %d, height: %d">Rectangle</div>', $figure->getSize(), $figure->getSize());
    }
}