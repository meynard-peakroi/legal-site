<?php

namespace LegalSite\Services;

use JsonException;
use LegalSiteExceptions\DocumentNotFoundException;
use LegalSiteExceptions\UnauthorizedException;
use Throwable;

class LegalPageRenderer
{
    /**
     * @throws JsonException
     */
    public static function render(
        LegalClientService $client,
        string $slug,
    ): string {
        // Handle http status error codes
        try {
            $document = $client->getDocument($slug);
            include dirname(__DIR__, 2) . '/resources/views/layout.php';
        } catch (DocumentNotFoundException) {
            http_response_code(404);
            require dirname(__DIR__, 2) . '/resources/views/errors/404.php';
        } catch (UnauthorizedException) {
            http_response_code(403);
            require dirname(__DIR__, 2) . '/resources/views/errors/403.php';
        } catch (Throwable) {
            http_response_code(500);
            require dirname(__DIR__, 2) . '/resources/views/errors/500.php';
        }
    }
}
