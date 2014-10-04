<?php

require_once(realpath(dirname(__FILE__))."/../src/Set.php");

class SetTest extends PHPUnit_Framework_TestCase {

    public function testSetInitialisation() {
        $exp = "Set";
        $act = new Set();
        $this->assertInstanceOf($exp, $act);
    }

    public function testSetToArray() {
        $exp = array("a", "b","c");
        $act = (new Set("a", "b", "c"))->toArray();
        $this->assertEquals($exp, $act);
    }

    public function testSetSize() {
        $exp = 5;
        $act = (new Set(1,2,3,4,5))->size();
        $this->assertEquals($exp, $act);
    }

    public function testSetAddTrue() {
        $exp = true;
        $set = new Set();
        $act = $set->add("a");
        $this->assertEquals($exp, $act);
    }

    public function testSetAddFalse() {
        $exp = false;
        $set = new Set();
        $set->add("a");
        $act = $set->add("a");
        $this->assertEquals($exp, $act);
    }

    public function testSetRemoveTrue() {
        $exp = true;
        $set = new Set("a", "b");
        $act = $set->remove("b");
        $this->assertEquals($exp, $act);
    }

    public function testSetRemoveFalse() {
        $exp = false;
        $set = new Set("a", "b");
        $act = $set->remove("c");
        $this->assertEquals($exp, $act);
    }

    public function testSetRemoveContents() {
        $exp = array("a");
        $set = new Set("a", "b");
        $set->remove("b");
        $act = $set->toArray();
        $this->assertEquals($exp, $act);
    }

    public function testSetIsEmptyTrue() {
        $exp = true;
        $set = new Set();
        $set->add("a");
        $set->remove("a");
        $act = $set->isEmpty();
        $this->assertEquals($exp, $act);
    }

    public function testSetIsEmptyFalse() {
        $exp = false;
        $set = new Set();
        $set->add("a");
        $set->remove("b");
        $act = $set->isEmpty();
        $this->assertEquals($exp, $act);
    }

}
 