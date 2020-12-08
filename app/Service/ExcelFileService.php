<?php


namespace App\Service;


use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ExcelFileService extends CSVFileService
{
    /**
     * @param $filePath
     * @return array|string|null
     */
    public function parse($filePath)
    {
        $spreadsheet = IOFactory::load($filePath);
        $data = $spreadsheet->getActiveSheet()->toArray();
        return $data;
    }
}
