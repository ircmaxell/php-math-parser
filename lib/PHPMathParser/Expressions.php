<?php

namespace PHPMathParser;

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

		return $this->value;
    }

}

class Unary extends TerminalExpression {

	//protected $precidence = 7;

	//public function getPrecidence() {
	//	return $this->precidence;
	//}

	public function isUnary() {
		return true;
	}

	public function operate(Stack $stack) {
		//echo "<br />stack:<br />";
		//var_dump($stack);echo "<br />";

		$end = end($stack);

		echo "end: ";
		var_dump($end);echo "<br />";
		echo "unary key: ";
		var_dump(key($end));echo "<br />";
		echo "key: ";
		var_dump(key($end));echo "<br />";
		echo "end of stack: ";
		var_dump($end);echo "<br />";
		echo "end of stack value: ";
		var_dump(end($end)->value);echo "<br />";
		echo "this value: ";
		var_dump($this->value);echo "<br />";

		end($end)->value = -end($end)->value;

		//echo "new end of stack value: ";
		var_dump(end($end)->value);echo "<br />";

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

		$left = $stack->pop();
		$right = $stack->pop();

		echo "<br />left:<pre> ";
		var_dump($left);
		echo "</pre><br />";

		echo "<br />right:<pre> ";
		var_dump($right);
		echo "</pre><br />";

		return $left->operate($stack) + $right->operate($stack);

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
        return $stack->pop()->operate($stack) * $stack->pop()->operate($stack);
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
