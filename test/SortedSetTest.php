<?php

require_once(realpath(dirname(__FILE__))."/../src/SortedSet.php");

/**
 * Class SortedSetTest
 *
 * Unit tests for SortedSet class
 */
class SortedSetTest extends PHPUnit_Framework_TestCase {

    /**
     * @covers SortedSet::add
     */
    public function testSortedSetAddOrder() {
        $exp = array("a", "b", "c");
        $set = new SortedSet("c", "a", "b");
        $act = $set->toArray();
        $this->assertEquals($exp, $act);
    }

}
 