#!/usr/bin/env php
<?php

require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Redna\Sentinel\Scanner;
use Redna\Sentinel\Security;
use Redna\Sentinel\Seo;
use Redna\Sentinel\Reporter;

$app->register('scan')
    ->addArgument('url', InputArgument::REQUIRED, 'The URL to scan')
    ->getCode(function (InputInterface $input, OutputInterface $output) {
        $url = $input->getArgument('url');
        $output->writeln("<info>[*] Initiating Audit: {$url}</info>");

        $scanner = new Scanner($url);
        $allIssues = [];

        // Security Scan
        $security = new Security();
        $securityIssues = $security->audit($scanner);
        $allIssues['security'] = $securityIssues;

        // SEO Scan
        $seo = new Seo();
        $seoIssues = $seo->audit($scanner);
        $allIssues['seo'] = $seoIssues;

        // Display results to terminal
        foreach ($securityIssues as $issue) $output->writeln("<error>$issue</error>");
        foreach ($seoIssues as $issue) $output->writeln("<comment>$issue</comment>");

        // Generate Report
        $reporter = new Reporter();
        $filePath = $reporter->generateJson($url, $allIssues);
        
        $output->writeln("<info>[+] Scan complete. Report saved to: {$filePath}</info>");

        return 0;
    });