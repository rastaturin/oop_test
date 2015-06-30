<?php

namespace Figure;


abstract class AbstractFigure implements FigureInterface
{
    /**
     * @return string
     */
    public function getName()
    {
        $reflection = new \ReflectionClass($this);
        return $reflection->getShortName();
    }

    /**
     * Return associative array of properties
     * @return array
     */
    public function getProperties()
    {
        $result = [];
        foreach ($this as $prop => $value) {
            $result[$prop] = $value;
        }
        return $result;
    }
}