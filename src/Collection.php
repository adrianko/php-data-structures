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
    protected $firstUse;
    protected $type;

    /**
     * Initializes the class and adds all args to the collection
     */
    public function __construct() {
        $this->elements = array();
        $this->firstUse = false;

        foreach(func_get_args() as $a) {
            $this->add($a);
        }
    }

    /**
     * Adds arg to collection
     * @param $e
     * @return bool
     */
    public function add($e) {
        if(!$this->firstUse) {
            $this->firstUse = true;
            $this->type = gettype($e);
        }

        if(gettype($e) == $this->type) {
            $this->elements[] = $e;

            return true;
        }

        return false;

    }

    /**
     * Adds all args to the collection
     * @return bool
     */
    public function addAll() {
        $exists = false;
        foreach(func_get_args() as $a) {
            if($this->add($a)) {
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
     *
     * @todo Add support for nested collections arrays
     */
    public function contains($e) {
        return in_array($e, $this->elements);
    }

    /**
     * Checks whether collection contains all elements specified
     * @return bool
     */
    public function containsAll() {
        foreach(func_get_args() as $a) {
            if(!$this->contains($a)) {
                return false;
            }
        }
        return true;
    }

    /**
     * Checks whether 2 collections are equal
     * @param Collection $c
     * @return bool
     *
     * @todo Nested collection/array checking
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
        foreach(func_get_args() as $a) {
            if($this->remove($a)) {
                $exists = true;
            }
        }

        return $exists;
    }

    /**
     * Removes all elements from the collection while retaining all specified
     * @param String*
     * @return bool
     */
    public function retainAll() {
        $exists = false;
        foreach($this->elements as $k => $e) {
            if(!in_array($e, func_get_args())) {
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