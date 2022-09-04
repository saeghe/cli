<?php

namespace Saeghe\Cli\IO\Read;

function argument($name, $default = null)
{
    return getopt('', [$name . '::'])[$name] ?? $default;
}
