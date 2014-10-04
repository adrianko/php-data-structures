<?php
require_once("Set.php");

function printSet($set, $action) {
    echo $action."\n";
    echo $set."\n\n";
}

$set = new Set("a", "b", "c");
printSet($set, "Initialize, add: a, b, c");

$set->add("a");
printSet($set, "\$set->add('a')");

$set->retainAll("a", "c");
printSet($set, "\$set->retain('a', 'c')");

$set->addAll("d", "e", "f", "h", "g");
printSet($set, "\$set->addAll('d', 'e', 'f', 'h', 'g')");

$set->removeAll("d", "e", "f");
printSet($set, "\$set->removeAll('d', 'e', 'f')");

echo "\$set->size(): ".$set->size()."\n";