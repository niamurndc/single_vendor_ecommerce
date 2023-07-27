<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(){
        $uid = auth()->user()->id;        
        $customer = User::find($uid);
        return view('admin.profile', ['customer' => $customer]);
    }

    public function edit(Request $request, $id){
        $this->validate($request, [
            'name' => 'required|string',
        ]);
        
        $customer = User::find($id);

        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        if($request->password != null){
            $customer->password = bcrypt($request->customer);
        }
        
        $customer->update();
        return redirect('/admin/profile')->with('message', 'Updated Successful');
    }
}
