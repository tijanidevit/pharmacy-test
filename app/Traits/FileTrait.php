<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
/**
 * FileTrait
 */
trait FileTrait
{

    public function uploadFile($folder,$file)
    {
        return url(Storage::url(Storage::putFile("public/$folder", $file,'public')));
    }

    public function loadFile($file)
    {
        return $file;
    }

    public function deleteFile($file)
    {
        return Storage::delete($file);
    }
}
