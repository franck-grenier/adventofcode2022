<?php

$rucksacks = explode(PHP_EOL, file_get_contents('./input.txt'));
$priorities = array_flip(array_merge(range('a', 'z'), range('A', 'Z')));
$total = 0;

for ($i = 0; $i < count($rucksacks) / 3; $i++)
{
    $commonItem = array_values(array_unique(
        array_intersect(
            str_split($rucksacks[$i * 3 + 0]),
            str_split($rucksacks[$i * 3 + 1]),
            str_split($rucksacks[$i * 3 + 2])
        )))[0];
    $total += $priorities[$commonItem] + 1;
}

print($total);
