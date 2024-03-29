<?php
// Sanitize and validate the file parameter
if (!isset($_GET['file']) || !preg_match('/^[a-zA-Z0-9\/]+$/', $_GET['file'])) {
    http_response_code(400);
    exit('Invalid file parameter');
}

// Get the JavaScript file path from the query string
$file = $_GET['file'];

// Check if the file exists
$jsFilePath = $file . '.js';
if (!file_exists($jsFilePath)) {
    http_response_code(404);
    exit('File not found');
}

// Read the JavaScript file content
$content = file_get_contents($jsFilePath);

// Run Babel transpilation
$transpiled = shell_exec('npx babel --presets @babel/preset-env,@babel/preset-react ' . escapeshellarg($jsFilePath));

// Check for errors during transpilation
if ($transpiled === false) {
    http_response_code(500);
    exit('Error transpiling JavaScript');
}

// Output transpiled JavaScript with proper MIME type
header('Content-Type: application/javascript');
echo $transpiled;
?>
