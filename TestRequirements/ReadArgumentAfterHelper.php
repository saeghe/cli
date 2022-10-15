#!/usr/bin/env php
<?php

namespace Tests\IO\ReadHelper;

use function Saeghe\Cli\IO\Read\argument;
use function Saeghe\Cli\IO\Read\argument_after;

$case = argument('case');

echo match ($case) {
    'filled' => argument_after('build', 'production'),
    'not-enough-length' => argument_after('build', 'default-value'),
    'additional-option' => argument_after('build', 'default-value'),
    default => argument_after('build'),
};

