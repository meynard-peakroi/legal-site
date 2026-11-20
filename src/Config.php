<?php

namespace LegalSite;

final readonly class Config
{
    public function __construct(
        public string $apiUrl,
        public string $apiKey,
        public string $brandDomain,
    ) {}
}