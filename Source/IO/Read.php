<?php

namespace Saeghe\Cli\IO\Read;

function argument($name, $default = null): ?string
{
    $input = getopt('', [$name . '::']);

    if (count($input) === 0) {
        global $argv;

        $input = array_reduce($argv, function ($carry, $argument) use ($name) {
            if (str_starts_with($argument, "--$name=")) {
                return [$name => str_replace("--$name=", '', $argument)];
            }

            return $carry;
        }, []);
    }

    return $input[$name] ?? $default;
}

function command(): ?string
{
    global $argv;

    return str_starts_with($argv[1], '--') ? null : $argv[1];
}
