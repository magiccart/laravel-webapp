<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Ixudra\Curl\Facades\Curl;
use App\Mail\ResetPassword;
use function PHPSTORM_META\type;

class ForgotPasswordController extends Controller
{

    public function newPassIndex(){
        return view('newPass');
    }
    public function getForgotPassword(Request $request)
    {
        $this->validate($request,
            [
                'email'=> 'required|min:8|max:25',
            ],
            [
                'email.required' => 'ban chua nhap email',
                'email.min' =>' email phai lon hon 3 ky tu',
                'email.max' =>' email phai nho hon 20 ky tu',
            ]
        );
        $email = $request->email;
        $response = Curl::to(route('resetPassword'))
            ->withData(['email'=>$email])->post();
        $response = json_decode($response);
        if (isset($response->success->token)){
            $token = $response->success->token;
            $aaa = Curl::to(route('addToken'))->withData(['email'=>$email,'token'=>$token])->post();
            $link = url('resetPassword')."/".$token; //send it to email
//            $data = array('info'=>$link);
            MailController::resetPassword($link);
//            Mail::send('mail', $data, function($message){
//                $message->from('Service@gmail.com', 'Reset Password');
//                $message->to('hoangquan@gmail.com', 'Visitor')->subject('Reset Password');
//            });
            return view('checkEmail');
        } else {
            return redirect('forgot')->with('message','email is not correct');
        }
    }
    public function index(){
        return view('forgot');
    }
    public function resetPassword(Request $request,$token)
    {
        // Check token valid or not
        $result =  DB::table('password_resets')->where('token',$token)->first();
        $data['info'] = $token;
        if($result){
            return view('newPass', $data);
        } else {
            echo 'This link is expired';
        }
    }
    public function newPass(Request $request)
    {
        $this->validate($request,
            [
                'password'=> 'required|min:3|max:20',
                'confirm' =>'required|same:password'
            ],
            [
                'password.required' => 'ban chua nhap password',
                'confirm.required'=> 'ban chua nhap lai password',
                'confirm.same'=> 'Mat khau nhap lai phai trung'
            ]
        );
        // Check password confirm/admin/login
        if($request->password == $request->confirm){
            // Check email with token
            $result = DB::table('password_resets')->where('token', $request->token)->first();
            // Update new password
            User::where('email',$result->email)->update(['password'=>bcrypt($request->password)]);
            // Delete token
            DB::table('password_resets')->where('token', $request->token)->delete();
            return redirect('admin/login')->with('success','Reset Password Successful');
        } else {
            return redirect('newPass');
        }
    }
    public function getForgotPasswordIndex(){
        return view('forgot');
    }
}
