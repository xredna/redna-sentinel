# Redna Sentinel

[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](https://opensource.org/licenses/MIT)
[![PHP Version](https://img.shields.io/badge/php-%3E%3D8.1-777bb4.svg)](https://php.net)
[![Maintainer](https://img.shields.io/badge/Maintainer-Redna-red.svg)](https://redna.com.tr)

**Redna Sentinel** is a high-performance, CLI-based auditing utility designed for developers and system administrators who prioritize security and search engine integrity. It automates the detection of critical misconfigurations and SEO inconsistencies in modern web infrastructures.

Built with a "Security-First" philosophy, it serves as a lightweight alternative to heavy auditing suites, providing immediate, actionable data.

---

## Key Features

### 1. Security Auditing
* **Sensitive Exposure Detection:** Scans for leaked environment files (`.env`), version control metadata (`.git`), and backup configurations.
* **Response Integrity:** Validates server response codes to ensure sensitive directories are properly restricted.

### 2. SEO Integrity Analysis
* **DOM Structure Validation:** Verifies the presence of essential SEO tags (`<title>`, `meta description`).
* **Accessibility Checks:** Audits document hierarchy and critical attribute compliance.

### 3. Professional Reporting
* **JSON Exports:** Automatically generates structured reports in the `/reports` directory.
* **CI/CD Ready:** The structured output is designed to be easily parsed by automated deployment pipelines.

---

## Installation

### Prerequisites
* **PHP 8.1** or higher
* **Composer** (Global or Local)

### Setup
1. Clone the repository:
   ```bash
   git clone [https://github.com/your-username/redna-sentinel.git](https://github.com/your-username/redna-sentinel.git)
2. Navigate to the project directory:
cd redna-sentinel
3. Install dependencies:
composer install

# Usage
To perform a comprehensive audit on a target URL, execute the following command:

php sentinel.php scan [https://example.com](https://example.com)
Command Options
scan [url]: Initiates the automated security and SEO audit.

The results will be displayed in your terminal and a detailed JSON report will be saved to the /reports folder.

# Project Architecture

/redna-sentinel
├── /src
│   ├── scanner.php      # Core HTTP Lifecycle Manager
│   ├── security.php     # Vulnerability Assessment Module
│   ├── seo.php          # SEO & DOM Analysis Module
│   └── reporter.php     # Structured Data Export Engine
├── /reports             # Auto-generated Scan Reports
├── sentinel.php         # CLI Entry Point
└── composer.json        # Dependency & PSR-4 Configuration

# License
Distributed under the MIT License. See LICENSE for more information.

# Built By
Redna Hub Technology and Digital Art Center redna.com.tr