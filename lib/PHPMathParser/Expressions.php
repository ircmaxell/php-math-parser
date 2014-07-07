<?php

namespace PHPMathParser;

class Parenthesis extends TerminalExpression {

    protected $precedence = 6;

    public function operate(Stack $stack) {
    }

    public function getPrecedence() {
        return $this->precedence;
    }

    public function isNoOp() {
        return true;
    }

    public function isParenthesis() {
        return true;
    }

    public function isOpen() {
        return $this->value == '(';
    }

}

class Number extends TerminalExpression {

    public function operate(Stack $stack) {
        return $this->value;
    }

}

abstract class Operator extends TerminalExpression {

    protected $precedence = 0;
    protected $leftAssoc = true;

    public function getPrecedence() {
        return $this->precedence;
    }

    public function isLeftAssoc() {
        return $this->leftAssoc;
    }

    public function isOperator() {
        return true;
    }

}

class Addition extends Operator {

    protected $precedence = 4;

    public function operate(Stack $stack) {
        return $stack->pop()->operate($stack) + $stack->pop()->operate($stack);
    }

}

class Subtraction extends Operator {

    protected $precedence = 4;

    public function operate(Stack $stack) {
        $left = $stack->pop()->operate($stack);
        $right = $stack->pop()->operate($stack);
        return $right - $left;
    }

}

class Multiplication extends Operator {

    protected $precedence = 5;

    public function operate(Stack $stack) {
        return $stack->pop()->operate($stack) * $stack->pop()->operate($stack);
    }

}

class Division extends Operator {

    protected $precedence = 5;

    public function operate(Stack $stack) {
        $left = $stack->pop()->operate($stack);
        $right = $stack->pop()->operate($stack);
        return $right / $left;
    }

}

class Power extends Operator {

    protected $precedence = 5;

    public function operate(Stack $stack) {
        $left = $stack->pop()->operate($stack);
        $right = $stack->pop()->operate($stack);
        return pow($left,$right);
    }
}
