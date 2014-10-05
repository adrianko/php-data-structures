<?php

require_once(realpath(dirname(__FILE__))."/../src/Set.php");
/**
 * Class SortedSet - data type
 *
 * A SortedSet data type implemented in PHP. Non synchronised. PHP however allows
 * multi type arrays so haven't quite figured out the type situation yet.
 *
 * @author AK <akcodes3@gmail.com>
 * @version 0.1
 */
class SortedSet extends Set {

    /**
     * Override parent method to provide sorting after adding
     * @param $e
     * @return bool
     * @override
     */
    public function add($e) {
        $exists = $this->contains($e);
        $this->elements[] = $e;
        $this->elements = array_unique($this->elements);
        sort($this->elements);
        return $exists;
    }

}