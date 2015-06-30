<?php

namespace Renderer\ASCII;

use Figure\FigureInterface;
use Renderer\RendererInterface;
use Widget;

class Generic implements RendererInterface
{
    /**
     * Render $widget.
     * @param Widget $widget
     * @return string
     */
    public function render(Widget $widget)
    {
        $figure = $widget->getFigure();

        return sprintf(
            '#%d %s x=%d, y=%d, %s' . PHP_EOL,
            $widget->getID(),
            $figure->getName(),
            $widget->getPoint()->getX(),
            $widget->getPoint()->getY(),
            $this->renderProperties($figure)
        );
    }

    /**
     * Render properties of the figure.
     * @param FigureInterface $figure
     * @return string
     */
    protected function renderProperties(FigureInterface $figure)
    {
        $props = [];
        foreach ($figure->getProperties() as $prop => $value) {
            $props[] = sprintf('%s=%s', $prop, $value);
        }
        return implode(', ', $props);
    }

}