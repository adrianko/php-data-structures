<?php

/**
 * Stack - data type
 *
 * A stack implemented in PHP. Non synchronised. PHP however allows
 * multi type arrays so haven't quite figured out the type situation yet.
 *
 * @author AK <akcodes3@gmail.com>
 * @version 0.1
 */
class Stack extends Collection{

    public function pop() {
        if(empty($this->elements)) {
            throw new Exception("Empty stack");
        }

        return array_shift($this->elements);
    }

    public function peek() {
        if(empty($this->elements)) {
            throw new Exception("Empty stack");
        }

        return $this->elements[0];
    }

    public function push($e) {
        array_unshift($this->elements, $e);

        return $e;
    }

    public function search($e) {

    }

} 