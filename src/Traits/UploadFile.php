<?php

namespace Marrs\MarrsAdmin\Traits;

trait UploadFile
{
    public function uploadFile($file, $path, $type = null)
    {
        if ($this->verify($type, $file)) {
            $destinationPath = 'storage/uploads/' . $path;
            $size  = $file->getSize();
            $narq = explode(".", $file->getClientOriginalName());
            $extension = $file->getClientOriginalExtension();
            $fileName = date('Ymd_his') . rand(0, 100000) . '.' . $extension;
            $archive = $destinationPath . $fileName;
            $file->move($destinationPath, $archive);
            return $archive;
        } else {
            return Redirect::back()->withErrors(['message' => 'Erro ao salvar imagem']);
        }
    }

    public function deleteFile()
    {
    }

    public function verify($type, $file)
    {

        return true;
    }
}
