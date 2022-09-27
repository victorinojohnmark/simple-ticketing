<?php

namespace App\Http\Controllers;

use App\Models\FileAttachment;
use Illuminate\Http\Request;

class FileAttachmentController extends Controller
{
    public function uploadfile(Request $request)
    {
        // dd($request);
        if($request->hasFile('fileAttachment')) {
            $file = $request->file('fileAttachment');
            $filename = $file->getClientOriginalName();
            $fileExtension = $file->guessExtension();
            $customFilename = uniqid() . now()->timestamp . '.' . $fileExtension;

            $request['orig_filename'] = $filename;
            $request['filename'] = $customFilename;

            dd($request->all());
            $fileattachment = FileAttachment::create($request);

            // if($fileattachment) {
            //     $file->storeAs('public/fileattachment/', $customFilename);
                
            // }

            // return $fileattachment;
        }
    }
}
