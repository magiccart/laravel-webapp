<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Mail;
use App\Mail\welcomMail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use DB;
class UserController extends Controller
{
    public function register(){
        $response = Curl::to(url('api/get-states-api'))->get();
        $data = json_decode($response);
        return view('admin.pages.register')->with('data',$data);
    }
    public function call_city(Request $req){
        // dd($req);
        $response = Curl::to(url('api/get-cities-api'))->withData(
            ['id'=>$req->city])->post();;
        $data = json_decode($response);
        return $data;
    }
    public function post_register(Request $req){
        $response = Curl::to(url('api/register-api'))->withData([
            'name'=> $req->name,
            'phone'=> $req->phone,
            'email'=> $req->email,
            'contact_adr_1'=> $req->contact_adr_1,
            'contact_adr_2'=> $req->contact_adr_2,
            'contact_pincode'=> $req->contact_pincode,
            'contact_city'=> $req->contact_city,
            'contact_state'=> $req->contact_state,
            'contact_meu'=> $req->contact_meu,
            'type_meu'=> $req->type_meu,
            'contact_visit'=> $req->contact_visit,
        ])->post();
        $arr_err = json_decode($response);
        if (!($arr_err->error)) {
            $send_mail = [
                'pass' => $arr_err->pass,
                'link' => $arr_err->link,
            ];
            Mail::to($arr_err->email)->send(new welcomMail($send_mail));
            Session::put('message',$arr_err->message);
            Session::put('error',$arr_err->error);
            return redirect()->route('login');
        }
        Session::put('message',$arr_err->message);
        Session::put('error',$arr_err->error);
        return redirect()->back();
    }
    public function login(Request $req){
        return view('admin.pages.login');
    }
    public function site_inspection_detail(Request $req){
        return view('admin.pages.index');
    }
    public function update_inspection_detail(Request $req){
        $response = Curl::to(url('api/update-inspection-api'))->withData([
            'id' => $req->id,
            'name' => $req->name,
            'val' => $req->val
        ])->post();
        $data = json_decode($response);
        return response()->json([$data]);
    }
    public function get_inspection_detail(Request $req){
        $response = Curl::to(url('api/get-inspection-api'))->withData([
            'id' => $req->id,
        ])->get();
        $data = json_decode($response);
        $response_bank = Curl::to(url('api/get-bank-api'))->get();
        $data_bank = json_decode($response_bank);
        return view('admin.pages.index')->with('data',$data)->with('data_bank',$data_bank);
    }
    public function show_list_inspec(Request $req){
        $response = Curl::to(url('api/get-list-inspec'))->get();
        $data = json_decode($response);
        return view('admin.pages.list-inspec')->with('data',$data);
    }
    public function save_img_canvar(Request $req){
        $img = $req->imgBase64;
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $fileData = base64_decode($img);
        //saving
        $filename = 'img-canvar';
        $new_filename = $filename.Str::random(5).'.png';
        file_put_contents('img/'.$new_filename, $fileData);
        $response = Curl::to(url('api/save-img-canvar-api'))->withData([
            'id'=>$req->id,
            'panel_image' => $new_filename,
        ])->post();
        $data = json_decode($response);
        return response()->json($data);
    }
    public function create_potential(Request $req){
        DB::insert('insert into potentials (user_id,site_inspection_id) values(?,?)',[$req->user_id,$req->site_inspection_id]);
        DB::table('inspection')->where('id',$req->site_inspection_id)->update(['status'=>1]);
        return redirect('get-potentials-list');
    }
    public function get_potentials_list(Request $req){
        $response = Curl::to(url('api/get-potentials-list-api'))->get();
        $data = json_decode($response);
        return view('admin.pages.potential-list')->with('data',$data);
    }
    public function detail_potentials(Request $req){
        $response = Curl::to(url('api/get-detail-potentials-api/'.$req->id))->get();
        $data = json_decode($response); 
        return view('admin.pages.detail-potential')->with('data',$data);
    }
    public function show_page_install(){
        $response = Curl::to(url('api/get-list-install-api'))->get();
        $data = json_decode($response);
        return view('admin.pages.list-install')->with('data',$data);
    }
    public function show_page_add_install(){
        $response = Curl::to(url('api/get-states-api'))->get();
        $data = json_decode($response);
        return view('admin.pages.add-install')->with('data',$data);
    }
    public function add_install(Request $req){
        $response = Curl::to(url('api/add-install-api'))->withData(
            [
                'installer_name'=>$req->installer_name,
                'installer_contact_name'=>$req->installer_contact_name,
                'installer_phone'=>$req->installer_phone,
                'installer_email'=>$req->installer_email,
                'installer_pincode'=>$req->installer_pincode,
                'installer_state'=>$req->installer_state,
                'installer_city'=>$req->installer_city,
                'installer_adr_1'=>$req->installer_adr_1,
                'installer_adr_2'=>$req->installer_adr_2,
                'installer_number_of_project'=>$req->installer_number_of_project,
                'installer_total_installer'=>$req->installer_total_installer,
                'installer_maximum_installer'=>$req->installer_maximum_installer,
                'installer_number_of_employees'=>$req->installer_number_of_employees,
                'installer_maximum_distance'=>$req->installer_maximum_distance,
                'password'=>$req->password,
                'confirm_password'=>$req->confirm_password,
            ]
        )->post();
        $data = json_decode($response);
        if($data->status == 1){
            Session::put('status',$data->status);
            Session::put('message',$data->message);
            return redirect('show-page-install');
        }
        Session::put('status',$data->status);
        Session::put('message',$data->message);
        return  redirect()->back();
    }
    public function show_page_edit_install(Request $req){
        $response = Curl::to(url('api/get-states-api'))->get();
        $state = json_decode($response);
        $install_by_id = Curl::to(url('api/get-install-by-id-api/'.$req->id))->get();
        $data_install = json_decode($install_by_id);
        $getcity = Curl::to(url('api/get-cities-api'))->withData(['id'=>$data_install->installer_state])->post();
        $data_city = json_decode($getcity);
        return view('admin.pages.edit-install')->with('state',$state)->with('data_install',$data_install)->with('data_city',$data_city);
    }
    public function update_install(Request $req){
        $response = Curl::to(url('api/update-install-api'))->withData([
            'id'=>$req->id,
            'installer_name'=>$req->installer_name,
            'installer_contact_name'=>$req->installer_contact_name,
            'installer_phone'=>$req->installer_phone,
            'installer_email'=>$req->installer_email,
            'installer_pincode'=>$req->installer_pincode,
            'installer_state'=>$req->installer_state,
            'installer_city'=>$req->installer_city,
            'installer_adr_1'=>$req->installer_adr_1,
            'installer_adr_2'=>$req->installer_adr_2,
            'installer_number_of_project'=>$req->installer_number_of_project,
            'installer_total_installer'=>$req->installer_total_installer,
            'installer_maximum_installer'=>$req->installer_maximum_installer,
            'installer_number_of_employees'=>$req->installer_number_of_employees,
            'installer_maximum_distance'=>$req->installer_maximum_distance,
            'password'=>$req->password,
            'confirm_password'=>$req->confirm_password,
        ])->post();
        $data = json_decode($response);
        if($data->status == 1){
            Session::put('status',$data->status);
            Session::put('message',$data->message);
            return redirect('show-page-install');
        }
        Session::put('status',$data->status);
        Session::put('message',$data->message);
        return  redirect()->back();
    }
    public function list_customer(Request $req){
        $response = Curl::to(url('api/get-contact-api'))->get();
        $data = json_decode($response);
        return view('admin.pages.list-customer')->with('data',$data);
    }
    public function list_sale(){
        $response = Curl::to(url('api/get-list-sale-api'))->get();
        $data = json_decode($response);
        return view('admin.pages.list-sale')->with('data',$data);
    }
    public function show_page_add_sale(){
        return view('admin.pages.add-sale');
    }
    public function add_user_sale(Request $req){
        $response = Curl::to(url('api/add-user-sale-api'))->withData([
            'name'=>$req->name,
            'phone'=>$req->phone,
            'email'=>$req->email,
            'password'=>$req->password,
            'confirm_password'=>$req->confirm_password,
        ])->post();
        $data = json_decode($response);
        if($data->status == 1){
            Session::put('status',$data->status);
            Session::put('message',$data->message);
            return redirect('list-sale');
        }
        Session::put('status',$data->status);
        Session::put('message',$data->message);
        return  redirect()->back();
        return view('admin.pages.add-sale');
    }
    public function show_page_update_user_sale(Request $req){
        $user = DB::table('users')->where('id',$req->id)->first();
        return view('admin.pages.edit-sale')->with('id_user',$req->id)->with('user_info',$user);
    }
    public function update_user_sale(Request $req){
        $response = Curl::to(url('api/update-user-sale-api'))->withData([
            'name'=>$req->name,
            'phone'=>$req->phone,
            'id'=>$req->id,
        ])->post();
        $data = json_decode($response);
        if($data->status == 1){
            Session::put('status',$data->status);
            Session::put('message',$data->message);
            return redirect('list-sale');
        }
        Session::put('status',$data->status);
        Session::put('message',$data->message);
        return  redirect()->back();
        return view('admin.pages.add-sale');
    }
    public function show_page_dashboard_sale(Request $req){
        return view('admin.pages.dashboard-sale');
    }
    public function update_user_contact(Request $req){
        $response = Curl::to(url('api/update-user-contact-api'))->withData([
            'contact_adr_1'=>$req->address1,
            'contact_adr_2'=>$req->address2,
            'contact_visit'=>$req->scheduleDate,
            'id'=>$req->idcontact
        ])->post();
        $data = json_decode($response);
        if($data->status == 1){
            Session::put('status',$data->status);
            Session::put('message',$data->message);
            return  redirect()->back();
        }
        Session::put('status',$data->status);
        Session::put('message',$data->message);
        return  redirect()->back();
    }
    public function show_page_dashboard(Request $req){
        return view('admin.pages.dashboard');
    }
    public function show_page_list_project(Request $req){
        $response = Curl::to(url('api/get-list-project-api'))->get();
        $data = json_decode($response);
        return view('admin.pages.list-project')->with('data',$data);
    }
    public function show_page_detail_project(Request $req){
        $response = Curl::to(url('api/create-project-tracker-api/'.$req->id))->get();
        $project = json_decode($response);
        return view('admin.pages.detail-project')->with('project',$project);
    }
}
