#!/usr/bin/env php
<?php

namespace Tests\IO\ReadHelper;

use function Saeghe\Cli\IO\Read\parameter;
use function Saeghe\Cli\IO\Read\argument;

$number = parameter('number');

echo argument($number, 'default-value');
