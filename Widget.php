<?php

use Figure\FigureInterface;

class Widget
{
    protected $id;

    /**
     * @var Point
     */

    protected $point;
    /**
     * @var FigureInterface
     */
    protected $figure;

    /**
     * @param int $id
     * @param Point $where
     * @param FigureInterface $shape
     */
    public function __construct($id, $where, $shape)
    {
        $this->id = $id;
        $this->move($where);
        $this->figure = $shape;
    }

    /**
     * Move to new point
     * @param Point $to
     */
    public function move(Point $to)
    {
        $this->point = $to;
    }

    /**
     * @return Point
     */
    public function getPoint()
    {
        return $this->point;
    }

    /**
     * @return int
     */
    public function getID()
    {
        return $this->id;
    }

    /**
     * @return FigureInterface
     */
    public function getFigure()
    {
        return $this->figure;
    }

}