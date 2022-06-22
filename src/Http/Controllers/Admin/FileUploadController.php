<?php

namespace Marrs\MarrsAdmin\Http\Controllers\Admin;

use Exception;
use Marrs\MarrsAdmin\Http\Controllers\Controller;
use Marrs\MarrsAdmin\Traits\UploadFile;
use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    use UploadFile;

    public function upload(Request $request)
    {

        if (is_file($request->file[0])) {
            $response = $this->uploadFile(
                $request->file[0],
                $request->path ? $request->path : '',
                $request->type ? $request->type : '',
            );
            return $response;
        } else {
            return null;
        }
    }

    public function imageUpload(Request $request)
    {
        $file = $request->file;

        $destinationPath = 'storage/upload/images/';
        if (in_array($file->extension(), [
            "jpg",
            "JPG",
            "jpeg",
            "JPEG",
            "png",
            "PNG"
        ])) {
            $size  = $file->getSize();
            $narq = explode(".", $file->getClientOriginalName());
            $extension = $file->getClientOriginalExtension();
            $fileName = date('Ymd_his') . rand(0, 100000) . '.' . $extension;
            $archive = $destinationPath . $fileName;
            $file->move($destinationPath, $archive);


            $response = array(
                'location' => '/' . $archive
            );

            return $response;
        } else {
            return null;
        }
    }

    public function imageLineUpload(Request $request)
    {
        $file = $this->upload($request);
        $obj = (object) array('link' => $file);
        if ($file) {
            $files = [$obj];
            return view("marrs-admin::general.images.rowfile", ['files' => $files]);
        }
    }
}
