<?php

namespace LegalSite\Services;

use JsonException;
use LegalSite\Config;
use LegalSite\Contracts\LegalClientInterface;
use LegalSite\DTOs\LegalDocument;
use RuntimeException;

readonly class LegalClientService implements LegalClientInterface
{
    public function __construct(
        private Config $config
    ) {}

    /**
     * @param string $slug
     * @return LegalDocument
     * @throws JsonException
     */
    public function getDocument(
        string $slug
    ): LegalDocument {
        $url = sprintf(
            '%s/api/legal/documents/%s',
            rtrim(
                $this->config->apiUrl,
                '/'
            ),
            $slug
        );

        $ch = curl_init($url);

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_HTTPHEADER => [
                'Accept: application/json',
                'X-API-Key: ' . $this->config->apiKey,
                $this->config->brandDomain,
            ],

        ]);

        $response = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);

        curl_close($ch);

        if ($error) {
            throw new RuntimeException($error);
        }

        if ($status !== 200) {
            throw new RuntimeException("Legal API returned HTTP {$status}");
        }

        $payload = json_decode($response, true, flags: JSON_THROW_ON_ERROR);

        return new LegalDocument(
            title: $payload['data']['title'] ?? '',
            slug: $payload['data']['slug'] ?? '',
            contentHtml: $payload['data']['content_html'] ?? '',
            effectiveDate: $payload['data']['effective_date'] ?? null,
            version: $payload['data']['version'] ?? null,
        );
    }
}
