<?php

namespace Saeghe\Cli\IO\Write;

use \AssertionError;

function line(string $string): void
{
    echo "\e[39m$string" . PHP_EOL;
}

function assert_line(string $expected, string $actual): bool
{
    $expected = "\e[39m$expected" . PHP_EOL;

    return $actual === $expected ?: throw new AssertionError("Can not see '$expected' in '$actual'.");
}

function success(string $string): void
{
    echo "\e[92m$string\e[39m" . PHP_EOL;
}

function assert_success(string $expected, string $actual): bool
{
    $expected = "\e[92m$expected\e[39m" . PHP_EOL;

    return $actual === $expected ?: throw new AssertionError("Can not see '$expected' in '$actual'.");
}

function error(string $string): void
{
    echo "\e[91m$string\e[39m" . PHP_EOL;
}

function assert_error(string $expected, string $actual): bool
{
    $expected = "\e[91m$expected\e[39m" . PHP_EOL;

    return $actual === $expected ?: throw new AssertionError("Can not see '$expected' in '$actual'.");
}
