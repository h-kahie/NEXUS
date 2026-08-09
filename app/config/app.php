<?php

declare(strict_types=1);

const APP_NAME = 'NEXUS';
const APP_VERSION = '1.0.0';
const APP_TIMEZONE = 'Africa/Nairobi';

date_default_timezone_set(APP_TIMEZONE);

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
