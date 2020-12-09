<?php


namespace App\Service;


use PhpOffice\PhpSpreadsheet\IOFactory;


class ExcelFileService extends CSVFileService
{


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
