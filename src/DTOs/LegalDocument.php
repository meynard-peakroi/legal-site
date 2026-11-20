<?php

namespace LegalSite\DTOs;

readonly class LegalDocument
{
    public function __construct(
        public string $title,
        public string $slug,
        public string $contentHtml,
        public ?string $effectiveDate = null,
        public ?string $version = null,
        public ?string $companyName = null,
        public ?string $companyEmail = null,
    ) {}
}
