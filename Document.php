<?php

use Figure\FigureFactory;

/**
 * Stores list of widgets
 */
class Document
{
    protected $figures = [
        'rectangle',
        'square',
        'ellipse',
        'circle',
        'textbox',
    ];

    /**
     * @var Widget[]
     */
    protected $widgets;

    public function __construct()
    {
        $this->factory = new FigureFactory();
        $this->widgets = [];
    }

    public function hasShape($shape)
    {
        return in_array($shape, $this->figures);
    }

    public function createWidget(\Figure\FigureInterface $figure, $x, $y)
    {
        $this->widgets[] = new Widget($this->getCounter(), $x, $y, $figure);
    }

    /**
     * Render document
     * @param \Renderer\FactoryRendererInterface $renderFactory
     * @return string
     */
    public function render(\Renderer\FactoryRendererInterface $renderFactory)
    {
        $out = "";
        foreach ($this->widgets as $widget) {
            $renderer = $renderFactory->getRenderer($widget);
            $out .= $renderer->render($widget);
        }
        return $out;
    }

    /**
     * @return Widget[]
     */
    public function getList()
    {
        return $this->widgets;
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->widgets);
    }

    /**
     * @param $id
     * @param $newX
     * @param $newY
     */
    public function move($id, $newX, $newY)
    {
        $this->get($id)->move($newX, $newY);
    }

    protected function getCounter()
    {
        return $this->count() + 1;
    }

    /**
     * @param $id
     * @return Widget
     */
    protected function get($id)
    {
        if (array_key_exists($id - 1, $this->widgets)) {
            return $this->widgets[$id - 1];
        } else {
            throw new \InvalidArgumentException("There is no widget with ID $id");
        }
    }

}