<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\File;

class FileController extends Controller
{
    public function index()
    {


        $files = File::paginate(5);

        if(request()->page > $files->lastPage()) {
            return redirect($files->url($files->lastPage()));
        }

        return Inertia::render('Files/Index', [
            'files' => $files
        ]);
    }

    public function storeS3(FileRequest $request)
    {

        $path = $request->file('file_s3')[0]->store('public', 's3');

        Storage::disk('s3')->setVisibility($path, 'public');

        File::create([
            'name' => basename($path),
            'file_path' => Storage::disk('s3')->url($path),

        ]);

        return redirect()->route('files.index')->with('status', ['type' => 'success', 'message' => __('file upload successfully in amazon s3')]);

    }

    public function storeDropbox(FileRequest $request)
    {

        $path = $request->file('file')[0]->store('public', 'dropbox');

        //dd(Storage::disk('dropbox')->getAdapter()->getTemporaryLink($path));

        File::create([
            'name' => basename($path),
            //'file_path' => Storage::disk('dropbox')->url($path),

        ]);

        return redirect()->route('files.index')->with('status', ['type' => 'success', 'message' => __('file upload successfully in dropbox')]);

    }

}
