<?php

namespace App\Http\Controllers;



use App\Service\CSVFileService;
use Illuminate\Http\Request;

/**
 * @method CSVFileService()
 */
class ImportCSVController extends Controller
{

    /**
     * @param Request $request
     * @return mixed
     */
    public function read(Request $request)
    {
        $file_path = $request->get('file_path');
        $csvFileService = new CSVFileService;

        $data = $csvFileService->parseDataWithHeader($file_path);
        return $data;
    }

    /**
     * @param Request $request
     *
     */
    public function insert(Request $request)
    {
        $filePath = $request->get('file_path');
        $csvFileService = new CSVFileService;
        $data = $csvFileService->parseData($filePath);
        return $csvFileService->insertData($data);
    }
}
