<?php

require_once(realpath(dirname(__FILE__))."/../src/Set.php");

/**
 * Class SetTest
 *
 * Unit tests for Set class
 */
class SetTest extends PHPUnit_Framework_TestCase {

    /**
     * @covers Set::__construct
     */
    public function testSetInitialisation() {
        $exp = "Set";
        $act = new Set();
        $this->assertInstanceOf($exp, $act);
    }

    /**
     * @covers Set::toArray
     */
    public function testSetToArray() {
        $exp = array("a", "b","c");
        $act = (new Set("a", "b", "c"))->toArray();
        $this->assertEquals($exp, $act);
    }

    /**
     * @covers Set::size
     */
    public function testSetSize() {
        $exp = 5;
        $act = (new Set(1,2,3,4,5))->size();
        $this->assertEquals($exp, $act);
    }

    /**
     * @covers Set::add
     */
    public function testSetAddTrue() {
        $exp = true;
        $set = new Set();
        $act = $set->add("a");
        $this->assertEquals($exp, $act);
    }

    /**
     * @covers Set::add
     */
    public function testSetAddFalse() {
        $exp = false;
        $set = new Set();
        $set->add("a");
        $act = $set->add("a");
        $this->assertEquals($exp, $act);
    }

    /**
     * @covers Set::remove
     */
    public function testSetRemoveTrue() {
        $exp = true;
        $set = new Set("a", "b");
        $act = $set->remove("b");
        $this->assertEquals($exp, $act);
    }

    /**
     * @covers Set::remove
     */
    public function testSetRemoveFalse() {
        $exp = false;
        $set = new Set("a", "b");
        $act = $set->remove("c");
        $this->assertEquals($exp, $act);
    }

    /**
     * @covers Set::remove
     */
    public function testSetRemoveContents() {
        $exp = array("a");
        $set = new Set("a", "b");
        $set->remove("b");
        $act = $set->toArray();
        $this->assertEquals($exp, $act);
    }

    /**
     * @covers Set::isEmpty
     */
    public function testSetIsEmptyTrue() {
        $exp = true;
        $set = new Set();
        $set->add("a");
        $set->remove("a");
        $act = $set->isEmpty();
        $this->assertEquals($exp, $act);
    }

    /**
     * @covers Set::isEmpty
     */
    public function testSetIsEmptyFalse() {
        $exp = false;
        $set = new Set();
        $set->add("a");
        $set->remove("b");
        $act = $set->isEmpty();
        $this->assertEquals($exp, $act);
    }

}
 