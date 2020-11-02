<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\DataInstaller;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\welcomMail;
use Illuminate\Support\Str;
use FFMpeg\FFMpeg;
use DB;
use App\Models\Inspection;
use File;
use Carbon\Carbon;
class UserApiController extends Controller
{
    public function url($urlcall){
        return 'http://localhost/laravel-webapp/public/'.$urlcall;
    }
    public function register_api(Request $req){
        $validator = Validator::make($req->all(), [
            'name'=> 'required',
            'phone'=> 'required',
            'email'=> 'required|email',
            'contact_adr_1'=> 'required',
            'contact_pincode'=> 'required|min:5',
            'contact_city'=> 'required',
            'contact_state'=> 'required',
            'contact_meu'=> 'required|numeric',
            'type_meu'=> 'required',
            'contact_visit'=> 'required',
            ], [
                'email.required' => 'Email cannot be left blank',
                'email.email'=>'Incorrect email format',
                'name.required' => 'Name cannot be left blank',
                'phone.required' => 'Phone cannot be left blank',
                'contact_adr_1.required' => 'Address cannot be left blank',
                'contact_pincode.required' => 'Phone cannot be left blank',
                'contact_pincode.min' => 'Please enter at least 6 characters.',
                'contact_state.required' => 'State cannot be left blank',
                'contact_city.required' => 'City cannot be left blank',
                'contact_meu.required' => 'Electricity cannot be left blank',
                'contact_meu.numeric' => 'You cannot enter must be a number.',
                'contact_visit.required' => 'Date and Time cannot be left blank',
            ]);
        if ($validator->fails()){
                return response()->json([
                    'error' => true,
                    'message' => $validator->errors(),
                ], 200);
            }
        // if (User::where('email', $req->email)->where('active',1)->first()) {
        //     $validator->getMessageBag()->add('email', 'Email already exists');
        //     return response()->json([
        //         'error' => true,
        //         'message' => $validator->errors(),
        //     ], 200);
        // }
        // dd($req->contact_visit);
        $user = new User();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->phone = $req->phone;
        $user->user_type = 4;
        $link_checkmail_random = Str::random(20);
        $user->user_key = md5($link_checkmail_random);
        $user->save();

        $contact = new Contact();
        $contact->id_user = $user->id;
        $contact->contact_name = $user->name;
        $contact->contact_email = $user->email;
        $contact->contact_adr_1 = $req->contact_adr_1;
        $contact->contact_adr_2 = $req->contact_adr_2;
        $contact->contact_pincode = $req->contact_pincode;
        $name_city = DB::table('cities')->where('id',$req->contact_city)->first();
        $contact->contact_city = $name_city->city;
        $name_state = DB::table('states')->where('id',$req->contact_state)->first();
        $contact->contact_state = $name_state->name;
        $contact->contact_phone = $user->phone;
        $contact->contact_meu = $req->contact_meu;
        $contact->type_meu = $req->type_meu;

        $date=date('Y-m-d H:m', strtotime($req->contact_visit));
        $date1 = str_replace(' ','T',$date);
        
        $contact->contact_visit = $date1;
        $contact->save();

        $link_confirm = url('confirm-account/'.$user->id.'/'.$link_checkmail_random);
        $data = [
            'error' => false,
            'message'=>'Successfully subscribed to email to confirm',
            'email'=> $user->email,
            // 'pass'=> $random_pass,
            'link'=> $link_confirm,
        ];
        return response()->json($data);
    }
    public function confirm_account_api(Request $req){
        $user = User::where('user_key',md5($req->user_key))->first();
        if(isset($user)){
            User::where('id',$req->id)->update(['active'=>1]);
            return response()->json([
                'message'=>'Account verification is successful',
            ], 200);
        }
        return response()->json([
            'message'=>'Account activation failed',
        ], 200);
    }
    public function forgot_password_api(Request $req){
        $validator = Validator::make($req->all(), [
            'email'=> 'required|email',
            ], [
                'email.required' => 'Email cannot be left blank',
                'email.email'=>'Incorrect email format',
            ]);
            if ($validator->fails()){
                return response()->json([
                    'error' => true,
                    'message' => $validator->errors(),
                ], 200);
            }
            $user = User::where('email',$req->email)->first();
            if(isset($user)){
                $link_checkmail_random = Str::random(20);
                User::where('id',$user->id)->update(['user_key'=>md5($link_checkmail_random)]);
                $link_confirm = url('forgot-password-api/'.$user->id.'/'.$link_checkmail_random);
                $data = [
                    'link'=> $link_confirm,
                ];
                Mail::to($user->email)->send(new welcomMail($data));
                return response()->json([
                    'error' => false,
                    'message'=>'Successful registration check email to receive password',
                ], 200);
            }else{
                return response()->json([
                    'error' => true,
                    'message'=>'Email does not exist',
                ], 200);
            }
    }
    public function get_states_api(Request $req){
        $country = DB::table('states')->get();
        return response($country);
    }
    public function get_cities_api(Request $req){
        $country = DB::table('cities')->where('state_id',$req->id)->get();
        return response($country);
    }
    public function roundTo($number, $to){
        return round($number/$to, 0)* $to;
    }
    public function get_inspection_api(Request $req){
        $get_inspec = Inspection::where('id',$req->id)->get();
        return response($get_inspec);
    }
    public function update_inspection_api(Request $req){
        $inspection = Inspection::where('id',$req->id)->update([
            $req->name=>$req->val
            ]);
        $get_inspec = Inspection::where('id',$req->id)->first();
        $remaining = null;
        $emi = null;
        $system_size=null;
        $tpc=null;
        
        if(isset($get_inspec->average_monthly_usage)&&isset($get_inspec->average_sun_hours)&&isset($get_inspec->bill_offset)){
        $system_size = ((($get_inspec->average_monthly_usage/30)/$get_inspec->average_sun_hours)*1.1)*(($get_inspec->bill_offset)/100);
        }
        if(isset($get_inspec->system_size)){
            $effective = self::roundTo($get_inspec->system_size,0.32);
            if(0<$effective && $effective<=3){
                $tpc=$effective*480000;
            }
            if(3<$effective && $effective<=6){
                $tpc=$effective*470000;
            }
            if(6<$effective && $effective<=10){
                $tpc=$effective*460000;
            }
            if(10<$effective){
                $tpc=$effective*450000;
            }
        }
        if(isset($get_inspec->deposit)){
            $remaining = $tpc-($get_inspec->deposit);
        } 
        if(isset($get_inspec->interest)&&isset($get_inspec->of_months)){
            $p = $tpc-($get_inspec->down_payment);
            $emi = $p*($get_inspec->interest)*(1+($get_inspec->interest))*($get_inspec->of_months)/((1+$get_inspec->interest)*($get_inspec->of_months)-1);
        }
        $inspection = Inspection::where('id',$req->id)->update([
                'system_size'=> $system_size,
                'remaining'=>$remaining,
                'emi'=>$emi,
                'tpc'=>$tpc,
        ]);
        $get_inspec = Inspection::where('id',$req->id)->first();
        // ss1
        if(isset($get_inspec->average_monthly_usage) && isset($get_inspec->average_sun_hours)&&isset($get_inspec->lat)&&isset($get_inspec->long)&&isset($get_inspec->system_size)){
            Inspection::where('id',$req->id)->update(['session_1' => 1]);
        }else{
            Inspection::where('id',$req->id)->update(['session_1' => 0]);
        }
        //ss2
        if(isset($get_inspec->small_leg) && isset($get_inspec->large_leg)&&isset($get_inspec->number_of_rows)&&isset($get_inspec->inverter_length)){
            Inspection::where('id',$req->id)->update(['session_2' => 1]);
        }else{
            Inspection::where('id',$req->id)->update(['session_2' => 0]);
        }
        // ss3
        if(isset($get_inspec->deposit) && isset($get_inspec->down_payment)&&isset($get_inspec->interest)&&isset($get_inspec->of_months)){
            Inspection::where('id',$req->id)->update(['session_3' => 1]);
        }else{
            Inspection::where('id',$req->id)->update(['session_3' => 0]);
        }
        $get_inspec = Inspection::where('id',$req->id)->first();
        $super_btn_hide='';
        if(($get_inspec->session_1==1)&&($get_inspec->session_2==1)&&($get_inspec->session_3==1)&&($get_inspec->session_4==1)&&($get_inspec->session_5==1)){
            $super_btn_hide='show';
        }
       
        if(isset($get_inspec->system_size)||isset($get_inspec->remaining)||isset($get_inspec->emi)||isset($get_inspec->tpc)){
            return response()->json([
                'system_size'=>$get_inspec->system_size,
                'remaining'=>$get_inspec->remaining,
                'emi'=>$get_inspec->emi,
                'tpc'=>$get_inspec->tpc,
                'ss1'=>$get_inspec->session_1,
                'ss2'=>$get_inspec->session_2,
                'ss3'=>$get_inspec->session_3,
                'super_btn_hide'=>$super_btn_hide
            ], 200);
        }
        return response()->json([
            'message'=>'update ok',
            'ss1'=>$get_inspec->session_1,
            'ss2'=>$get_inspec->session_2,
            'ss3'=>$get_inspec->session_3,
            'super_btn_hide'=>$super_btn_hide
        ], 200);
    }
    public function save_img_canvar_api(Request $req){
        $get_inspec = Inspection::where('id',$req->id)->first();
        $image_path = "img/".$get_inspec->panel_image;
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $get_inspec = Inspection::where('id',$req->id)->update([
            'panel_image'=>$req->panel_image
            ]);
        $get_inspec = Inspection::where('id',$req->id)->first();
        return response()->json([
            'panel_image'=>$get_inspec->panel_image,
        ], 200);
    }
    public function update_inspection_detail_document_api(Request $req){
        $file= $req->file('val');
        $duoi_filename = $file->getClientOriginalExtension();
        $array_ok = ['txt','docx','pdf','png','jpeg','jpg'];
        if(!in_array($duoi_filename,$array_ok)){
            return response()->json([
                'error'=>true,
                'message'=>'the files format must be txt,docx,pdf,png,jpeg,jpg'
            ], 200);
        }
        $filename = $file->getClientOriginalName();
        $name = current(explode('.',$filename));
        $new_filename = $name.Str::random(5).'.'.$duoi_filename;
        $file->move('upload/',$new_filename);

        $get_inspec = Inspection::where('id',$req->id)->first();
        $file_name_cu = $req->name;
        $image_path = "upload/".$get_inspec->$file_name_cu;
        if(File::exists($image_path)) {
            File::delete($image_path);
        }

        $get_inspec = Inspection::where('id',$req->id)->update([
            $req->name=>$new_filename
            ]);
        $url_file = url('upload/'.$new_filename);
          //ss4
        $get_inspec = Inspection::where('id',$req->id)->first();
        if(isset($get_inspec->document_1) && isset($get_inspec->document_2)&&isset($get_inspec->document_3)){
            Inspection::where('id',$req->id)->update(['session_4' => 1]);
        }else{
            Inspection::where('id',$req->id)->update(['session_4' => 0]);
        }
        $get_inspec = Inspection::where('id',$req->id)->first();
        $img_array_ok =  ['png','jpeg','jpg'];
        $super_btn_hide='';
        if(($get_inspec->session_1==1)&&($get_inspec->session_2==1)&&($get_inspec->session_3==1)&&($get_inspec->session_4==1)&&($get_inspec->session_5==1)){
            $super_btn_hide='show';
        }
        
        if(in_array($duoi_filename,$img_array_ok)){
            return response()->json([
                'error'=>false,
                'name'=>$req->name,
                'url_file'=>$url_file,
                'ss4'=>$get_inspec->session_4,
                'type'=>'img',
                'super_btn_hide'=>$super_btn_hide
            ]);
        }else{
            return response()->json([
                'error'=>false,
                'name'=>$req->name,
                'url_file'=>$url_file,
                'ss4'=>$get_inspec->session_4,
                'type'=>'document',
                'super_btn_hide'=>$super_btn_hide
            ]);
        }
    }
    public function remove_document_api(Request $req){
        $get_inspec = Inspection::where('id',$req->id)->first();
        $file_doc_old = $req->namedoc;
        $image_path = "upload/".$get_inspec->$file_doc_old;
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $get_inspec = Inspection::where('id',$req->id)->update([
            $req->namedoc=>null
            ]);
            $get_inspec = Inspection::where('id',$req->id)->first();
            if(isset($get_inspec->document_1) && isset($get_inspec->document_2)&&isset($get_inspec->document_3)){
                Inspection::where('id',$req->id)->update(['session_4' => 1]);
            }else{
                Inspection::where('id',$req->id)->update(['session_4' => 0]);
            }
            $get_inspec = Inspection::where('id',$req->id)->first();
            $super_btn_hide='';
            if(($get_inspec->session_1==1)&&($get_inspec->session_2==1)&&($get_inspec->session_3==1)&&($get_inspec->session_4==1)&&($get_inspec->session_5==1)){
                $super_btn_hide='show';
            }
        return response()->json([
            'deletedoc'=>true,
            'name'=>$req->namedoc,
            'ss4'=>$get_inspec->session_4,
            'super_btn_hide'=>$super_btn_hide
        ]);
    }
    public function getDetailUser(Request $req){
        $user =  DB::table('contact')->where('id',$req->id)->get();
        return $user;
    }
    public function save_area(Request $req){
        if($req->hasfile('file'))
        {
            foreach($req->file('file') as $file)
            {
                //lay ten file va duoi
                $name=$file->getClientOriginalName();
                //lay ten file
                $tenfile = current(explode('.',$name));
                //lay duoi file vd:jpg,png..
                $duoi_file = $file->getClientOriginalExtension();
                $new_name = $tenfile.Str::random(5).'.'.$duoi_file;
                $new_name_mp4 = $tenfile.Str::random(5).'.mp4';
                $array_ok = ['jpeg','jpg','png'];
                $array_video_ok = ['mp4','flv','avi','mkv','wmv','vob','mpeg'];
                if($req->namedb == 'wiring_path_video'){
                    if(!in_array($duoi_file,$array_video_ok)){
                        return response()->json([
                            'error'=>true,
                            'message'=>'file '.$name.' khong thuoc dinh dang video'
                        ], 200);
                    }else{
                        if($duoi_file!='mp4'){
                            $ffmpeg = FFMpeg::create([
                                'ffmpeg.binaries'  => 'FFmpeg/bin/ffmpeg.exe',
                                'ffprobe.binaries' => 'FFmpeg/bin/ffprobe.exe'
                            ]);
                            $ffmpeg->open($file)
                            ->save(new \FFMpeg\Format\Video\X264('aac'),'file_area/'.$new_name_mp4);
                            $dataname[] = $new_name_mp4;  
                            $url_file[] = url('file_area/'.$new_name_mp4);
                        }else{
                            $file->move('file_area/', $new_name);  
                            $dataname[] = $new_name;  
                            $url_file[] = url('file_area/'.$new_name);
                        }
                    }
                }else{
                    if(!in_array($duoi_file,$array_ok)){
                        return response()->json([
                            'error'=>true,
                            'message'=>'file '.$name.' khong thuoc dinh dang img'
                        ], 200);
                    }
                    $file->move('file_area/', $new_name);  
                    $dataname[] = $new_name;  
                    $url_file[] = url('file_area/'.$new_name);
                }
            }
            //xoa file truoc khi push
            $get_inspec = Inspection::where('id',$req->id)->first();
            $name_old = $req->namedb;
            $listname = $get_inspec->$name_old;
            $str = str_replace(array('"','[',']'),array('','',''),$listname);
            $arr_listname=explode(',',$str);
            foreach($arr_listname as $item){
                $image_path = "file_area/".$item;
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            //them data
            $get_inspec = Inspection::where('id',$req->id)->update([
                $req->namedb=>$dataname
            ]);
        }
          //ss5
          $get_inspec = Inspection::where('id',$req->id)->first();
        if(isset($get_inspec->panel_area) && isset($get_inspec->inverter_area)&&isset($get_inspec->wiring_path_video)){
            Inspection::where('id',$req->id)->update(['session_5' => 1]);
        }else{
            Inspection::where('id',$req->id)->update(['session_5' => 0]);
        }
        $get_inspec = Inspection::where('id',$req->id)->first();
        $super_btn_hide='';
        if(($get_inspec->session_1==1)&&($get_inspec->session_2==1)&&($get_inspec->session_3==1)&&($get_inspec->session_4==1)&&($get_inspec->session_5==1)){
            $super_btn_hide='show';
        }
       
        if($req->namedb == 'wiring_path_video'){
            return response()->json([
                'save'=>true,
                'namedb'=>$req->namedb,
                'style'=>'video',
                'url_file'=>$url_file,
                'ss5'=>$get_inspec->session_5,
                'super_btn_hide'=>$super_btn_hide
            ]);
        }
        return response()->json([
            'save'=>true,
            'namedb'=>$req->namedb,
            'style'=>'img',
            'url_file'=>$url_file,
            'ss5'=>$get_inspec->session_5,
            'super_btn_hide'=>$super_btn_hide
        ]);
    }
    public function delete_area(Request $req){
        $get_inspec = Inspection::where('id',$req->id)->first();
            $name_old = $req->name;
            $listname = $get_inspec->$name_old;
            $str = str_replace(array('"','[',']'),array('','',''),$listname);
            $arr_listname=explode(',',$str);
            foreach($arr_listname as $item){
                $image_path = "file_area/".$item;
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
        $get_inspec = Inspection::where('id',$req->id)->update([
            $req->name=>null
            ]);
           //ss5    
           $get_inspec = Inspection::where('id',$req->id)->first();
           if(isset($get_inspec->panel_area) && isset($get_inspec->inverter_area)&&isset($get_inspec->wiring_path_video)){
               Inspection::where('id',$req->id)->update(['session_5' => 1]);
           }else{
               Inspection::where('id',$req->id)->update(['session_5' => 0]);
           }
           $get_inspec = Inspection::where('id',$req->id)->first();
           $super_btn_hide='';
           if(($get_inspec->session_1==1)&&($get_inspec->session_2==1)&&($get_inspec->session_3==1)&&($get_inspec->session_4==1)&&($get_inspec->session_5==1)){
               $super_btn_hide='show';
           }
        if($req->name == 'wiring_path_video'){
            return response()->json([
                'delete'=>true,
                'namedb'=>$req->name,
                'style'=>'video',
                'ss5'=>$get_inspec->session_5,
                'super_btn_hide'=>$super_btn_hide
            ]);
        }
        return response()->json([
            'delete'=>true,
            'namedb'=>$req->name,
            'style'=>'img',
            'ss5'=>$get_inspec->session_5,
            'super_btn_hide'=>$super_btn_hide
        ]);
    }
    public function save_location(Request $req){
        $get_inspec = Inspection::where('id',$req->id)->update([
            'lat'=>$req->lat,
            'long'=>$req->long
            ]);
            $get_inspec = Inspection::where('id',$req->id)->first();    
            if(isset($get_inspec->average_monthly_usage) && isset($get_inspec->average_sun_hours)&&isset($get_inspec->lat)&&isset($get_inspec->long)&&isset($get_inspec->system_size)){
                Inspection::where('id',$req->id)->update(['session_1' => 1]);
            }else{
                Inspection::where('id',$req->id)->update(['session_1' => 0]);
            }
        return response()->json();
    }
    public function get_list_inspec(){
        $list_inspec = Inspection::join('users','users.id','=','inspection.id_user')
        ->join('contact','contact.id_user','=','inspection.id_user')
        ->select('inspection.id','users.name','users.email','users.phone','contact.contact_meu','contact.type_meu','inspection.updated_at',
        'inspection.session_1','inspection.session_2','inspection.session_3','inspection.session_4','inspection.session_5')
        ->where('inspection.status',0)
        ->get();
        ;
        return response($list_inspec);
    }
    public function get_potentials_list_api(){
        $protentials = DB::table('potentials')
        ->join('users','users.id','=','potentials.user_id')
        ->join('inspection','inspection.id','=','potentials.site_inspection_id')
        ->select('potentials.id','users.name','users.email','inspection.system_size','potentials.site_inspection_id','potentials.status')
        ->get();
        return response($protentials);
    }
    public function get_detail_potentials_api(Request $req){
        $protentials = DB::table('potentials')
        ->join('users','users.id','=','potentials.user_id')
        ->join('inspection','inspection.id','=','potentials.site_inspection_id')
        ->select('potentials.id','potentials.user_id','users.name','users.email','inspection.system_size','potentials.site_inspection_id','potentials.status','potentials.reason','potentials.comments')
        ->where('potentials.id',$req->id)
        ->get();
        return response($protentials);
    }
    public function update_status_potentials_api(Request $req){
        $protentials = DB::table('potentials')->where('id',$req->id)->update([
            'status'=>$req->status,
            'reason'=>$req->reason,
            'comments'=>$req->comments
        ]);
        if($req->status==2){
            $curren_time = Carbon::now();
            $inspection = DB::table('inspection')->where('id',$req->site_inspection_id)->first();
            DB::insert('insert into projects (id_user,site_inspection_id,effective_system_size,created_at) values(?,?,?,?)',[$req->id_user,$req->site_inspection_id, $inspection->system_size,$curren_time]);
        }
        return response($protentials);
    }
    public function add_install_api(Request $req){
        $list_email = User::where('email', $req->installer_email)->first();
        if(isset($list_email)){
            return response()->json([
                'status'=>0,
                'message'=>'Email already exists',
            ], 200);
        }
        if(($req->password)!=($req->confirm_password)){
            return response()->json([
                'status'=>0,
                'message'=>'The password confirmation does not match.',
            ], 200);
        }
        $user_install = new User();
        $user_install->name =  $req->installer_name;
        $user_install->email =  $req->installer_email;
        $user_install->phone =  $req->installer_phone;
        $user_install->active =  1;
        $user_install->password =  md5($req->password);
        $user_install->user_type =  3;
        $user_install->save();

        $protentials = new DataInstaller(); 
        $protentials->id_user =  $user_install->id;
        $protentials->installer_name = $req->installer_name;
        $protentials->installer_contact_name = $req->installer_contact_name;
        $protentials->installer_phone = $req->installer_phone;
        $protentials->installer_email = $req->installer_email;
        $protentials->installer_pincode = $req->installer_pincode;
        $protentials->installer_state = $req->installer_state;
        $protentials->installer_city = $req->installer_city;
        $protentials->installer_adr_1 = $req->installer_adr_1;
        $protentials->installer_adr_2 = $req->installer_adr_2;
        $protentials->installer_number_of_project = $req->installer_number_of_project;
        $protentials->installer_total_installer = $req->installer_total_installer;
        $protentials->installer_maximum_installer = $req->installer_maximum_installer;
        $protentials->installer_number_of_employees = $req->installer_number_of_employees;
        $protentials->installer_maximum_distance = $req->installer_maximum_distance;
        $protentials->save();
        return response()->json([
            'status'=>1,
            'message'=>'Account created Successfully.',
        ], 200);
    }
    public function get_list_install_api(){
        $data_installer = DB::table('data_installer')
        ->join('states','states.id','=','data_installer.installer_state')
        ->join('cities','cities.id','=','data_installer.installer_city')
        ->select('data_installer.*','states.name','cities.city')
        ->get();
        return response()->json($data_installer);
    }
    public function delete_install_api(Request $req){
        $data_installer = DB::table('data_installer')->where('id',$req->id)->delete();

        return response()->json([
            'id'=>$req->id,
            'message'=>'delete ok',
        ]);
    }
    public function get_install_by_id_api(Request $req){
        $data_installer = DataInstaller::where('id',$req->id)->first();
        return response()->json($data_installer);
    }
    public function update_install_api(Request $req){
        if(($req->password)!=($req->confirm_password)){
            return response()->json([
                'status'=>0,
                'message'=>'The password confirmation does not match.',
            ], 200);
        }
        $protentials = DB::table('data_installer')->where('id',$req->id)->update([
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
        ]);
        $get_protentials = DB::table('data_installer')->where('id',$req->id)->first();
        DB::table('users')->where('id',$get_protentials->id_user)->update([
            'name' =>  $req->installer_name,
            'email' =>  $req->installer_email,
            'phone' =>  $req->installer_phone,
            'password' =>  md5($req->password)
        ]);
        if(!$protentials){
            return response()->json([
                'status'=>0,
                'message'=>'ERROR',
            ], 200);
        }
        return response()->json([
            'status'=>1,
            'message'=>'Update Successfully.',
        ], 200);
    }
    public function get_contact_api(Request $req){
        $list_contact = DB::table('contact')->get();
        return response()->json($list_contact);
    }
    public function get_list_sale_api(Request $req){
        $list_sale = DB::table('users')->where('user_type',2)->get();
        return response()->json($list_sale);
    }
    public function add_user_sale_api(Request $req){
        $list_email = User::where('email', $req->email)->first();
        if(isset($list_email)){
            return response()->json([
                'status'=>0,
                'message'=>'Email already exists',
            ], 200);
        }
        if($req->password!=$req->confirm_password){
            return response()->json([
                'status'=>0,
                'message'=>'Re-enter the incorrect password',
            ], 200);
        }
        $list_sale = new User();
        $list_sale->name = $req->name;
        $list_sale->phone = $req->phone;
        $list_sale->email = $req->email;
        $list_sale->password = md5($req->password);
        $list_sale->active = 1;
        $list_sale->user_type = 2;
        $list_sale->save();
        return response()->json([
            'status'=>1,
            'message'=>'user added successfully',
        ], 200);
    }
    public function delete_sale_api(Request $req){
        $data_installer = DB::table('users')->where('id',$req->id)->delete();
        return response()->json([
            'id'=>$req->id,
            'message'=>'delete ok',
        ]);
    }
    public function update_user_sale_api(Request $req){
        $get_user_sale = DB::table('users')->where('id',$req->id)->first();
        DB::table('users')->where('id',$req->id)->update([
            'name'=>$req->name,
            'phone'=>$req->phone,
        ]);
        if(!$get_user_sale){
            return response()->json([
                'status'=>0,
                'message'=>'ERROR',
            ], 200);
        }
        return response()->json([
            'status'=>1,
            'message'=>'Update Successfully.',
        ], 200);
    }
    public function get_data_contact(){
        $list_user =  DB::table('contact')->get();
        return response()->json($list_user);
    }
    public function update_user_contact_api(Request $req){
        $contact = DB::table('contact')->where('id',$req->id)->first();
        $inspec = DB::insert('insert into inspection (id_user,id_contact) values(?,?)',[$contact->id_user,$req->id]);
        $inspec_id= DB::table('inspection')->where('id_user',$contact->id_user)->where('id_contact',$req->id)->first();
        $list_user =  DB::table('contact')->where('id',$req->id)->update([
            'contact_adr_1'=>$req->contact_adr_1,
            'contact_adr_2'=>$req->contact_adr_2,
            'contact_visit'=>$req->contact_visit,
            'inspec_id'=>$inspec_id->id,
            'status'=>2
        ]);
        if(!$list_user){
            return response()->json([
                'status'=>0,
                'message'=>'ERROR',
            ], 200);
        }
        return response()->json([
            'status'=>1,
            'message'=>'Update Successfully.',
        ], 200);
    }
    public function get_bank_api(){
        $list_bank = DB::table('bank')->get();
        return response()->json($list_bank);
    }
    public function get_list_project_api(){
        $list_project = DB::table('projects')
        ->join('users','users.id','=','projects.id_user')
        ->select('projects.*','users.name')
        ->get();
        return response()->json($list_project);
    }
    public function create_project_tracker_api(Request $req){
        $project = DB::table('projects')->where('id',$req->id)->first();
        if($project){
            $project_super = DB::table('projects')
                ->join('discom_application','discom_application.id_project','=','projects.id')
                ->join('discom_commissioning_application','discom_commissioning_application.id_project','=','projects.id')
                ->join('finance_application','finance_application.id_project','=','projects.id')
                ->join('components_application','components_application.id_project','=','projects.id')
                ->join('compliance_application','compliance_application.id_project','=','projects.id')
                ->join('commission_application','commission_application.id_project','=','projects.id')
                ->join('installation_application','installation_application.id_project','=','projects.id')
                ->select('*')->where('projects.id',$req->id)->first();
                return response()->json($project_super);
        }else{
            DB::insert('insert into discom_application(id_project) values(?)',[$req->id]);
            DB::insert('insert into discom_commissioning_application(id_project) values(?)',[$req->id]);
            DB::insert('insert into finance_application(id_project) values(?)',[$req->id]);
            DB::insert('insert into components_application(id_project) values(?)',[$req->id]);
            DB::insert('insert into compliance_application(id_project) values(?)',[$req->id]);
            DB::insert('insert into commission_application(id_project) values(?)',[$req->id]);
            DB::insert('insert into installation_application(id_project) values(?)',[$req->id]);

        $project_super = DB::table('projects')
            ->join('discom_application','discom_application.id_project','=','projects.id')
            ->join('discom_commissioning_application','discom_commissioning_application.id_project','=','projects.id')
            ->join('finance_application','finance_application.id_project','=','projects.id')
            ->join('components_application','components_application.id_project','=','projects.id')
            ->join('compliance_application','compliance_application.id_project','=','projects.id')
            ->join('commission_application','commission_application.id_project','=','projects.id')
            ->join('installation_application','installation_application.id_project','=','projects.id')
            ->select('*')->where('projects.id',$req->id)->first();
        return response()->json($project_super);
        }
    }
    public function update_project_detail(Request $req){
        $project = DB::table('projects')->where('id',$req->id_project)->first();
        if(isset($req->section)){           
            DB::table($req->section)->where('id_project',$req->id_project)->update([
                $req->name => $req->val
            ]);
            $section = DB::table($req->section)->where('id_project',$req->id_project)->first();
            $condition = false;
            $ss_check = false;
            switch ($req->section) {
                case 'discom_application':
                    if($section->d_application_submitted==1 && $section->d_status=="Approved"){
                        $condition = true;
                        if($project->finance_application==1){
                            $ss_check=true;
                        }
                    }
                break;
                case 'finance_application':
                    if($section->f_application_submitted==1 && $section->f_status=="Approved"){
                        $condition = true;
                        if($project->discom_application==1){
                            $ss_check=true;
                        }
                    }
                break;
                case 'components_application':
                    if( $section->panels_ordered==1 && 
                        $section->inverter_ordered==1 && 
                        $section->frame_ordered==1 && 
                        $section->wire_ordered==1 && 
                        $section->accessories_ordered==1 && 
                        $section->monitoring_system_ordered==1 && 
                        $section->panels_received==1 && 
                        $section->inverter_received==1 && 
                        $section->frame_received==1 && 
                        $section->wire_received==1 && 
                        $section->accessories_received==1 && 
                        $section->monitoring_system_received==1
                    ){
                        $condition = true;
                        $ss_check=true;
                    }
                break;
                case 'installation_application':
                    if($section->installation_completed==1 && isset($section->i_date_scheduled)){
                        $condition = true;
                        $ss_check=true;
                    }
                break;
                case 'compliance_application':
                    if($section->compliance_completed==1 && isset($section->c_date_scheduled)){
                        $condition = true;
                        $ss_check=true;
                    }
                break;
                case 'discom_commissioning_application':
                    if($section->application_completed==1 && isset($section->d_date_scheduled))
                    {
                        $condition = true;
                        $ss_check=true;
                    }
                break;
                case 'commission_application':
                    if($section->commissioned==1){$condition = true;}
                break;
            }
            if($condition){
                DB::table('projects')->where('id',$req->id_project)->update([$req->section=>1]);
                $project = DB::table('projects')->where('id',$req->id_project)->first();
                return response()->json([
                    'table'=>$req->section,
                    'check'=>true,
                    'ss_check'=>$ss_check
                ]);
            }else{
                DB::table('projects')->where('id',$req->id_project)->update([$req->section=>0]);
                $project = DB::table('projects')->where('id',$req->id_project)->first();
                return response()->json([
                    'table'=>$req->section,
                    'check'=>false
                ]);
            }
        }

    }
}
