<?php

/**
 * Collection - data type
 *
 * A collection implemented in PHP. Non synchronised. PHP however allows
 * multi type arrays so haven't quite figured out the type situation yet.
 *
 * @author AK <akcodes3@gmail.com>
 * @version 0.1
 */
abstract class Collection {

    /**
     * Holds all the elements of the collection
     * @var array
     */
    protected $elements;

    /**
     * Initializes the class and adds all args to the collection
     */
    public function __construct() {
        $this->elements = array();
        $args = func_get_args();
        foreach($args as $a) {
            $this->add($a);
        }
    }

    /**
     * Adds arg to collection
     * @param $e
     * @return bool
     */
    public function add($e) {
        $this->elements[] = $e;

        return true;
    }

    /**
     * Adds all args to the collection
     * @return bool
     */
    public function addAll() {
        $exists = false;
        $args = func_get_args();
        foreach($args as $a) {
            if($this->add($a) == true) {
                $exists = true;
            }
        }

        return $exists;
    }

    /**
     * Clears the collection
     */
    public function clear() {
        $this->elements = array();
    }

    /**
     * Checks whether element is in the collection
     * @param $e
     * @return bool
     */
    public function contains($e) {
        return in_array($e, $this->elements);
    }

    /**
     * Checks whether collection contains all elements specified
     * @return bool
     */
    public function containsAll() {
        $args = func_get_args();
        foreach($args as $a) {
            if(!in_array($a, $this->elements)) {
                return false;
            }
        }
        return true;
    }

    /**
     * Checks whether 2 collections are equal
     * @param Collection $c
     * @return bool
     */
    public function equals(Collection $c) {
        if(!is_array($c->toArray()) || !is_array($this->elements)) {
            return false;
        }

        $a = array_diff($c->toArray(), $this->elements);
        $b = array_diff($this->elements, $c->toArray());

        return $a === $b;
    }

    /**
     * Checks whether collection is empty
     * @return bool
     */
    public function isEmpty() {
        return empty($this->elements);
    }

    /**
     * Removes specified element from the collection
     * @param $e
     * @return bool
     */
    public function remove($e) {
        foreach($this->elements as $k => $s) {
            if($s == $e) {
                unset($this->elements[$k]);
                $this->elements = array_values($this->elements);
                return true;
            }
        }
        $this->elements = array_values($this->elements);

        return false;
    }

    /**
     * Removes all specified elements from the collection
     * @return bool
     */
    public function removeAll() {
        $exists = false;
        $args = func_get_args();
        foreach($args as $a) {
            if($this->remove($a) == true) {
                $exists = true;
            }
        }

        return $exists;
    }

    /**
     * Removes all elements from the collection while retaining all specified
     */
    public function retainAll() {
        $exists = false;
        $args = func_get_args();
        foreach($this->elements as $k => $e) {
            if(!in_array($e, $args)) {
                $exists = true;
                unset($this->elements[$k]);
            }
        }
        $this->elements = array_values($this->elements);

        return $exists;
    }

    /**
     * Returns the size of the collection
     * @return int
     */
    public function size() {
        return count($this->elements);
    }

    /**
     * Returns the array
     * @return array
     */
    public function toArray() {
        return $this->elements;
    }

    /**
     * Returns json encoded string
     * @return string
     */
    public function __toString() {
        return json_encode($this->elements);
    }

}