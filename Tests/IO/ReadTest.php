<?php

namespace Tests\IO\Read;

test(
    title: 'it should read from input',
    case: function () {
        $email = 'my_email@saeghe.com';
        $output = shell_exec(__DIR__ . '/../../TestRequirements/ReadArgumentHelper.php --email=' . $email);
        assert($output === $email, $output);
    }
);

test(
    title: 'it should return default value if argument not passed',
    case: function () {
        $output = shell_exec(__DIR__ . '/../../TestRequirements/ReadArgumentHelper.php');
        assert('default-email@saeghe.com' === $output, $output);
    }
);

test(
    title: 'it should read command',
    case: function () {
        $command = 'add';
        $output = shell_exec(__DIR__ . '/../../TestRequirements/ReadCommandHelper.php ' . $command);
        assert($output === $command, $output);
    }
);

test(
    title: 'it should return null as command when start with --',
    case: function () {
        $command = 'add';
        $output = shell_exec(__DIR__ . '/../../TestRequirements/ReadCommandHelper.php --command=' . $command);

        assert(is_null($output), $output);
    }
);

test(
    title: 'it should read argument from input after any command',
    case: function () {
        $email = 'my_email@saeghe.com';
        $output = shell_exec(__DIR__ . '/../../TestRequirements/ReadArgumentHelper.php a-command --email=' . $email);
        assert($output === $email, $output);
    }
);
