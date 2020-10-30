<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResetResource;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function getForgotPassword(Request $request)
    {
        //Tạo token và gửi đường link reset vào email nếu email tồn tại
        $result = User::where('email', $request->email)->first();
        if($result){
            $success['token'] =  Str::random(60);
            return response()->json(['success' => $success],200);
        } else {
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }
    public function store(Request $request)
    {
        $reset = new PasswordReset();
        $reset->email = $request->email;
        $reset->token = $request->token;
        $reset->save();
        return new ResetResource($reset);
    }

}
