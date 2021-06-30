<?php
namespace App\Traits;
use Illuminate\Support\Str;
use Storage;

trait StorageImageTrait{
    public function storageTraitUpload($req,$folderName){
        if($req->hasFile('image')){
            $file_name = $req->file('image')->getClientOriginalName();
            $file_name_hash = Str::random(40).'.'.$req->file('image')->getClientOriginalExtension();
            $path = $req->file('image')->storeAs(
            'public/'.$folderName,$file_name_hash
            );
            $dataUploadTrait = [
                'file_name' => $file_name,
                'file_path' => Storage::url($path)
            ];
            return $dataUploadTrait;
        }else{
            return null;
        }
    }
}
