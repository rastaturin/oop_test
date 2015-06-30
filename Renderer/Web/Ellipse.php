<?php

namespace Renderer\Web;

use Renderer\RendererInterface;
use Widget;

class Ellipse implements RendererInterface
{
    public function render(Widget $widget)
    {
        return '<div class="ellipse">Ellipse</div>';
    }
}