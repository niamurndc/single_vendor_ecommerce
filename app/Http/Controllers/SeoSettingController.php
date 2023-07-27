<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SeoSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(){
        $setting = Setting::find(1);
        return view('admin.seo', ['setting' => $setting]);
    }

    public function edit(Request $request){
        $setting = Setting::find(1);

        $setting->desc = $request->desc;
        $setting->author = $request->author;
        $setting->tags = $request->tags;

        $setting->update();
        return redirect('/admin/seos')->with('message', 'Updated Successful');

    }
}
