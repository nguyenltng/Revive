<?php


namespace App\Service;


class FileService
{
    /**
     * @param $file_path
     * @return string|null
     */
    public function read($file_path)
    {
        $content = file_get_contents($file_path);
        return $content;

    }
}
