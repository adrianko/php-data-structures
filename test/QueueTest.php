<?php

require_once(realpath(dirname(__FILE__))."/../src/Queue.php");

/**
 * Class QueueTest
 *
 * Unit tests for Queue class
 */
class QueueTest extends PHPUnit_Framework_TestCase {

    /**
     * @covers Queue::__construct
     */
    public function testQueueInitialisationType() {
        $exp = "Queue";
        $act = new Queue();
        $this->assertInstanceOf($exp, $act);
    }

    /**
     * @covers Queue::__construct
     */
    public function testQueueInitialisationContents() {
        $exp = array("b", "a", "c");
        $act = (new Queue("b", "a", "c"))->toArray();
        $this->assertEquals($exp, $act);
    }

    /**
     * @covers Queue::add
     */
    public function testQueueAddTrue() {
        $exp = true;
        $act = (new Queue())->add("a");
        $this->assertEquals($exp, $act);
    }

    /**
     * @covers Queue::add
     */
    public function testQueueAddContents() {
        $exp = array("a");
        $queue = new Queue();
        $queue->add("a");
        $act = $queue->toArray();
        $this->assertEquals($exp, $act);
    }

    /**
     * @covers Queue::offer
     */
    public function testQueueOfferTrue() {
        $exp = true;
        $act = (new Queue())->offer("a");
        $this->assertEquals($exp, $act);
    }

    /**
     * @covers Queue::offer
     */
    public function testQueueOfferContents() {
        $exp = array("a");
        $queue = new Queue();
        $queue->offer("a");
        $act = $queue->toArray();
        $this->assertEquals($exp, $act);
    }

    /**
     * @covers Queue::remove
     */
    public function testQueueRemove() {
        $exp = "a";
        $queue = new Queue("a");
        $act = $queue->remove();
        $this->assertEquals($exp, $act);
    }

    /**
     * @expectedException Exception
     * @covers Queue::remove
     */
    public function testQueueRemoveException() {
        $queue = new Queue();
        $queue->remove();
        $this->setExpectedException("Exception");
    }

    /**
     * @covers Queue::remove
     */
    public function testQueueRemoveContents() {
        $exp = array("a", "c");
        $queue = new Queue("b", "a", "c");
        $queue->remove();
        $act = $queue->toArray();
        $this->assertEquals($exp, $act);
    }

    /**
     * @covers Queue::poll
     */
    public function testQueuePoll() {
        $exp = "a";
        $queue = new Queue("a");
        $act = $queue->poll();
        $this->assertEquals($exp, $act);
    }

    /**
     * @covers Queue::poll
     */
    public function testQueuePollNull() {
        $exp = null;
        $queue = new Queue();
        $act = $queue->poll();
        $this->assertEquals($exp, $act);
    }

    /**
     * @covers Queue::poll
     */
    public function testQueuePollContents() {
        $exp = array("a", "b");
        $queue = new Queue("c", "a", "b");
        $queue->poll();
        $act = $queue->toArray();
        $this->assertEquals($exp, $act);
    }

    /**
     * @covers Queue::element
     */
    public function testQueueElement() {
        $exp = "a";
        $queue = new Queue("a", "b", "c");
        $act = $queue->element();
        $this->assertEquals($exp, $act);
    }

    /**
     * @expectedException Exception
     * @covers Queue::element
     */
    public function testQueueElementException() {
        $queue = new Queue();
        $queue->element();
        $this->setExpectedException("Exception");
    }

    /**
     * @covers Queue::element
     */
    public function testQueueElementContents() {
        $exp = array("a", "b", "c");
        $queue = new Queue("a", "b", "c");
        $queue->element();
        $act = $queue->toArray();
        $this->assertEquals($exp, $act);
    }

    /**
     * @covers Queue::peek
     */
    public function testQueuePeek() {
        $exp = "a";
        $queue = new Queue("a", "b");
        $act = $queue->peek();
        $this->assertEquals($exp, $act);
    }

    /**
     * @covers Queue::peek
     */
    public function testQueuePeekNull() {
        $exp = null;
        $queue = new Queue();
        $act = $queue->peek();
        $this->assertEquals($exp, $act);
    }

    /**
     * @covers Queue::peek
     */
    public function testQueuePeekContents() {
        $exp = array("a", "b", "c");
        $queue = new Queue("a", "b", "c");
        $queue->peek();
        $act = $queue->toArray();
        $this->assertEquals($exp, $act);
    }

}
 