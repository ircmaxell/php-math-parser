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

class Multiplication extends Operator
{
    protected $precedence = 5;

    public function operate(Stack $stack)
    {
        return $stack->pop()->operate($stack) * $stack->pop()->operate($stack);
    }
}
