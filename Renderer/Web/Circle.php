<?php

namespace Renderer\Web;

use Renderer\RendererInterface;
use Widget;

class Circle implements RendererInterface
{
    public function render(Widget $widget)
    {
        return '<div class="circle">Circle</div>';
    }
}