<?php


namespace App\Service;


use PhpOffice\PhpSpreadsheet\IOFactory;


class ExcelFileService extends CSVFileService
{
    public function parse(string $fileContent) {
        $tempFilePath = 'E:/tmp';
        $file = fopen($tempFilePath, 'w');
        fwrite($file, $fileContent);
        fclose($file);

        $this->parseFromPath($tempFilePath);

    }
    /**
     * @param $filePath
     * @return array|string|null
     */
    public function parseFromPath($filePath)
    {
        $spreadsheet = IOFactory::load($filePath);
        $data = $spreadsheet->getActiveSheet()->toArray();
        return $data;
    }
}
