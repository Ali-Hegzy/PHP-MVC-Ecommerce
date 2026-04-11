<?php

const BASE_PATH = __DIR__ . "/../";

$imageName = $_GET["img"] ?? "";
$targetDir = BASE_PATH . "uploads/";
$targetPath = $targetDir . $imageName;

if (is_dir($targetPath)) {
    http_response_code(404);
    echo "Page Not Found";
    die();
}

if (file_exists($targetPath) && strpos(realpath($targetPath), realpath($targetDir)) === 0) {
    $mimeType = mime_content_type($targetPath);

    header("Content-Type: $mimeType");
    readfile($targetPath);
} else {
    http_response_code(404);
    echo "Page Not Found";
}
