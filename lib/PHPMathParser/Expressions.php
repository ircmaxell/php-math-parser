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
		//check for unary on the left
		//echo "key: ";
		//var_dump(key(end($stack)));echo "<br />";
		//echo "end of stack: ";
		//var_dump(end($stack));echo "<br />";
		//echo "this value: ";
		//var_dump($this->value);echo "<br />";
		//if(end($stack)->isUnary()){
		//	echo "<br />unary on left<br />";
			//return -1 * $this->value;
		//}
		//else{
        	//return $this->value;
		//}

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
		$next = $stack->pop();
		$next->value = -$next->value;
		echo "<br />unary now:<pre>";
		var_dump($next->value);echo "</pre><br />";
		return $next;
	}
}

class Addition extends Operator {

    protected $precidence = 4;

    public function operate(Stack $stack) {
		$left = $stack->pop()->operate($stack);
		$right = $stack->pop()->operate($stack);

		echo "add left:<pre> ";
		var_dump($left->value);
		echo "</pre><br />";

		echo "add right:<pre> ";
		var_dump($right->value);
		echo "</pre><br />";

		return $left->value + $right->value;


		//return $stack->pop()->operate($stack) + $stack->pop()->operate($stack);
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

		return $left->operate($stack) * $right->operate($stack);

        //return $stack->pop()->operate($stack) * $stack->pop()->operate($stack);
    }

}

class Division extends Operator {

    protected $precidence = 5;

    public function operate(Stack $stack) {
        $left = $stack->pop()->operate($stack);
        $right = $stack->pop()->operate($stack);
		//echo "<br />Left: ". $left . "<br />";
		//echo "<br />Right: ". $right . "<br />";

        return $right / $left;
    }

}
