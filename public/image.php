<?php

const BASE_PATH = __DIR__ . "/../";

$img = $_GET["img"];
$targetDir = BASE_PATH . "uploads/";
$targetPath = $targetDir . $img;

if (file_exists($targetPath)) {
    $mimeType = mime_content_type($targetPath);

    header("Content-Type: $mimeType");
    readfile($targetPath);
} else {
    http_response_code(404);
}
