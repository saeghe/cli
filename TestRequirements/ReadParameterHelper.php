#!/usr/bin/env php
<?php

namespace Tests\IO\ReadHelper;

use function Saeghe\Cli\IO\Read\parameter;

echo parameter('email', 'default-email@saeghe.com');
