#!/usr/bin/env php
<?php

namespace Tests\IO\WriteHelper;

use function Saeghe\Cli\IO\Read\parameter;
use function Saeghe\Cli\IO\Write\error;
use function Saeghe\Cli\IO\Write\line;
use function Saeghe\Cli\IO\Write\success;

$function = parameter('function');
$message = parameter('message');

switch ($function) {
    case 'line':
        line($message);
        break;
    case 'success':
        success($message);
        break;
    case 'error':
        error($message);
        break;
    default:
        echo 'function does not exist!';
        break;
}

