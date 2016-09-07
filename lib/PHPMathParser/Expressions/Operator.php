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

use PHPMathParser\TerminalExpression;

abstract class Operator extends TerminalExpression
{
    protected $precedence = 0;
    protected $leftAssoc = true;

    public function getPrecedence()
    {
        return $this->precedence;
    }

    public function isLeftAssoc()
    {
        return $this->leftAssoc;
    }

    public function isOperator()
    {
        return true;
    }
}
