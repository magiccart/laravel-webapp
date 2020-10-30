<?php

namespace App\Http\Controllers;

use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Mail;
use Ixudra\Curl\Facades\Curl;
use App\Http\Controllers\MailController;

class Saler extends Controller
{
    public function url($urlcall){
        return 'http://localhost/webapp_test/public/'.$urlcall;
    }
    public function index(){
        return view('admin.pages.saler.index');
    }
    public function getContact(){
        $response = Curl::to(url('api/get-data-contact'))->get();
        $list_contact_users = json_decode($response);;
        foreach($list_contact_users as $user){
            if ($user->status==2){
                $listUser['isconfirmed'][] = $user;
            }
            else{
                $listUser['notconfirmed'][] = $user;
            }
        }
        return view('admin.pages.saler.get-contact',['data'=>$listUser]);
    }

    public function getDasboard(){
        return view('admin.pages.saler.getDasboard');
    }

    public function getListPotentials(){
        return view('admin.pages.saler.potential-list');
    }
    public function getListProject(){
        return view('admin.pages.saler.project-list');
    }
    public function getListInspection(){
        return view('admin.pages.saler.list-inspection');
    }
    public function getListUser(){
        $response = Curl::to(route('getListUser'))->get();
        $response = json_decode($response);
        foreach ($response as $res){
            $createdAt = Carbon::parse($res->created_at);
            $createdAt  = $createdAt->format('d/m/Y-H:i A');
            $res->created_at = $createdAt;
            if ($res->confirm_status==0){
                $data['isconfirmed'][] = $res;
            }
            else{
                $data['notconfirmed'][] = $res;
            }
        }
        return $data;
    }

    public function getEditUser(Request $request,$id){
        $this->validate($request,
            [
                'address1'=> 'required',
            ],
            [
                'address1.required' => 'ban chua nhap email',
            ]
        );
        $scheduleDate = $request->scheduleDate;
        $user = Curl::to(asset('api/getDetailUser').'/'.$id)->get();
        if ($scheduleDate == $user->schedule_date){
            return response()->json(['data'=>'error']);
        }
        else{
                $scheduleDate = $request->scheduleDate;
//                Carbon::today();
        $response = Curl::to(asset('api/editUser').'/'.$id)
                ->withData(['address1'=>$request->address1,'scheduleDate'=>$request->scheduleDate])
                ->put();
            $response = json_decode($response);
            MailController::send($request->scheduleDate);
            return response()->json(['data' => ['name'=>$response->name, 'email'=>$response->email,'id'=>$id,'confirm_status'=>$response->confirm_status,'address1'=>$request->address1,'scheduleDate'=>$scheduleDate]]);
        }
    }
}
