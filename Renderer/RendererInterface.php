<?php

namespace Renderer;

use Widget;

interface RendererInterface
{
    public function render(Widget $widget);
}