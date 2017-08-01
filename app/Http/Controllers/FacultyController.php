<?php

namespace App\Http\Controllers;

use App\Catagories;
use App\faculty;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redirect;

class FacultyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function submit(Request $request)
    {
        $data = $request->all();
        $submition=faculty::create([
            'details' => $data['details'],
            'category'=>$data['selected'],
        ]);
        return redirect()->back();

    }
    protected function submit_show()
    {
        $submits=faculty::all();
        $catagory=Catagories::all();
        return view('/faculty_submit', compact('submits','catagory'));

    }


    protected function catagories(Request $request)
    {
        $data = $request->all();
        Catagories::create([
            'catagories' => $data['catagories'],

        ]);
        return redirect()->back();
    }






}
