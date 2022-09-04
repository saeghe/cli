<?php

namespace Tests\IO\Read;

test(
    title: 'it should read from input',
    case: function () {
        $email = 'my_email@saeghe.com';
        $output = shell_exec(__DIR__ . '/../../TestRequirements/ReadHelper.php --email=' . $email);
        assert($output === $email);
    }
);

test(
    title: 'it should return default value if argument not passed',
    case: function () {
        $output = shell_exec(__DIR__ . '/../../TestRequirements/ReadHelper.php');
        assert('default-email@saeghe.com' === $output);
    }
);
