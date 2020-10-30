<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

class SalerController extends Controller
{
    public function getListUser(){
        $emp = DB::table('users')->get();
        return $emp;
    }
    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        $user->address1 = $request->address1;
        $user->schedule_date = $request->scheduleDate;
        $user->confirm_status = 0;
        $user->save();
        return $user;
    }
    public function getDetailUser(Request $req)
    {
        $user =  DB::table('contact')->where('id',$req->id)->get();
        return $user;
    }
}
