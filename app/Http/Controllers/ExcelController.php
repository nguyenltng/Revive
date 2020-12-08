<?php

namespace App\Http\Controllers;



use App\Service\CSVFileService;
use App\Service\ExcelFileService;
use Illuminate\Http\Request;



/**
 * @method CSVFileService()
 */
class ExcelController extends Controller
{

    /**
     * @param Request $request
     * @return mixed
     */
    public function read(Request $request)
    {
        $file_path = $request->get('file_path');
        $excelFileService = new ExcelFileService;
        $data = $excelFileService->parseData($file_path);
        return $data;
    }

    /**
     * @param Request $request
     * @return array|false|int
     */
    public function insert(Request $request)
    {
        $filePath = $request->get('file_path');
        $excelFileService = new ExcelFileService;
        $data = $excelFileService->parseData($filePath);
        return $excelFileService->insertData($data);
    }



}
