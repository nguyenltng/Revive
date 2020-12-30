<?php


namespace App\Factories;


use App\Service\CSVFileService;
use App\Service\ExcelFileService;
use Exception;

class FileImportFactory
{
    /**
     * @param $fileType
     * @return CSVFileService|ExcelFileService
     * @throws Exception
     */
    public function makeService($fileType) {
        switch ($fileType) {
            case 'csv':
            case 'txt':
                return new CSVFileService();
            case 'xls':
            case 'xlsx':
                return new ExcelFileService();
            default:
                throw new Exception();
        }
    }
}
