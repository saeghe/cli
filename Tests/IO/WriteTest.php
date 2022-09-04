<?php

namespace Tests\IO\WriteTest;

test(
    title: 'it should write message to output',
    case: function () {
        $message = 'This is an message to see on output.';
        $output = shell_exec(__DIR__ . '/../../TestRequirements/WriteHelper.php --function=line --message="' . $message . '"');

        assert($output === "\e[39m$message" . PHP_EOL, 'Line function does not work properly!');
    }
);

test(
    title: 'it should write success message to output',
    case: function () {
        $message = 'This is a success message to see on output.';
        $output = shell_exec(__DIR__ . '/../../TestRequirements/WriteHelper.php --function=success --message="' . $message . '"');
        assert($output === "\e[92m$message\e[39m" . PHP_EOL, 'Success function does not work properly!');
    }
);

test(
    title: 'it should write error message to output',
    case: function () {
        $message = 'This is an error message to see on output.';
        $output = shell_exec(__DIR__ . '/../../TestRequirements/WriteHelper.php --function=error --message="' . $message . '"');
        assert($output === "\e[91m$message\e[39m" . PHP_EOL, 'error function does not work properly!');
    }
);
