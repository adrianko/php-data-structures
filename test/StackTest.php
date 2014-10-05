<?php

require_once(realpath(dirname(__FILE__))."/../src/Stack.php");

/**
 * Class StackTest
 *
 * Unit tests for Stack class
 */
class StackTest extends PHPUnit_Framework_TestCase {

    /**
     * @covers Stack::peek
     */
    public function testStackPeek() {
        $exp = "b";
        $stack = new Stack("a", "b");
        $act = $stack->peek();
        $this->assertEquals($exp, $act);
    }

    /**
     * @expectedException Exception
     * @covers Stack::peek
     */
    public function testStackPeekException() {
        $stack = new Stack();
        $stack->peek();
        $this->setExpectedException("Exception");
    }

    /**
     * @covers Stack::peek
     */
    public function testStackPeekContents() {
        $exp = array("a", "b", "c");
        $stack = new Stack("c", "b", "a");
        $stack->peek();
        $act = $stack->toArray();
        $this->assertEquals($exp, $act);
    }

    /**
     * @covers Stack::pop
     */
    public function testStackPop() {
        $exp = "a";
        $stack = new Stack("b", "a");
        $act = $stack->pop();
        $this->assertEquals($exp, $act);
    }

    /**
     * @expectedException Exception
     * @covers Stack::pop
     */
    public function testStackPopException() {
        $stack = new Stack();
        $stack->pop();
        $this->setExpectedException("Exception");
    }

    /**
     * @covers Stack::pop
     */
    public function testStackPopContents() {
        $exp = array("b", "c");
        $stack = new Stack("c", "b", "a");
        $stack->pop();
        $act = $stack->toArray();
        $this->assertEquals($exp, $act);
    }

    /**
     * @covers Stack::push
     */
    public function testStackPush() {
        $exp = "a";
        $stack = new Stack();
        $act = $stack->push("a");
        $this->assertEquals($exp, $act);
    }

    /**
     * @covers Stack::search
     */
    public function testStackSearchFound() {
        $exp = 3;
        $stack = new Stack("a", "b", "c", "d", "e");
        $act = $stack->search("c");
        $this->assertEquals($exp, $act);
    }

    /**
     * @covers Stack::search
     */
    public function testStackSearchNotFound() {
        $exp = -1;
        $stack = new Stack("a", "b", "c", "d", "e");
        $act = $stack->search("f");
        $this->assertEquals($exp, $act);
    }

}
 