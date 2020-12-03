<?php


namespace App\Service;


class FileService
{
    /**
     * @param $file_path
     * @return string|null
     */
    public function read($file_path) {

        $file = fopen($file_path, 'r');

        $content = null;
        while(! feof($file))
        {
            $line = fgets($file);
            $content = $content . $line;
        }
        return $content;

    }
}
