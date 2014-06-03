<?php

namespace PHPMathParser;

class Parenthesis extends TerminalExpression {

    protected $precidence = 6;

    public function operate(Stack $stack) {
		echo "<br />paren now:<pre>";
		var_dump($this->value);echo "</pre><br />";
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
		echo "<br />number now:<pre>";
		var_dump($this->value);echo "</pre><br />";

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

class Unary extends Operator {

	protected $precidence = 5;

	public function isUnary() {
		return true;
	}

	public function operate(Stack $stack) {
		/*
		$next = $stack->pop();
		$next->value = -$next->value;
		echo "<br />unary now:<pre>";
		var_dump($next->value);echo "</pre><br />";

		//create new number
		$unaryNumber = new Number($next);

		return $unaryNumber->operate($stack);
		*/

		//the operate here should always be returning a value alone
		$next = $stack->pop()->operate($stack);
		//create new number that's negative
		$unaryNumber = new Number(-$next);

		echo "<br />unary now:<pre>";
		var_dump($unaryNumber->operate($stack));echo "</pre><br />";
		return $unaryNumber->operate($stack);
	}
}

class Addition extends Operator {

    protected $precidence = 4;

    public function operate(Stack $stack) {
		$left = $stack->pop()->operate($stack);
		$right = $stack->pop()->operate($stack);

		echo "add left:<pre> ";
		var_dump($left);
		echo "</pre><br />";

		echo "add right:<pre> ";
		var_dump($right);
		echo "</pre><br />";

		echo "add operate:<pre> ";
		echo $left;
		echo $left + $right;
		echo "</pre><br />";

		return $left + $right;

		//return $stack->pop()->operate($stack) + $stack->pop()->operate($stack);
    }

}

class Subtraction extends Operator {

    protected $precidence = 4;

    public function operate(Stack $stack) {
        $left = $stack->pop()->operate($stack);
        $right = $stack->pop()->operate($stack);
        return $right->value - $left->value;
    }

}

class Multiplication extends Operator {

    protected $precidence = 5;

    public function operate(Stack $stack) {
		$left = $stack->pop();
		$right = $stack->pop();

		echo "<br />multi now:<pre>";
		var_dump($this->value);echo "</pre><br />";

		echo "multi left:<pre> ";
		var_dump($left);
		echo "</pre><br />";

		echo "multi right:<pre> ";
		var_dump($right);
		echo "</pre><br />";

		return $left->operate($stack)->value * $right->operate($stack)->value;

        //return $stack->pop()->operate($stack) * $stack->pop()->operate($stack);
    }

}

class Division extends Operator {

    protected $precidence = 5;

    public function operate(Stack $stack) {

		$left = $stack->pop()->operate($stack);
		$right = $stack->pop()->operate($stack);

		echo "div left:<pre> ";
		var_dump($left);
		echo "</pre><br />";

		echo "div right:<pre> ";
		var_dump($right);
		echo "</pre><br />";

        return $right / $left;
    }

}
