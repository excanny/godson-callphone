<?php

namespace App\Helpers;
use Illuminate\Http\Request;

class AppHelper
{
    public function uploadFileToFolder(Request $request, $original_file_name, $filepath)
    {
        $new_file_name = time().uniqid().'.'.$request->$original_file_name->extension();
        $fullpath = $request->file($original_file_name)->move($filepath, $new_file_name);
        return $fullpath;
    }

    public static function instance()
    {
        return new AppHelper();
    }
}