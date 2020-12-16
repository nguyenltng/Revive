<?php


namespace App\Service;

use Illuminate\Support\Facades\Validator;
use mysqli;

class CSVFileService extends FileService
{
    public function parse(string $fileContent) {
        $tempFilePath = 'E:/tmp';
        $file = fopen($tempFilePath, 'w');
        fwrite($file, $fileContent);
        fclose($file);

        $data = $this->parseFromPath($tempFilePath);
        unlink($tempFilePath);
        return $data;
    }
    /**
     * @param $file_path
     * @return mixed
     */
    public function parseFromPath($file_path)
    {
        $content = $this->read($file_path);
        $line = explode("\r\n", $content);

        $member[0]  = explode(",", $line[0]);
        for($i = 1; $i < sizeof($line); $i++){
            $member[]  = explode(",", $line[$i]);
            $data[]  = array_combine($member[0], $member[$i]);
        }
        return $data;
    }


    /**
     * @param array $array
     * @return array|false
     */
    public function validate(Array $array)
    {
        $error = array();
        foreach ($array as $key=>$value)
        {
            $validator = Validator::make($value, [
                "name" => "required|min:4|max:50",
                "email" => "required|email|unique:users,email",
                "password" => "required|min:8",
                "phone" => "nullable|integer"
            ]);

            if($validator->fails()) {
                $error = [$key => $validator->errors()->getMessages()];
            }
        }
        return empty($error) ? 1 : $error;
    }

    /**
     * @param $array
     */
    public function insertData($array)
    {
        if($this->validate($array) != 1){
            return $this->validate($array);
        }else{
            $mysqli = new mysqli(env('DB_HOST'), env('DB_USERNAME'), env('DB_PASSWORD'), env('DB_DATABASE'));

            $inserts = array();
            foreach($array as $key => $value) {
                $inserts[] = "('".($value["name"])."','".($value["email"])."','".bcrypt($value['password'])."')";
            }
            $query = "INSERT INTO users(name,email,password) VALUES".implode(",",$inserts);
            if(!$mysqli->query($query)){
                echo $mysqli->error;
            }
        }
        return $mysqli->affected_rows;

    }
}
