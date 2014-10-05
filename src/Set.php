<?php

/**
 * Class Set - data type
 *
 * A set data type implemented in PHP. Non synchronised. PHP however allows
 * multi type arrays so haven't quite figured out the type situation yet.
 *
 * @author AK <akcodes3@gmail.com>
 * @version 0.1
 *
 * @todo Unit tests
 */
class Set {

    /**
     * Holds all the elements of the set
     * @var array
     */
    protected $elements;

    /**
     * Initializes the class and adds all args to the set
     */
    public function __construct() {
        $this->elements = array();
        $args = func_get_args();
        foreach($args as $a) {
            $this->add($a);
        }
    }

    /**
     * Adds arg to set and removes any duplicates
     * @param $e
     * @return bool
     */
    public function add($e) {
        $exists = $this->contains($e);
        $this->elements[] = $e;
        $this->elements = array_unique($this->elements);

        return ($exists == true ? false : true);
    }

    /**
     * Adds all args to the set
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
     * Clears the set
     */
    public function clear() {
        $this->elements = array();
    }

    /**
     * Checks whether element is in the set
     * @param $e
     * @return bool
     */
    public function contains($e) {
        return in_array($e, $this->elements);
    }

    /**
     * Checks whether set contains all elements specified
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
     * Checks whether 2 sets are equal
     * @param Set $s
     * @return bool
     */
    public function equals(Set $s) {
        if(!is_array($s->toArray()) || !is_array($this->elements)) {
            return false;
        }

        $a = array_diff($s->toArray(), $this->elements);
        $b = array_diff($this->elements, $s->toArray());

        return $a === $b;
    }

    /**
     * Checks whether set is empty
     * @return bool
     */
    public function isEmpty() {
        return empty($this->elements);
    }

    /**
     * Removes element from the set
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
     * Removes all elements from the set
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
     * Removes all elements from the set while retaining all specified
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
     * Returns the size of the set
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
