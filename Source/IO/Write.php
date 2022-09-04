<?php

namespace Saeghe\Cli\IO\Write;

function line(string $string)
{
    echo "\e[39m$string" . PHP_EOL;
}

function success(string $string)
{
    echo "\e[92m$string\e[39m" . PHP_EOL;
}

function error(string $string)
{
    echo "\e[91m$string\e[39m" . PHP_EOL;
}
