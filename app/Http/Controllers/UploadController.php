<?php

namespace App\Http\Controllers;

use App\Rules\ConfirmPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function index()
    {
        return view('upload');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'password' => ['required', new ConfirmPassword()],
            'file' => 'required|file|mimes:pdf,doc,docx|max:10000',
        ]);



        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        if($file->storeAs('uploads', $filename)) {
//            Storage::put($filename, $request->file('file'));

//            $request->file('file')->storeAs(
//                'uploads', $filename
//            );
            DB::table('settings')
                ->where('id', 1)
                ->update(['filename' => $filename]);

            return view('success', ['message' => 'File Uploaded Successfully!']);
        }

        return back()->withErrors(['file' => 'File Not Uploaded!']);
    }
}
