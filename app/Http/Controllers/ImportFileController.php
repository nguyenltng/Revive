<?php

namespace App\Http\Controllers;



use App\Factories\FileImportFactory;
use App\Service\CSVFileService;
use App\Service\ExcelFileService;
use Illuminate\Http\Request;



/**
 * @method CSVFileService()
 */
class ImportFileController extends Controller
{
    private $fileImportFactory;
    public function __construct(FileImportFactory $fileImportFactory) {
        $this->fileImportFactory = $fileImportFactory;
    }
    /**
     * @param Request $request
     * @param FileImportFactory $fileImportFactory
     * @return mixed
     * @throws \Exception
     */
    public function read(Request $request)
    {
        $filePath = $request->get('file_path');
        $ext = pathinfo($filePath, PATHINFO_EXTENSION);
        $service = $this->fileImportFactory->makeService($ext);
        $data = $service->read($filePath);
        return $data;
    }

    /**
     * @param Request $request
     * @return array|false|int
     * @throws \Exception
     */
    public function insert(Request $request)
    {
        $filePath = $request->get('file_path');
        $ext = pathinfo($filePath, PATHINFO_EXTENSION);
        $service = $this->fileImportFactory->makeService($ext);
        $data = $service->parseWithHeader($filePath);
        return $service->insertData($data);
    }



}
