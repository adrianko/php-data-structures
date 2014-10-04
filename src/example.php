<?php
require_once("Set.php");
require_once("SortedSet.php");

function printSet($set, $action) {
    echo $action."\n";
    print_r($set);
    echo "\n\n";
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

$set2 = new SortedSet("a", "b", "c");
printSet($set2, "Initialize, add: a, b, c");

$set2->add("a");
printSet($set2, "\$set->add('a')");

$set2->retainAll("a", "c");
printSet($set2, "\$set->retain('a', 'c')");

$set2->addAll("d", "e", "f", "h", "g");
printSet($set2, "\$set->addAll('d', 'e', 'f', 'h', 'g')");

$set2->removeAll("d", "e", "f");
printSet($set2, "\$set->removeAll('d', 'e', 'f')");

echo "\$set->size(): ".$set2->size()."\n";