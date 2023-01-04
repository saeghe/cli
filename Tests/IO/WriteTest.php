<?php

namespace Tests\IO\WriteTest;

use AssertionError;
use Saeghe\Cli\IO\Write;
use function Saeghe\TestRunner\Assertions\Boolean\assert_true;

test(
    title: 'it should write message to output',
    case: function () {
        $message = 'This is an message to see on output.';
        $output = shell_exec(__DIR__ . '/../../TestRequirements/WriteHelper.php --function=line --message="' . $message . '"');

        assert_true($output === "\e[39m$message" . PHP_EOL, 'Line function does not work properly!');
    }
);

test(
    title: 'it should assert line message on output',
    case: function () {
        $message = 'This is a message to see on output.';
        $output = shell_exec(__DIR__ . '/../../TestRequirements/WriteHelper.php --function=line --message="' . $message . '"');
        assert_true(true === Write\assert_line($message, $output), 'assert_line is not working properly!' . $output);

        $output = shell_exec(__DIR__ . '/../../TestRequirements/WriteHelper.php --function=line --message="' . $message . '"');
        $expected = 'expected output';
        $expectedOutput = "\e[39m$expected" . PHP_EOL;
        $actualOutput = "\e[39m$message" . PHP_EOL;
        try {
            Write\assert_line($expected, $output);
        } catch (AssertionError $exception) {
            assert_true(
                "Can not see '$expectedOutput' in '$actualOutput'." === $exception->getMessage(),
                'assert_line is not working properly!' . $output
            );
        }
    }
);

test(
    title: 'it should write success message to output',
    case: function () {
        $message = 'This is a success message to see on output.';
        $output = shell_exec(__DIR__ . '/../../TestRequirements/WriteHelper.php --function=success --message="' . $message . '"');
        assert_true($output === "\e[92m$message\e[39m" . PHP_EOL, 'Success function does not work properly!');
    }
);

test(
    title: 'it should assert success message on output',
    case: function () {
        $message = 'This is an success message to see on output.';
        $output = shell_exec(__DIR__ . '/../../TestRequirements/WriteHelper.php --function=success --message="' . $message . '"');
        assert_true(true === Write\assert_success($message, $output), 'assert_success is not working properly!' . $output);

        $output = shell_exec(__DIR__ . '/../../TestRequirements/WriteHelper.php --function=success --message="' . $message . '"');
        $expected = 'expected output';
        $expectedOutput = "\e[92m$expected\e[39m" . PHP_EOL;
        $actualOutput = "\e[92m$message\e[39m" . PHP_EOL;
        try {
            Write\assert_success($expected, $output);
        } catch (AssertionError $exception) {
            assert_true(
                "Can not see '$expectedOutput' in '$actualOutput'." === $exception->getMessage(),
                'assert_error is not working properly!' . $output
            );
        }
    }
);

test(
    title: 'it should write error message to output',
    case: function () {
        $message = 'This is an error message to see on output.';
        $output = shell_exec(__DIR__ . '/../../TestRequirements/WriteHelper.php --function=error --message="' . $message . '"');
        assert_true($output === "\e[91m$message\e[39m" . PHP_EOL, 'error function does not work properly!');
    }
);

test(
    title: 'it should assert error message on output',
    case: function () {
        $message = 'This is an error message to see on output.';
        $output = shell_exec(__DIR__ . '/../../TestRequirements/WriteHelper.php --function=error --message="' . $message . '"');
        assert_true(true === Write\assert_error($message, $output), 'assert_error is not working properly!' . $output);

        $output = shell_exec(__DIR__ . '/../../TestRequirements/WriteHelper.php --function=error --message="' . $message . '"');
        $expected = 'expected output';
        $expectedOutput = "\e[91m$expected\e[39m" . PHP_EOL;
        $actualOutput = "\e[91m$message\e[39m" . PHP_EOL;
        try {
            Write\assert_error($expected, $output);
        } catch (AssertionError $exception) {
            assert_true(
                "Can not see '$expectedOutput' in '$actualOutput'." === $exception->getMessage(),
            'assert_error is not working properly!' . $output
            );
        }
    }
);
