<?php

namespace App\Http\Controllers\login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Admin;
use App\Loginlog;
use Session;
use App\VisitorInfo\UserInfo;

class LoginController extends Controller
{
    public function ShowLoginForm()
    {
        //view Login form
        return view('admin.login');
    }

    public function loginAction(Request $request)
    {

        $login  = $request->input('login');
        $password = $request->input('password');

        //for user details class object
        $userDetails = new UserInfo();

        //store Login log
        $loginLog = new Loginlog();
        $loginLog->login_id = $login;
        $loginLog->ip = $userDetails->get_ip();
        $loginLog->os = $userDetails->get_os();
        $loginLog->device = $userDetails->get_device();
        $loginLog->browser = $userDetails->get_browser();
        $loginLog->city = $userDetails->city();
        $loginLog->country = $userDetails->country();

        //fetch data by id password
        $data = Admin::where(['login' => $login, 'password' => $password])->first();

        if ($data) {
            $status = $data->status;
            if ($status == 1) {
                $id = $data->id;
                $name = $data->name;
                $super = $data->super;
                $contact = $data->contact;
                $image = $data->image;
                $status = $data->status;
                //Put User data in session
                Session::put('login', $login);
                Session::put('id', $id);
                Session::put('name', $name);
                Session::put('super', $super);
                Session::put('contact', $contact);
                Session::put('image', $image);
                Session::put('status', $status);

                //correct loging status
                $loginLog->status = 1;
                $loginLogSt = $loginLog->save();

                if ($loginLogSt) {
                    return redirect()->route('admin.dashboard');
                } else {
                    return back()->with('error', 'Wrong Login Details Not Save');
                }
            } else {
                //error login status
                $loginLog->status = 0;
                $loginLogSt = $loginLog->save();
                return back()->with('error', 'Your Id was bolcked');
            }
        } else {
            //error login status
            $loginLog->status = 0;
            $loginLogSt = $loginLog->save();
            return back()->with('error', 'Wrong Login Details');
        }
    }


    //Logout function
    public function logout()
    {
        //login id
        $loginId = Session::get('login');
        // find last loging log id
        $data = Loginlog::where('login_id', $loginId)
            ->orderBy('id', 'desc')->take(1)
            ->first();
        $id = $data->id;

        //make object and update logout time
        $loginLog = new Loginlog();
        $loginLog = Loginlog::find($id);
        //current time
        $loginLog->logout = date('Y-m-d H:i:s');
        $loginlog_success = $loginLog->save();

        if ($loginlog_success) {
            session()->flush();
            return redirect()->route('admin.login.form');
        } else {
            return "Somthing Going Wrong";
        }
    }
}
