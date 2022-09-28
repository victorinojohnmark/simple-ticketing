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


            $fileattachment = FileAttachment::create([
                'orig_filename' => $filename,
                'filename' => $customFilename
            ]);

            if($fileattachment) {
                $file->storeAs('file_attachments/', $customFilename);

            return $fileattachment;

            } else {
                return response(['error' => true, 'error-msg' => 'File attachment fail saving'], 404);
            }

            

        }
    }
}
