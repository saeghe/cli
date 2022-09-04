<?php

namespace Saeghe\Cli\IO\Write;

function line(string $string, ?string $foreground = '39')
{
    echo "\e[{$foreground}m$string" . PHP_EOL;
}

function success(string $string)
{
    line($string, '92');
}

function error(string $string)
{
    line($string, '91');
}
