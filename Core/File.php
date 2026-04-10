<?php

namespace Core;

class File
{
    public static function store(string $targetDir, array $file) : bool|string
    {
        $extension = explode("/", $file["type"])[1];
        $fileName = uniqid() . time() . "." . $extension;
        $targetFilePath = $targetDir . $fileName;

        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }

        if(move_uploaded_file($file["tmp_name"], $targetFilePath)){
            return $targetFilePath;
        }

        return false;
    }
}
