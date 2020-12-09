<?php


namespace App\Service;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use phpseclib\Crypt\Hash;

class CSVFileService extends FileService
{

    /**
     * @param $file_path
     * @return mixed
     */
    public function parse($file_path)
    {
        $content = $this->read($file_path);
        $contents = explode("\r\n", $content);

        for($i = 0; $i < sizeof($contents); $i++){
            $member[]  = explode(",", $contents[$i]);
        }
        return $member;
    }

    /**
     * @param $file_path
     * @return mixed
     */
    public function parseWithHeader($file_path)
    {
        $member = $this->parse($file_path);

        for($i = 1; $i < sizeof($member); $i++){
            $array[]  = array_combine($member[0], $member[$i]);
        }

        return $array;
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
            foreach ($array as $key=>$value){
                $user = User::query()->create([
                    'name' => $value['name'],
                    'email' => $value['email'],
                    'password' => bcrypt($value['password']),
                ]);
                $users[] = $user->id;
            }
        }
        return $users;
    }
}
