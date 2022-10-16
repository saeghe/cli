<?php

namespace Saeghe\Cli\IO\Read;

function argument(string $name, mixed $default = null): ?string
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

    return ! isset($argv[1]) || str_starts_with($argv[1], '-') ? null : $argv[1];
}

function argument_after(string $input, mixed $default = null): mixed
{
    global $argv;

    $argument = $default;

    foreach ($argv as $key => $userInput) {
        if ($userInput === $input) {
            $argument = $argv[$key + 1] ?? $default;
            $argument = $argument === null || ! str_starts_with($argument, '--') ? $argument : $default;
            break;
        }
    }

    return $argument;
}

function option(string $name): bool
{
    global $argv;

    $option = false;

    foreach ($argv as $passedOption) {
        if ($passedOption === '--' . $name || str_starts_with($passedOption, '--' . $name . '=')) {
            $option = true;
            break;
        }
    }

    return $option;
}
