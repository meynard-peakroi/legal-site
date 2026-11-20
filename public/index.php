<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/vendor/autoload.php';

$configValues = require dirname(__DIR__) . '/config/legal.php';

use LegalSite\Config;
use LegalSite\Services\LegalClientService;
use LegalSite\Services\LegalPageRenderer;

$legal = new LegalClientService(
    new Config(
        apiUrl: $configValues['api_url'],
        apiKey: $configValues['api_key'],
        brandDomain: $_SERVER['HTTP_HOST'],
    )
);

$slug = trim(
    parse_url(
        $_SERVER['REQUEST_URI'],
        PHP_URL_PATH
    ),
    '/'
);

if ($slug === '') {
    $slug = 'privacy-policy';
}

echo LegalPageRenderer::render($legal, $slug);
