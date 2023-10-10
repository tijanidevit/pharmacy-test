<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

/**
 * FileTrait
 */
trait FileTrait
{

    public function uploadFile($folder,$file)
    {
        $env = env('APP_ENV');
        if ($env == 'local') {
            return url(Storage::url(Storage::putFile("public/$folder", $file,'public')));
        } else {
            return $file->storeOnCloudinary($folder)->getPublicId();
        }
    }

    public function loadFile($publicId)
    {
        $env = env('APP_ENV');
        if ($env == 'local') {
            return $publicId;
        } else {
            return Cloudinary::getUrl($publicId);
        }
    }

    public function deleteFile($file)
    {
        $env = env('APP_ENV');
        if ($env == 'local') {
            return Storage::delete($file);
        } else {
            return Cloudinary::destroy($file);
        }
    }
}
