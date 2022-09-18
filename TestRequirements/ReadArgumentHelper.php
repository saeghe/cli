#!/usr/bin/env php
<?php

namespace Tests\IO\ReadHelper;

use function Saeghe\Cli\IO\Read\argument;

echo argument('email', 'default-email@saeghe.com');
