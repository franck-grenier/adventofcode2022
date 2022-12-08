<?php

$rucksacks = explode(PHP_EOL, file_get_contents('./input.txt'));
$priorities = array_flip(array_merge(range('a', 'z'), range('A', 'Z')));
$total = 0;

foreach ($rucksacks as $rucksack)
{
    $commonItem = array_values(array_unique(
        array_intersect(
            str_split(substr($rucksack, 0, strlen($rucksack) / 2)),
            str_split(substr($rucksack, strlen($rucksack) / 2, strlen($rucksack)))
        )))[0];
    $total += $priorities[$commonItem] + 1;
}

print($total);
