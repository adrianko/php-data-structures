<?php

require_once(realpath(dirname(__FILE__))."/../src/Collection.php");

/**
 * Queue Set - data type
 *
 * A queue data type implemented in PHP. Non synchronised. PHP however allows
 * multi type arrays so haven't quite figured out the type situation yet.
 *
 * @author AK <akcodes3@gmail.com>
 * @version 0.1
 */
class Queue extends Collection {

    /**
     * Initializes the class and adds all args to the queue
     */
    public function __construct() {
        $this->elements = array();
        foreach(func_get_args() as $a) {
            $this->add($a);
        }
    }

    /**
     * @param $e
     * @return bool
     */
    public function offer($e) {
        return $this->add($e);
    }

    /**
     * @param null $e
     * @return bool|mixed
     * @throws Exception - no such element
     */
    public function remove($e = null) {
        if(empty($this->elements)) {
            throw new Exception("No such element");
        }

        return array_shift($this->elements);
    }

    /**
     * @return mixed|null
     */
    public function poll() {
        if(empty($this->elements)) {
            return null;
        }

        return array_shift($this->elements);
    }

    /**
     * @return mixed
     * @throws Exception - no suh element
     */
    public function element() {
        if(empty($this->elements)) {
           throw new Exception("No such element");
        }

        return $this->elements[0];
    }

    /**
     * @return mixed|null
     */
    public function peek() {
        if(empty($this->elements)) {
            return null;
        }

        return $this->elements[0];
    }

} 