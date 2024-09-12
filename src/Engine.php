<?php

namespace Brain\Engine;

use function cli\line;
use function cli\prompt;

function Hello()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line("What is the result of the expression?");
    $rend = [];
    $operations = ['+', '-', '*'];
    for ($i = 0; $i < 3; $i++) {
        $rend[] = [rand(0, 15), $operations[rand(0,2)], rand(0, 15)];
    }
    foreach ($rend as $item) {
        $result = 0;
        switch ($item[1]) {
            case '+':
                $result = $item[0] + $item[2];
                break;
            case '-':
                $result = $item[0] - $item[2];
                break;
            case '*':
                $result = $item[0] * $item[2];
                break;                           
        }
        line("Question: {$item[0]} {$item[1]} {$item[2]}");
        $answer = prompt("Your answer: ");
        if((int)$answer !== (int)$result) {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$result}'.");
            line("Let's try again, {$name}!");
            break;
        }
        line("Correct!");
        line("Congratulations, {$name}!");
    }
}