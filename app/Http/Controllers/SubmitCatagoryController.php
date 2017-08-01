<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catagories;

class SubmitCatagoryController extends Controller
{
    public function categorises_show()
    {
        $collection=Catagories::all();
        return view('/faculty_submit', compact('collection'));
    }

    public function catagories(Request $request)
    {
        $data = $request->all();
        Catagories::create([
            'catagories' => $data['catagories'],

        ]);
        return redirect()->back();
    }
}
