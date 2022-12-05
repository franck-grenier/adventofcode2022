<?php

$games = explode(PHP_EOL, file_get_contents('./input.txt'));

$scores = [
    'win' => 6,
    'loss' => 0,
    'draw' => 3
];

$points = [
    'rock' => 1,
    'paper' => 2,
    'scissors' => 3
];

$rules = [
    'A > Z',
    'B > X',
    'C > Y',
];

$opponent = [
    'A' => 'rock',
    'B' => 'paper',
    'C' => 'scissors'
];

$me = [
    'X' => 'rock',
    'Y' => 'paper',
    'Z' => 'scissors'
];

$myGuide = [
    'X' => [ // loss
        'A' => 'Z',
        'B' => 'X',
        'C' => 'Y'
    ],
    'Y' => [ // draw
        'A' => 'X',
        'B' => 'Y',
        'C' => 'Z'
    ],
    'Z' => [ // win
        'A' => 'Y',
        'B' => 'Z',
        'C' => 'X'
    ]
];

foreach ($games as $game) {
    $oppPlay = $game[0];
    $myPlay = $myGuide[$game[2]][$game[0]];

    $oppScore += $points[$opponent[$oppPlay]];
    $myScore += $points[$me[$myPlay]];

    if ($opponent[$oppPlay] === $me[$myPlay]) // draw
    {
        $oppScore += $scores['draw'];
        $myScore += $scores['draw'];
    }
    elseif (in_array("{$oppPlay} > {$myPlay}", $rules)) // opponent wins
    {
        $oppScore+= $scores['win'];
        $myScore+= $scores['loss'];
    }
    else // I win
    {
        $myScore+= $scores['win'];
        $oppScore+= $scores['loss'];
    }
}

print($myScore);
