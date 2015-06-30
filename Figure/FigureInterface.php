<?php

namespace Figure;

interface FigureInterface
{
    /**
     * @return string
     */
    public function getName();

    /**
     * Return associative array of properties
     * @return array
     */
    public function getProperties();

}