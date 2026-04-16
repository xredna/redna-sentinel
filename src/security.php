<?php

declare(strict_types=1);

namespace Redna\Sentinel;

class Security
{
    private array $criticalPaths = [
        '/.env', '/.git/config', '/composer.json', '/config.php.bak'
    ];

    public function audit(Scanner $scanner): array
    {
        $issues = [];
        foreach ($this->criticalPaths as $path) {
            $response = $scanner->request('GET', $path);
            if ($response && $response->getStatusCode() === 200) {
                $issues[] = "[CRITICAL] Sensitive file exposed: {$path}";
            }
        }
        return $issues;
    }
}