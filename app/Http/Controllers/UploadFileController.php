<?php

namespace App\Http\Controllers;
use App\Fileentry;
use Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UploadFileController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('home');
    }
    protected function entries()
    {
        $user=Fileentry::all();
        return view('home', compact('user'));
    }
    protected function entryshow($id)
    {
        $user=Fileentry::findorfail($id);
        return view('home', compact('user'));
    }

    protected function add() {
        $file = Request::file('filefield');
        $extension = $file->getClientOriginalExtension();
        Storage::disk('local')->put($file->getFilename().'.'.$extension, File::get($file));
        $entry = new Fileentry();
        $entry->original_filename = $file->getClientOriginalName();
        $entry->file_name = $file->getFilename().'.'.$extension;
        $entry->user_name = Auth::user()->name;
        $entry->save();


        return redirect('home');

    }

}
