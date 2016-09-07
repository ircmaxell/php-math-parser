<?php

/*
 * The PHP Math Parser library
 *
 * @author     Anthony Ferrara <ircmaxell@ircmaxell.com>
 * @copyright  2011 The Authors
 * @license    http://www.opensource.org/licenses/mit-license.html  MIT License
 * @version    Build @@version@@
 */
namespace PHPMathParser;

class Stack
{
    protected $data = array();

    public function push($element)
    {
        $this->data[] = $element;
    }

    public function poke()
    {
        return end($this->data);
    }

    public function pop()
    {
        return array_pop($this->data);
    }

    //check out the end of the array without changing the pointer via http://stackoverflow.com/a/7490837/706578
    public function peek()
    {
        return current(array_slice($this->data, -1));
    }
}
