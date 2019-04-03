<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;

class UploadController extends Controller
{

    public function fileCreate()
    {
        return view('imageupload');
    }

    public function fileStore(Request $request)
    {
        $image = $request->file('file');

        $imageName = $image->getClientOriginalName();
        $image->move(public_path('dropzone'),$imageName);

        $imageUpload = new Image();
        $imageUpload->image = $imageName;
        $imageUpload->save();
        return response()->json(['success'=>$imageName]);
    }
}
