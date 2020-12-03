<?php


namespace App\Service;


use PhpOffice\PhpSpreadsheet\IOFactory;

class ExcelFileService extends CSVFileService
{

    public function read($file_path)
    {
        $spreadsheet = IOFactory::load($file_path);
        $data = $spreadsheet->getActiveSheet()->toArray();
        return $data;
    }

    public function parseData($array)
    {
        $row = $this->read($array);

        for($i = 1; $i < sizeof($row); $i++){
            $data[]  = array_combine($row[0], $row[$i]);
        }
        return $data;
    }

}
