<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Models\Inputs;


class UploadfileController extends Controller
{
    function index(){

        return view('confirm');
    }

    function upload(Request $requests)
    {
        $this->validate($requests, [
            'select_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $image = $requests->file('select_file');
        $new_name = rand() .'.'. $image->getClientOriginalExtension();
        $image->move(public_path("images"),$new_name);
        return back()->with('success','อัพโหลดรูปภาพสำเร็จ')->with('path',$new_name);
    }
}
