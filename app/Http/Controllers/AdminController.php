<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Admin;

class AdminController extends Controller
{
    public function Dashboard(){
        return view('admin.dashboard');
    }
    //add
    public function Add(){
        return view('admin.admin.add');
    }
    //insert
    public function Insert(Request $request){
        $validateData = $request->validate([
            'login' => 'required | min:3 | max:50',
            'image' => 'required | max:500', // file only jgp and size Not more than 500 kb
        ]);

        $data = new Admin();

        $image = $request->file('image');
        if ($image) {
            $image_name = str_random(5);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'images/admin/';
            $image_url = $upload_path . $image_full_name;
            $successImg = $image->move($upload_path, $image_full_name);
        }
        if ($successImg) {
            $data->login = request('login');
            $data->password = request('password');
            $data->name = request('name');
            $data->contact = request('contact');
            $data->email = request('email');
            $data->status = request('status');
            $data->super = request('super');
            $data->image = $image_url;
            $successData = $data->save();
            //echo $data;
        }

        if ($successData) {
            $notification = array(
                'messege' => 'Successfully Data Inserted',
                'alert-type' => 'success'
            );
            return Redirect()->route('admin.admin.all')->with($notification);
        } else {
            $notification = array(
                'messege' => 'Somthing Going Wrong',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
}
