<?php

namespace LegalSite\Services;

class LegalDocumentRenderer
{
    public static function render(
        LegalClientService $client,
        string $slug
    ): string {

        return $client
            ->getDocument($slug)
            ->contentHtml;
    }
}