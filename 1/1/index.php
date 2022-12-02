<?php

$input = explode(PHP_EOL, file_get_contents('./input.txt'));
$elf = 0;
foreach ($input as $calories) {
    if ($calories === '') {
        $elf++;
    }
    $elves[$elf] = (int) $calories + (int) ($elves[$elf] ?? 0);
}

print(max($elves));


