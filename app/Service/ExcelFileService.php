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
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($filePath);
        $reader->setReadDataOnly(true);

        $spreadsheet = $reader->load($filePath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        for($i = 1; $i < sizeof($data); $i++){
            $array[]  = array_combine($data[0], $data[$i]);
        }
        return $array;
    }
}
