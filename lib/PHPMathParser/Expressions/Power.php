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

class Power extends Operator
{
    protected $precedence = 6;

    public function operate(Stack $stack)
    {
        $left = $stack->pop()->operate($stack);
        $right = $stack->pop()->operate($stack);

        return pow($left, $right);
    }
}
