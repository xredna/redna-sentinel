<?php

declare(strict_types=1);

namespace Redna\Sentinel;

class Reporter
{
    private string $reportPath;

    public function __construct()
    {
        // Set the default reports directory
        $this->reportPath = dirname(__DIR__) . '/reports/';
        
        if (!is_dir($this->reportPath)) {
            mkdir($this->reportPath, 0777, true);
        }
    }

    public function generateJson(string $targetUrl, array $results): string
    {
        $domain = parse_url($targetUrl, PHP_URL_HOST) ?: 'unknown';
        $fileName = "report_{$domain}_" . date('Y-m-d_H-i-s') . ".json";
        $fullPath = $this->reportPath . $fileName;

        $data = [
            'scan_info' => [
                'target' => $targetUrl,
                'timestamp' => date('c'),
                'engine' => 'Redna Sentinel v1.0'
            ],
            'results' => $results
        ];

        file_put_contents($fullPath, json_encode($data, JSON_PRETTY_PRINT));

        return $fullPath;
    }
}