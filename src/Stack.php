<?php

require_once(realpath(dirname(__FILE__))."/../src/Collection.php");
/**
 * Stack - data type
 *
 * A stack implemented in PHP. Non synchronised. PHP however allows
 * multi type arrays so haven't quite figured out the type situation yet.
 *
 * @author AK <akcodes3@gmail.com>
 * @version 0.1
 *
 * @todo Add search body
 */
class Stack extends Collection {

    /**
     * Initializes the class and adds all args to the stack
     */
    public function __construct() {
        parent::__construct();
        $args = func_get_args();
        foreach($args as $a) {
            $this->push($a);
        }
    }

    /**
     * @return mixed
     * @throws Exception - when stack empty
     */
    public function pop() {
        if(empty($this->elements)) {
            throw new Exception("Empty stack");
        }

        return array_shift($this->elements);
    }

    /**
     * @return mixed
     * @throws Exception - when stack empty
     */
    public function peek() {
        if(empty($this->elements)) {
            throw new Exception("Empty stack");
        }

        return $this->elements[0];
    }

    /**
     * @param $e
     * @return mixed
     */
    public function push($e) {
        array_unshift($this->elements, $e);

        return $e;
    }

    /**
     * @param $e
     * @return int
     */
    public function search($e) {

    }

} 