<?php
// Router script for PHP built-in web server

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Serve static files directly
if ($uri !== '/' && file_exists(__DIR__ . $uri)) {
    return false;
}

// Extract note name from URI
$note = null;
if (preg_match('#^/([a-zA-Z0-9_-]+)$#', $uri, $matches)) {
    $_GET['note'] = $matches[1];
}

// Include the main index.php
require __DIR__ . '/index.php';
