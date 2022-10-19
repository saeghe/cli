<?php

namespace Tests\IO\Read;

test(
    title: 'it should read parameter from input',
    case: function () {
        $email = 'my_email@saeghe.com';
        $output = shell_exec(__DIR__ . '/../../TestRequirements/ReadParameterHelper.php --email=' . $email);
        assert($output === $email, $output);

        $output = shell_exec(__DIR__ . '/../../TestRequirements/ReadParameterHelper.php');
        assert('default-email@saeghe.com' === $output, $output);

        $output = shell_exec(__DIR__ . '/../../TestRequirements/ReadParameterHelper.php a-command --email=' . $email);
        assert($output === $email, $output);
    }
);

test(
    title: 'it should read command',
    case: function () {
        $command = 'add';
        $output = shell_exec(__DIR__ . '/../../TestRequirements/ReadCommandHelper.php ' . $command);
        assert($output === $command, $output);

        $output = shell_exec(__DIR__ . '/../../TestRequirements/ReadCommandHelper.php --command=' . $command);
        assert(is_null($output), $output);

        $output = shell_exec(__DIR__ . '/../../TestRequirements/ReadCommandHelper.php');
        assert(is_null($output), $output);

        $output = shell_exec(__DIR__ . '/../../TestRequirements/ReadCommandHelper.php -h');
        assert(is_null($output), $output);
    }
);

test(
    title: 'it should read argument from input',
    case: function () {
        $output = shell_exec(__DIR__ . '/../../TestRequirements/ReadArgumentHelper.php --number=2 build production');
        assert('production' === $output, 'Output is not what we want: ' . $output);

        $output = shell_exec(__DIR__ . '/../../TestRequirements/ReadArgumentHelper.php --number=1 build');
        assert('build' === $output, $output);

        $output = shell_exec(__DIR__ . '/../../TestRequirements/ReadArgumentHelper.php --number=2 default');
        assert('default-value' === $output, $output);

        $output = shell_exec(__DIR__ . '/../../TestRequirements/ReadArgumentHelper.php --number=1 --any-option=option with-argument');
        assert('with-argument' === $output, $output);

        $output = shell_exec(__DIR__ . '/../../TestRequirements/ReadArgumentHelper.php --number=1 -option with-option');
        assert('with-option' === $output, $output);

        $output = shell_exec(__DIR__ . '/../../TestRequirements/ReadArgumentHelper.php --number=1 -option --any-option=option with-argument-and-option');
        assert('with-argument-and-option' === $output, $output);

        $output = shell_exec(__DIR__ . '/../../TestRequirements/ReadArgumentHelper.php --number=2 -option --any-option=option build development');
        assert('development' === $output, $output);
    }
);

test(
    title: 'it should read option by given name',
    case: function () {
        $output = shell_exec(__DIR__ . '/../../TestRequirements/ReadOptionHelper.php --option-name');
        assert(1 == $output, $output);

        $output = shell_exec(__DIR__ . '/../../TestRequirements/ReadOptionHelper.php');
        assert(0 == $output, 'It should return false '. $output);

        $output = shell_exec(__DIR__ . '/../../TestRequirements/ReadOptionHelper.php --option-name=false');
        assert(1 == $output, 'It should return true when option used as argument ' . $output);

        $output = shell_exec(__DIR__ . '/../../TestRequirements/ReadOptionHelper.php -option-name');
        assert(1 == $output, $output);
    }
);
