<?php


namespace App\Service;


use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ExcelFileService extends CSVFileService
{
    public function read($filePath)
    {
        $spreadsheet = IOFactory::load($filePath);
        $data = $spreadsheet->getActiveSheet()->toArray();
        return $data;
    }

    public function parseData($filePath)
    {
        $row = $this->read($filePath);

        for($i = 1; $i < sizeof($row); $i++){
            $data[]  = array_combine($row[0], $row[$i]);
        }
        return $data;
    }

}
