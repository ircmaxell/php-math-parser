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
use PHPMathParser\TerminalExpression;

class Parenthesis extends TerminalExpression
{
    protected $precedence = 6;

    public function operate(Stack $stack)
    {
    }

    public function getPrecedence()
    {
        return $this->precedence;
    }

    public function isNoOp()
    {
        return true;
    }

    public function isParenthesis()
    {
        return true;
    }

    public function isOpen()
    {
        return $this->value == '(';
    }
}
