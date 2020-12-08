<?php


namespace App\Factories;


use App\Service\CSVFileService;
use App\Service\ExcelFileService;

class FileImportFactory
{
    public function makeService($fileType) {
        switch ($fileType) {
            case 'csv':
            case 'txt':
                return new CSVFileService();
            case 'xls':
            case 'xlsx':
                return new ExcelFileService();
            default:
                throw new \Exception();
        }
    }
}
