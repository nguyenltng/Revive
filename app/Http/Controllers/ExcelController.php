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
        $filePath = $request->get('file_path');
        $ext = pathinfo($filePath, PATHINFO_EXTENSION);

        print $ext;

        switch ($ext) {
            case 'csv':
                $csvFileService = new CSVFileService;
                $data = $csvFileService->parseDataWithHeader($filePath);
                break;
            case 'xlsx':
                $excelFileService = new ExcelFileService;
                $data = $excelFileService->parseData($filePath);
                break;
            default:
                return 0;
        }
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
