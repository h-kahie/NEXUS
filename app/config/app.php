<?php

define('APP_NAME', 'NEXUS');
define('APP_VERSION', '1.0.0');

date_default_timezone_set('Africa/Nairobi');

function e(string $value): string {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
