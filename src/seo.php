<?php

declare(strict_types=1);

namespace Redna\Sentinel;

use Symfony\Component\DomCrawler\Crawler;

class Seo
{
    public function audit(Scanner $scanner): array
    {
        $issues = [];
        $response = $scanner->request('GET', '/');

        if ($response && $response->getStatusCode() === 200) {
            $html = (string)$response->getBody();
            $crawler = new Crawler($html);

            if ($crawler->filter('title')->count() === 0) {
                $issues[] = "[SEO] Missing <title> tag.";
            }

            if ($crawler->filter('meta[name="description"]')->count() === 0) {
                $issues[] = "[SEO] Missing meta description.";
            }
        }
        return $issues;
    }
}