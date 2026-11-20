<?php

namespace LegalSite\Contracts;

use LegalSite\DTOs\LegalDocument;

interface LegalClientInterface
{
    public function getDocument(
        string $slug
    ): LegalDocument;
}
