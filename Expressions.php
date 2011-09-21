<?php
class Parenthesis extends TerminalExpression {

    protected $precidence = 6;

    public function operate(Stack $stack) {
    }

    public function getPrecidence() {
        return $this->precidence;
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

    protected $precidence = 0;
    protected $leftAssoc = true;

    public function getPrecidence() {
        return $this->precidence;
    }

    public function isLeftAssoc() {
        return $this->leftAssoc;
    }

    public function isOperator() {
        return true;
    }

}

class Addition extends Operator {

    protected $precidence = 4;

    public function operate(Stack $stack) {
        return $stack->pop()->operate($stack) + $stack->pop()->operate($stack);
    }

}

class Subtraction extends Operator {

    protected $precidence = 4;

    public function operate(Stack $stack) {
        $left = $stack->pop()->operate($stack);
        $right = $stack->pop()->operate($stack);
        return $right - $left;
    }

}

class Multiplication extends Operator {

    protected $precidence = 5;

    public function operate(Stack $stack) {
        return $stack->pop()->operate($stack) * $stack->pop()->operate($stack);
    }

}

class Division extends Operator {

    protected $precidence = 5;

    public function operate(Stack $stack) {
        $left = $stack->pop()->operate($stack);
        $right = $stack->pop()->operate($stack);
        return $right / $left;
    }

}