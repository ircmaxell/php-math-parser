<?php

/*
 * The PHP Math Parser library
 *
 * @author     Anthony Ferrara <ircmaxell@ircmaxell.com>
 * @copyright  2011 The Authors
 * @license    http://www.opensource.org/licenses/mit-license.html  MIT License
 * @version    Build @@version@@
 */
namespace PHPMathParser\Expressions;

use PHPMathParser\Stack;

class Unary extends Operator
{
    protected $precidence = 7;

    public function isUnary()
    {
        return true;
    }

    public function operate(Stack $stack)
    {
        //the operate here should always be returning a value alone
        $next = $stack->pop()->operate($stack);
        //create new number that's negative
        $unaryNumber = new Number(-$next);

        return $unaryNumber->operate($stack);
    }
}
