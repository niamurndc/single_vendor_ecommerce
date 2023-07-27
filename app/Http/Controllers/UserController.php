<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(){
        $customers = User::where('role', 1)->get();
        return view('admin.user.index', ['customers' => $customers]);
    }

    public function create(){
        return view('admin.user.add');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|string',
            'phone' => 'required|numeric|unique:users',
            'password' => 'required|string',
        ]);

        $customer = new User();

        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->role = 1;
        $customer->password = bcrypt($request->password);

        $customer->save();
        return redirect('/admin/users')->with('message', 'Added Successful');
    }

    public function edit($id){
        $customer = User::find($id);

        return view('admin.user.edit', ['customer' => $customer]);
    }

    public function update(Request $request, $id){
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
        return redirect('/admin/users')->with('message', 'Updated Successful');
    }

    public function delete($id){
        $customer = User::find($id);
        $customer->delete();
        return redirect('/admin/users')->with('message', 'Deleted Successful');
    }
}
