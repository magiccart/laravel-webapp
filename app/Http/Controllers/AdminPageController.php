<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Ixudra\Curl\Facades\Curl;

class AdminPageController extends Controller
{
    public function index(){
        return view('admin.pages.index');
    }
    public function login(){
        return view('admin.pages.login');
    }
    public function logout(){
        Auth::logout();
        return redirect('/admin/login');
    }
    public function contact(){
        return view('admin.pages.contact');
    }

    public function register(){
        return view('admin.pages.register');
    }
    public function postLogin(Request $request){
        $this->validate($request,
            [
                'email'=> 'required|min:8|max:25',
                'password'=> 'required|min:1|max:20',
            ],
            [
                'password.required' => 'ban chua nhap password',
                'password.min' =>' password phai lon hon 3 ky tu',
                'password.max' =>' password phai nho hon 20 ky tu',
                'email.required' => 'ban chua nhap email',
                'email.min' =>' email phai lon hon 3 ky tu',
                'email.max' =>' email phai nho hon 20 ky tu',
            ]
        );
        $email = $request->email;
        $password = $request->password;
        $response = Curl::to(route('loginApi'))
            ->withData(['email'=>$email, 'password'=>$password])->post();
        $response = json_decode($response);
        if (isset($response->success->token)){
            $postRequest = null;
            $token = $response->success->token;
            $cURLConnection = curl_init(route('details'));
            curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $postRequest);
            curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, array(
                'Authorization: Bearer '. $token,
            ));
            $role = curl_exec($cURLConnection);
            curl_close($cURLConnection);
            switch ($role){
                case 1:
                    return redirect('/admin/index');
                    break;
                case 2:
                    return redirect(route('saler'));
                    break;
                case 3:
                    return redirect(route('installer'));
                    break;
                case 4:
                    return redirect(route('customer'));
                    break;
                default:
                return redirect('/admin/login');
            }
        }
        else{
            return redirect('/admin/login')->with('message',"email or password is not correct");
        }
    }
}
