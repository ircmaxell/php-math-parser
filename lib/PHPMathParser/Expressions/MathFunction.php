<?php

/*
 * The PHP Math Parser library
 *
 * @author     Mohamed BOUDAOUI (motionSeed) <dev@motionseed.com>
 * @copyright  2017 The Authors
 * @license    http://www.opensource.org/licenses/mit-license.html  MIT License
 * @version    Build @@version@@
 */
namespace PHPMathParser\Expressions;

use PHPMathParser\Stack;

class MathFunction extends Operator
{
    protected $precedence = 10;
    
    protected static $functions = [
        'ABS',
        'COS', 'COSH', 'SIN', 'SINH', 'TAN', 'TANH', 'ACOS', 'ACOSH', 'ASIN', 'ASINH', 'ATAN', 'ATAN2', 'ATANH',
        'DEG2GRAD', 'RAD2DEG', 'PI',
        'CEIL', 'FLOOR', 'ROUND', 'SQRT', 'LOG10'
    ];
    
    public static function isFunction($value)
    {
        return in_array($value, self::$functions);
    }
    
    public function operate(Stack $stack)
    {
        $value = $stack->pop()->operate($stack);
        
        $function = strtolower($this->value);
        
        $result = new Number($function($value));
        
        return $result->operate($stack);
    }
}