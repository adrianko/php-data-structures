<?php

require_once(realpath(dirname(__FILE__))."/../src/Collection.php");

/**
 * Class Set - data type
 *
 * A set data type implemented in PHP. Non synchronised. PHP however allows
 * multi type arrays so haven't quite figured out the type situation yet.
 *
 * @author AK <akcodes3@gmail.com>
 * @version 0.1
 */
class Set extends Collection {

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

}
