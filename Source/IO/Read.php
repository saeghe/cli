<?php

namespace Saeghe\Cli\IO\Read;

function argument(int $number, ?string $default = null): ?string
{
    global $argv;

    $inputs = [];

    foreach ($argv as $userInput) {
        if (! str_starts_with($userInput, '-')) {
            $inputs[] = $userInput;
        }
    }

    unset($inputs[0]);

    return $inputs[$number] ?? $default;
}

function command(): ?string
{
    global $argv;

    return ! isset($argv[1]) || str_starts_with($argv[1], '-') ? null : $argv[1];
}

function parameter(string $name, ?string $default = null): ?string
{
    $input = getopt('', [$name . '::']);

    if (count($input) === 0) {
        global $argv;

        $input = array_reduce($argv, function ($carry, $argument) use ($name) {
            return str_starts_with($argument, "--$name=")
                ? [$name => str_replace("--$name=", '', $argument)]
                : $carry;
        }, []);
    }

    return $input[$name] ?? $default;
}

function option(string $name): bool
{
    global $argv;

    $option = false;

    foreach ($argv as $input) {
        if (
            $input === '--' . $name
            || str_starts_with($input, '--' . $name . '=')
            || $input === '-' . $name
        ) {
            $option = true;
            break;
        }
    }

    return $option;
}
