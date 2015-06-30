<?php

namespace Renderer\Web;

use Renderer\FactoryRendererInterface;
use Renderer\RendererInterface;
use Widget;

class Factory implements FactoryRendererInterface
{
    protected $renders = [];

    /**
     * Create renderer for given $widget
     * @param Widget $widget
     * @return RendererInterface
     */
    public function getRenderer(Widget $widget)
    {
        $figureName = $widget->getFigure()->getName();
        if (empty($this->renders[$figureName])) {
            $this->renders[$figureName] = $this->createRenderer($figureName);
        }
        return $this->renders[$figureName];
    }

    /**
     * @param $figureName
     * @return RendererInterface
     */
    protected function createRenderer($figureName)
    {
        $renderName = __NAMESPACE__ . '\\' . $figureName;
        return new $renderName;
    }
}