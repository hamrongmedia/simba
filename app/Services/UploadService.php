<?php
namespace App\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class UploadService
{
    /**
     * @param File $image
     * @param String $uploadPath
     * @param Request $request
     *
     * @return mixed|void
     */
    public function handleUploaded($image, $uploadPath='')
    {
        $filePath = '';
        if (!is_null($image)) {
            $originalName = $image->getClientOriginalName();
            $name = sha1(date('YmdHis') . Str::random(30));
            $save_name = $name . '.' . $image->getClientOriginalExtension();
            $filePath = $uploadPath . $save_name;
            if (!Storage::exists($uploadPath)) {
                Storage::makeDirectory($uploadPath);
            }
            Storage::put($filePath, file_get_contents($image));
        }
        return $save_name;
    }

    /**
     * @param File $image
     * @param Request $request
     *
     * @return mixed|void
     */
    public function handleDownload()
    {

    }

    /**
     * @param File $image
     * @param String $filePath
     * @param Request $request
     *
     * @return mixed|void
     */
    public function handleDelete($filePath='')
    {
        $exists = Storage::exists($filePath);
        if($exists) {
            Storage::delete($filePath);
            return true;
        }
        return false;
    }
}
