<?php

namespace Renderer\Web;

use Renderer\RendererInterface;
use Widget;

class Textbox implements RendererInterface
{
    public function render(Widget $widget)
    {
        /** @var \Figure\Textbox $figure */
        $figure = $widget->getFigure();
        return sprintf('<div class="rectangle" style="width: %d, height: %d">%s</div>', $figure->getHeight(), $figure->getWidth(), $figure->getText());
    }
}