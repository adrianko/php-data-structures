<?php

require_once(realpath(dirname(__FILE__))."/../src/Set.php");

class SetTest extends PHPUnit_Framework_TestCase {

    public function testSetInitialisation() {
        $exp = "Set";
        $act = new Set();
        $this->assertInstanceOf($exp, $act);
    }

    public function testSetSize() {
        $exp = 5;
        $act = (new Set(1,2,3,4,5))->size();
        $this->assertEquals($exp, $act);
    }

    public function testSetAdd() {
        $exp = true;
        $act = (new Set())->add("a");
        $this->assertEquals($exp, $act);
    }

}
 