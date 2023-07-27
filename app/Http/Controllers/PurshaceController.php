<?php

namespace App\Http\Controllers;

use App\Models\Purshace;
use Illuminate\Http\Request;

class PurshaceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(){
        $purshace = Purshace::all();
        return view('admin.purshace.index', ['purshaces' => $purshace]);
    }

    public function create(){
        return view('admin.purshace.add');
    }

    public function edit($id){
        $purshace = Purshace::find($id); 
        return view('admin.purshace.edit', ['purshace' => $purshace]);
    }


    public function delete($id){
        $purshace = Purshace::find($id);
        $purshace->delete();
        return redirect('/admin/purshaces')->with('message', 'Deleted Successful');
    }
}
