<?php

namespace Figure;


class FigureFactory
{
    protected $figures = [
        'rectangle',
        'circle',
        'square',
        'ellipse',
        'textbox',
    ];

    /**
     * Create figure
     * @param $shape
     * @param $params
     * @return FigureInterface
     * @throws \Exception\FigureNotFound
     */
    public function create($shape, $params)
    {
        $shape = strtolower($shape);
        if (in_array($shape, $this->figures)) {
            $className = __NAMESPACE__ . '\\' . ucfirst($shape);
            $reflect = new \ReflectionClass($className);
            return $reflect->newInstanceArgs($params);
        } else {
            throw new \Exception\FigureNotFound("Figure $shape not found.");
        }
    }
}