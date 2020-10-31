@extends('admin.layout.index')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
<style>
    .card-header,.card{
    border-radius: 0 !important;
}
.btn-super-hide{
    display: none;
}
div#system_size,div#tpc,div#remaining,div#emi {
    display: contents;
}
.err-location{
    color: rgb(236, 59, 59);
    font-size: 12px;
}
.filter-toggle{
    background: #F4F4F4;
    display: flex;
    padding: 10px 30px;
    padding-top: 1rem;
    justify-content: space-between;
    border: 1px solid;
    border-color: #e9e9e9;
}
.filter-body {
    margin: 1rem;
}
.far-number-kw{
    text-align: center;
}
.number-kw{
    font-size: 20px;
}
.db_block{
    display: block;
}
.icon-arrow-down{
    display: flex;
    align-items: center;
}
.fl-left{
    margin-left: 90%;
}
h6.filter-header {
    font-weight: 700;
}   
/* .filter-header::after {
    content:'\2713';
    display:none;
    color:white;
    background-color: green;
    border-radius: 50%;
    margin-left: .5rem;
    padding:0 6px 0 0;
} */
.modal-content.text-center {
    height: 34rem;
}
input#favcolor {
    height: 2.5rem;
    width: 6rem;
    margin: 1rem;
}
.controller-draw {
    width: 100%;
    /* margin-top: -16rem; */
    text-align: left;
}
.color-controller {
    display: flex;
    align-items: center;
}
.size-draw {
    margin-right: 1rem;
}
.size-control {
    margin-top: 1rem;
}
.udr {
    margin: 1rem 0;
    margin-right: 1rem;
}
.undo,.upload,.dowload,.clear,.redo{
    width: 100%;
}
.clear {
    margin-top: 1rem;
    width: 100%;
}
.upload-dow {
    display: flex;
}
.upload-dow-save{
    margin-top: 1rem;
    margin-right: 1rem;
}
.save {
    margin-top: 1rem;
    width: 100%;
}
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
input#upload-canvar {
    margin-right: 1rem !important;;
}
.img-show {
    width: 15rem;
    height: 15rem;
    object-fit: cover;
    margin-right: 1rem;
    margin-bottom: .5rem;
}
.video-show{
    margin-right: 1rem;
    margin-bottom: .5rem;
}
.video-show:focus{
    outline: none;
}
.show-list-img{
    display: flex;
    flex-wrap: wrap;
    margin-top: 1rem;
    margin-bottom: 1rem;
}
.show-list-video{
    display: flex;
    flex-wrap: wrap;
    margin-top: 1rem;
    margin-bottom: 1rem;
}
.btn-remove{
    background-color: rgb(241, 91, 91);
    border-color: rgb(241, 91, 91);
    margin-top: 1rem;
}
.bank-div{
    display: none
}
</style>

<div class="content-i" style="width: 100%">
<div class="content-box">
    <div class="row">
        <div class="col-sm-12">
            <div class="element-wrapper">
                <h6 class="element-header">
                    Site Inspection Detail
                </h6>
                <div class="element-box">
                    <form action="" id="form1" enctype="multipart/form-data">
                    <div class="filter-side">
                        @foreach ($data as $item)
                        
                            @if(($item->session_1==1)&&($item->session_2==1)&&($item->session_3==1)&&($item->session_4==1)&&($item->session_5==1))
                                <style>
                                    .btn-super-hide{
                                        display:block;
                                    }
                                </style>
                            @endif
                            @if($item->status==1)
                            <style>
                                .btn-super-hide{
                                    display:none;
                                }
                            </style>
                            @endif
                    <input type="id" value="{{$item->id}}" id="id-hide" style="display: none">
                        <div class="filter-w basic">
                            <div class="filter-toggle">
                                <h6 class="filter-header ss1">
                                    Basic
                                    @if($item->session_1==1)
                                    <img src="{{asset('img/1200px-Check_green_icon.svg.png')}}" class="ss1-img" style="width: 14px" alt="">
                                    @endif
                                </h6>
                                    <i class="icon-arrow-down"></i>
                            </div>
                            <div class="filter-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                        <label for="">Average Monthly Usage in kWh</label><input class="form-control input-data" value="{{$item->average_monthly_usage}}" name="average_monthly_usage" type="number">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Potential Install area (shadow free in SQFT)</label><input class="form-control input-data" value="{{$item->potential_install_area}}" name="potential_install_area" type="number">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Average Sun Hours</label><input class="form-control input-data" name="average_sun_hours" value="{{$item->average_sun_hours}}" type="number">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Bill Offset</label><input class="ion-range-slider input-data" value="{{$item->bill_offset}}" name="bill_offset" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div>Capture Location: <button class="btn btn-primary cature" data-target=".bd-example-modal-sm" data-toggle="modal">Cature</button></div>
                                <div aria-hidden="true" aria-labelledby="mySmallModalLabel" class="modal fade bd-example-modal-sm" role="dialog" tabindex="-1">
                                    <div class="modal-dialog modal-sm">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">
                                            Modal title
                                          </h5>
                                          <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                          <form>
                                            <div class="form-group">
                                              <label for=""> lat</label><input class="form-control" placeholder="lat" name="lat" id="lat" type="text">
                                              <div class="err-location err-lat"></div>
                                            </div>
                                            <div class="form-group">
                                              <label for="">long</label><input class="form-control" placeholder="long" name="long" id="long" type="text">
                                              <div class="err-location err-long"></div>
                                            </div>
                                          </form>
                                        </div>
                                        <div class="modal-footer">
                                          <button class="btn btn-primary save-location" type="button"> Save</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                <div class="far-number-kw">Estimated System Size <br><div class="number-kw" id="system_size">
                                    {{isset($item->system_size)?$item->system_size:'0'}}
                                </div><span>KW</span></div>
                            </div>
                        </div>
                        <div class="filter-w">
                            <div class="filter-toggle">
                                <h6 class="filter-header ss2">
                                    Design
                                    @if($item->session_2==1)
                                    <img src="{{asset('img/1200px-Check_green_icon.svg.png')}}" class="ss2-img" style="width: 14px" alt="">
                                    @endif
                                </h6>
                                <i class="icon-arrow-down"></i>
                            </div>
                            <div class="filter-body">
                                <div>Panel Array (Installation)<button class="btn btn-primary" data-backdrop="static" data-keyboard="false" data-target="#drawSlideModal" data-toggle="modal" >DRAW</button></div>
                            <img src="{{asset('img/'.$item->panel_image)}}" id="image_show" alt="">
                                <div aria-hidden="true" class="onboarding-modal modal fade animated" id="drawSlideModal" role="dialog" tabindex="-1">
                                    <div class="modal-dialog modal-lg modal-centered" role="document">
                                      <div class="modal-content text-center">
                                        <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span class="os-icon os-icon-close"></span></button>
                                        <div class="onboarding-side-by-side">
                                          <div class="onboarding-media">
                                              <h3>Design Panel</h3>
                                            <canvas id="sketchpad" style="border:2px solid #a7a7a7; margin: 0 2rem; border-radius: .5rem;"></canvas>
                                          </div>
                                          <div class="controller-draw">
                                            <div>Set Line Color</div>
                                            <div class="color-controller">
                                                <input type="text" class="form-control" id="value-color" value="">
                                                <input type="color" id="favcolor" name="favcolor" value="#ff0000"><br><br>
                                            </div>
                                            <div class="size-draw">
                                                <div>Set Line Size</div>
                                                <input type="text" id="size-draw-id" value="5" class="form-control size-control">
                                            </div>
                                            <div class="udr">
                                                <div class="ur" style="display: flex">
                                                    <input type="button" value="Undo" class="btn btn-primary undo">
                                                    <input type="button" value="Redo" class="btn btn-primary redo">
                                                </div>
                                                <input type="button" value="Clear" class="btn btn-primary clear">
                                            </div>
                                            <div style="text-align: center">Read and write sketchpad data</div>
                                            <div class="upload-dow-save">
                                            <div class="upload-dow">
                                                <input type="button" value="Upload" id="upload-canvar" class="btn btn-primary upload">
                                                <input type="file"  id="upload-canvar-hide" style="display:none">
                                                <input type="button" value="Dowload" id="dowload-canvar" class="btn btn-primary dowload">
                                            </div>
                                            <input type="button" value="Save" class="btn btn-primary save">
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Small Leg (in IN)</label><input class="form-control input-data" value="{{$item->small_leg}}" name="small_leg" type="number">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Large Leg (in IN)</label><input class="form-control input-data" value="{{$item->large_leg}}" name="large_leg" type="number">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Number of Rows</label><input class="form-control input-data" value="{{$item->number_of_rows}}" name="number_of_rows" type="number">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Approx Panel to Inverter Length (in meters)</label><input class="form-control input-data" value="{{$item->inverter_length}}" name="inverter_length" type="number">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="filter-w">
                            <div class="filter-toggle">
                                <h6 class="filter-header ss3">
                                    Payment Plan
                                    @if($item->session_3==1)
                                    <img src="{{asset('img/1200px-Check_green_icon.svg.png')}}" class="ss3-img" style="width: 14px" alt="">
                                    @endif
                                </h6>
                                <i class="icon-arrow-down"></i>
                            </div>
                            <div class="filter-body">
                                <div class="far-number-kw">Total Project Cost (includes 2 years of AMC) <br><span>Rs.</span><div class="number-kw" id="tpc"> 
                                    {{isset($item->tpc)?$item->tpc:'0'}}
                                </div></div>
                                <div class="">
                                    <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a aria-expanded="false" class="nav-link active" data-toggle="tab" href="#tab_cash">Cash</a>
                                    </li>
                                    <li class="nav-item">
                                        <a aria-expanded="false" class="nav-link" data-toggle="tab" href="#tab_emi">EMI</a>
                                    </li>
                                    </ul><br>
                                    <div class="tab-content">
                                        <div class="container tab-pane in active" id="tab_cash">
                                            <div>
                                            <label for="">Approx Panel to Inverter Length (in meters)</label><input class="form-control input-data" value="{{$item->deposit}}" name="deposit" type="number">
                                                <div class="">Remaining<br><span>Rs.</span><div id="remaining" class="number-kw">  {{isset($item->remaining)?$item->remaining:'0'}}</div></div>
                                            </div>
                                        </div>
                                        <div class="container tab-pane fade" id="tab_emi">
                                            <div>
                                                <label for="">Down Payment</label><input class="form-control input-data" value="{{$item->down_payment}}" name="down_payment" type="number">
                                                <div class="form-group">
                                                    <label for="">No. of Months</label><input class="ion-range-slider2 input-data" value="{{$item->of_months}}" name="of_months" type="text">
                                                </div>
                                                <label for="">Interest (est.)</label><input class="form-control input-data" value="{{$item->interest}}" name="interest" type="number">
                                                <label for="">EMI:</label><br>
                                                <span>Rs.</span><div class="number-kw" id="emi"> {{isset($item->emi)?$item->emi:'0'}}</div><br>
                                                <label for="">Existing Home Loan</label>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input input-data" name="existing_home" {{isset($item->existing_home)&&$item->existing_home=='yes'?'checked':''}} id="customSwitch1">
                                                    <label class="custom-control-label" for="customSwitch1"></label>
                                                </div>
                                                @if(isset($item->existing_home)&&$item->existing_home=='yes')
                                                <style type="text/css">
                                                    .bank-div{
                                                        display: block;
                                                    }
                                                </style>
                                                @endif
                                                <div class="form-group bank-div">
                                                    <label for="blank">Banking Partner</label>
                                                    <select class="form-control" name="bank_id" id="">
                                                        @foreach ($data_bank as $item_bank)
                                                            <option value="{{$item_bank->id}}" {{($item_bank->id)==($item->bank_id)?'selected':''}}>{{$item_bank->bank_name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="form-group">
                                                        <label for="bank_brand">Bank Branch</label>
                                                        <input class="form-control input input-data" type="text" name="bank_branch" value="{{$item->bank_branch}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="filter-w">
                            <div class="filter-toggle">
                                <h6 class="filter-header ss4">
                                    Documents
                                    @if($item->session_4==1)
                                    <img src="{{asset('img/1200px-Check_green_icon.svg.png')}}" class='ss4-img' style="width: 14px" alt="">
                                    @endif
                                </h6>
                                    <i class="icon-arrow-down"></i>
                            </div>
                            <div class="filter-body">
                                <div>
                                    <label class="db_block">Document - 1</label>
                                    @if(!isset($item->document_1))
                                    <input type="button" value="Upload" id="upload-doc-1" name="document_1_show" class="btn btn-primary">
                                    @else
                                    <input type="button" value="Re-Upload" id="upload-doc-1" name="document_1_show" class="btn btn-primary">
                                    @endif
                                    <input type="file" value="Upload" id="upload-doc-hide-1" name="document_1" class="btn btn-primary" style="display: none">
                                    {{-- {{isset($item->document_1)?$item->emi:'0'}} --}}
                                    @if(!isset($item->document_1))
                                    <div class="document_btn" id="document_1_btn"></div>
                                    <div class="document_1_link" id="document_1_link" style="margin-top: .5rem"></div>
                                    @else
                                    <div class="document_btn" id="document_1_btn">
                                        <input type="button" id="delete_document_1_btn" value="Remove" name="btn-remove-doc" class="btn btn-danger" style="margin-top:.5rem">
                                    </div>
                                    <div class="document_1_link" id="document_1_link" style="margin-top: .5rem">
                                        <?php
                                            $file_extension = strrpos($item->document_1,'.');
                                            $file_extension = substr($item->document_1,$file_extension+1);
                                            $img_array_ok =  ['png','jpeg','jpg'];
                                        ?>
                                        @if(in_array($file_extension,$img_array_ok))
                                        <a href="{{asset('upload/'.$item->document_1)}}" class="document_1_href" target='_blank'><img class='img-show' src="{{asset('upload/'.$item->document_1)}}" alt=''></a>
                                        @else
                                        <a href="{{asset('upload/'.$item->document_1)}}" class="document_1_href" target="_blank">View Document</a>
                                        @endif
                                    </div>
                                    @endif
                                </div>
                                <div>
                                    <label class="db_block">Document - 2</label>
                                    @if(!isset($item->document_2))
                                    <input type="button" value="Upload" id="upload-doc-2" name="document_2_show" class="btn btn-primary">
                                    @else
                                    <input type="button" value="Re-Upload" id="upload-doc-2" name="document_2_show" class="btn btn-primary">
                                    @endif
                                    <input type="file" value="Upload" id="upload-doc-hide-2" name="document_2" class="btn btn-primary" style="display: none">
                                    @if(!isset($item->document_2))
                                    <div class="document_btn" id="document_2_btn"></div>
                                    <div class="document_2_link" id="document_2_link" style="margin-top: .5rem"></div>
                                    @else
                                    <div class="document_btn" id="document_2_btn">
                                        <input type="button" id="delete_document_2_btn" value="Remove" name="btn-remove-doc" class="btn btn-danger" style="margin-top:.5rem">
                                    </div>
                                    <div class="document_2_link" id="document_2_link" style="margin-top: .5rem">
                                        <?php
                                        $file_extension = strrpos($item->document_2,'.');
                                        $file_extension = substr($item->document_2,$file_extension+1);
                                        $img_array_ok =  ['png','jpeg','jpg'];
                                    ?>
                                    @if(in_array($file_extension,$img_array_ok))
                                    <a href="{{asset('upload/'.$item->document_2)}}" class="document_2_href" target='_blank'><img class='img-show' src="{{asset('upload/'.$item->document_2)}}" alt=''></a>
                                    @else
                                    <a href="{{asset('upload/'.$item->document_2)}}" class="document_2_href" target="_blank">View Document</a>
                                    @endif
                                    </div>
                                    @endif
                                </div>
                                <div>
                                    <label class="db_block">Document - 3</label>
                                    @if(!isset($item->document_3))
                                    <input type="button" value="Upload" id="upload-doc-3" name="document_3_show"class="btn btn-primary">
                                    @else
                                    <input type="button" value="Re-Upload" id="upload-doc-3" name="document_3_show"class="btn btn-primary">
                                    @endif
                                    <input type="file" value="Upload" id="upload-doc-hide-3"  name="document_3" class="btn btn-primary" style="display: none">
                                    @if(!isset($item->document_3))
                                    <div class="document_btn" id="document_3_btn">
                                    </div>
                                    <div class="document_3_link" id="document_3_link" style="margin-top: .5rem">
                                    </div>
                                    @else
                                    <div class="document_btn" id="document_3_btn">
                                        <input type="button" id="delete_document_3_btn" value="Remove" name="btn-remove-doc" class="btn btn-danger" style="margin-top:.5rem">
                                    </div>
                                    <div class="document_3_link" id="document_3_link" style="margin-top: .5rem">
                                        <?php
                                        $file_extension = strrpos($item->document_3,'.');
                                        $file_extension = substr($item->document_3,$file_extension+1);
                                        $img_array_ok =  ['png','jpeg','jpg'];
                                    ?>
                                    @if(in_array($file_extension,$img_array_ok))
                                    <a href="{{asset('upload/'.$item->document_3)}}" class="document_3_href" target='_blank'><img class='img-show' src="{{asset('upload/'.$item->document_3)}}" alt=''></a>
                                    @else
                                    <a href="{{asset('upload/'.$item->document_3)}}" class="document_3_href" target="_blank">View Document</a>
                                    @endif
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="filter-w">
                            <div class="filter-toggle">
                                <h6 class="filter-header ss5">
                                    Site Picture
                                    @if($item->session_5==1)
                                    <img src="{{asset('img/1200px-Check_green_icon.svg.png')}}" class="ss5-img" style="width: 14px" alt="">
                                    @endif
                                </h6>
                                <i class="icon-arrow-down"></i>
                            </div>
                            <div class="filter-body">
                                <div class="panel_area_class">
                                    <label class="db_block">Panel Area</label>
                                    @if(!isset($item->panel_area))
                                        <input type="button" value="Upload" id="panel_area_show" class="btn btn-primary">
                                        <input type="file" value="Upload" id="panel_area" name="file[]" multiple class="btn btn-primary" style="display: none">
                                        <div class="delete_area"></div>
                                        <div class="show-list-img"></div>
                                    @else
                                        <input type="button" value="Re-Upload" id="panel_area_show" class="btn btn-primary">
                                        <input type="file" value="Upload" id="panel_area" name="file[]" multiple class="btn btn-primary" style="display: none">
                                        <div class="delete_area"><input type='button' value='Delete' id='panel_area_remove' class='btn btn-primary btn-remove'></div>
                                        @php
                                            $listname = $item->panel_area;
                                            $str = str_replace(array('"','[',']'),array('','',''),$listname);
                                            $arr_listname_panel=explode(',',$str);
                                        @endphp
                                        <div class="show-list-img">
                                            @foreach ($arr_listname_panel as $item_img)
                                                <a target="_blank" href="{{asset('file_area/'.$item_img)}}"><img class='img-show' src='{{asset("file_area/".$item_img)}}' alt=''></a>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                                <div class="inverter_area_class">
                                    <label  class="db_block">Inverter Area</label>
                                    @if(!isset($item->inverter_area))
                                        <input type="button" value="Upload" id="inverter_area_show" class="btn btn-primary">
                                        <input type="file" value="Upload" id="inverter_area" name="file[]" multiple class="btn btn-primary" style="display: none">
                                        <div class="delete_area"></div>
                                        <div class="show-list-img"></div>
                                    @else
                                        <input type="button" value="Re-Upload" id="inverter_area_show" class="btn btn-primary">
                                        <input type="file" value="Upload" id="inverter_area" name="file[]" multiple class="btn btn-primary" style="display: none">
                                        <div class="delete_area"><input type='button' value='Delete' id='inverter_area_remove' class='btn btn-primary btn-remove'></div>
                                        @php
                                            $listname = $item->inverter_area;
                                            $str = str_replace(array('"','[',']'),array('','',''),$listname);
                                            $arr_listname_inver=explode(',',$str);
                                        @endphp
                                        <div class="show-list-img">
                                            @foreach ($arr_listname_inver as $item_img)
                                                <img class='img-show' src='{{asset('file_area/'.$item_img)}}' alt=''>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                                <div class="wiring_path_video_class">
                                    <label class="db_block">Wiring Path Video</label>
                                    @if(!isset($item->wiring_path_video))
                                        <input type="button" value="Upload" id="wiring_path_video_show" class="btn btn-primary">
                                        <input type="file" value="Upload" id="wiring_path_video" name="file[]" multiple class="btn btn-primary" style="display: none">
                                        <div class="delete_area"></div>
                                        <div class="show-list-video"></div>
                                    @else
                                        <input type="button" value="Re-Upload" id="wiring_path_video_show" class="btn btn-primary">
                                        <input type="file" value="Upload" id="wiring_path_video" name="file[]" multiple class="btn btn-primary" style="display: none">
                                        <div class="delete_area"><input type='button' value='Delete' id='wiring_path_video_remove' class='btn btn-primary btn-remove'></div>
                                        @php
                                        $listname = $item->wiring_path_video;
                                        $str = str_replace(array('"','[',']'),array('','',''),$listname);
                                        $arr_listname_video=explode(',',$str);
                                        @endphp
                                        <div class="show-list-video">
                                            @foreach ($arr_listname_video as $item_video)
                                            
                                            <video width='320' height='240' class='video-show' controls>
                                                <source src="{{asset('file_area/'.$item_video)}}" type='video/mp4'>
                                            </video>
                                            <a href="{{asset('file_area/'.$item_video)}}" class="video-show" target="_blank">open_new_tab</a>
                                            @endforeach 
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                    <hr>
                    <form action="{{asset('create-potential')}}" method="POST">
                        @csrf
                    <input type="text" value="{{$item->id}}" name="site_inspection_id" style="display: none">
                    <input type="text" value="{{$item->id_user}}" name="user_id" style="display: none">
                        <button type="submit" class="btn btn-primary fl-left btn-super-hide"> Submit</button>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@section('script') 
<script>
    $(document).ready(function(){
        //geet location current
        function showPosition(position) {
            $('#lat').val(position.coords.latitude);
            $('#long').val(position.coords.longitude);
        }
        $(".cature").on('click',function(){
            if(location.protocol == 'https:')
            {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition);
                } else { 
                    alert("Geolocation is not supported by this browser.");
                }
            }
        })
        $('.save-location').on('click',function(){
            $('.err-location').empty();
            if($('#lat').val()==""){
                $('.err-lat').text('lat is not to blank')
                return false
            }
            if($('#long').val()==""){
                $('.err-long').text('long is not to blank')
                return false
            }
            $('#loading').show();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{asset("api/save-location")}}',
                method: 'post',
                data: {
                    'id':$('#id-hide').val(),
                    'lat':$('#lat').val(),
                    'long': $('#long').val()
                },
                success: function (data) {
                    $('#loading').hide();
                        alert('save ok')
                        $('.bd-example-modal-sm').modal('toggle');
                    }
            });
        });
        //
        $("#form1").submit(function(e){
            e.preventDefault();
        });
        //ajax canvar
        $('.save').on('click',function(){
            var canvas = document.getElementById('sketchpad');
            var dataURL = canvas.toDataURL();
            id = $('#id-hide').val()
            $('#loading').show();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{asset("/save-img-canvar")}}',
                method: 'post',
                data: {
                    'id':id,
                    imgBase64: dataURL
                },
                success: function (data) {
                    $('#loading').hide();
                        $('#image_show').attr('src','{{asset("img/'+data.panel_image+'")}}');
                        $('#drawSlideModal').modal('toggle');
                    }
            })
        })
        //dowload cnavar
        function random(length) {
        var result           = '';
        var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var charactersLength = characters.length;
        for ( var i = 0; i < length; i++ ) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }
        return result;
        }
        $('#dowload-canvar').on('click',function(){
            var canvas = document.getElementById("sketchpad");
            image = canvas.toDataURL("image/png", 1.0).replace("image/png", "image/octet-stream");
            var link = document.createElement('a');
            link.download = "my-image-"+random(4)+".png";
            link.href = image;
            link.click();
        });
        //upload canvar
        $('#upload-canvar').on('click',function(){
            $('#upload-canvar-hide').trigger('click');
            return false;
        });
        const EL = (sel) => document.querySelector(sel);
        const ctx = EL("#sketchpad").getContext("2d");
        function readImage() {
        if (!this.files || !this.files[0]) return;
        const FR = new FileReader();
        FR.addEventListener("load", (evt) => {
            const img = new Image();

            img.addEventListener("load", () => {
            ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
            ctx.drawImage(img, 0, 0,ctx.canvas.width,ctx.canvas.width);
            });
            img.src = evt.target.result;
        });
        FR.readAsDataURL(this.files[0]);
        }
        EL("#upload-canvar-hide").addEventListener("change", readImage);
        //conver img->base64
        function getBase64Image(img) {
            var canvas = document.getElementById("sketchpad");
            // canvas.width = img.width;
            // canvas.height = img.height;
            canvas.width = 500;
            canvas.height = 400;
            var ctx = canvas.getContext("2d");
            ctx.drawImage(img, 0, 0,canvas.width,canvas.height);
            var dataURL = canvas.toDataURL("image/png");
            // return dataURL;
            return dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
            }
        //upload base 64->canvas
        var base64 = getBase64Image(document.getElementById("image_show"));
        canvas_sketchpad = document.getElementById('sketchpad');
        // canvas_sketchpad.toDataURL()=base64;
        // pain
        var sketchpad = new Sketchpad({
        element: '#sketchpad',
        width: 500,
        height: 400,
        });
        $('.undo').on('click',function(){
            sketchpad.undo();
        })
        $('.redo').on('click',function(){
            sketchpad.redo();
        })
        $('.clear').on('click',function(){
            sketchpad.clear();
        })
        // 
        sketchpad.color=$('#favcolor').val();
        sketchpad.penSize=$('#size-draw-id').val();
        $('#value-color').val($('#favcolor').val());
        $('.filter-body').hide();
        $('.filter-w').addClass('collapsed');
        $('.filter-w').parent().find('.basic>.filter-body').slideDown();
        $('.basic').find('.icon-arrow-down').addClass('icon-arrow-up');
        $('.filter-toggle').on('click', function(){
            $(this).parent().siblings().find('.filter-body').slideUp();
            $(this).find('.icon-arrow-down').addClass('icon-arrow-up');
            $(this).parent().siblings().find('.icon-arrow-down').removeClass('icon-arrow-up')
            $('.filter-w').addClass('collapsed');
        });
        $('input.input-data,select').on('focusin', function(){
            $(this).data('val', $(this).val());
            }).on('change',function(){
            if($(this).attr("type")=="checkbox"){
                if(this.checked) {
                    val = 'yes'
                    $('.bank-div').css('display','block');
                }else{
                    val = 'no'
                    $('.bank-div').css('display','none');
                }
            }else{
            val = $(this).val();
                if(val==""){
                    alert('cannot be left blank');
                    $(this).val($(this).data('val'));
                    return false;
                }
                if(val==0){
                    alert('Ở ĐÂY CHUNG TÔI KHÔNG LÀM THẾ');
                    $(this).val($(this).data('val'));
                    return false;
                }
            }
            name = $(this).attr("name");
            id = $('#id-hide').val()
            $('#loading').show();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{asset("/update-inspection-detail")}}',
                method: 'post',
                data: {
                    'id':id,
                    'name':name,
                    'val':val
                },
                success: function (data) {
                    $('#loading').hide();
                    if(data[0].super_btn_hide!==""){
                        $('.btn-super-hide').show()
                    }else{
                        $('.btn-super-hide').hide()
                    }
                        if(data[0].ss1==1){
                            if($('.ss1-img')[0]){

                            }else{
                            $('.ss1').append("<img src='{{asset('img/1200px-Check_green_icon.svg.png')}}' class='ss1-img' style='width: 14px' alt=''>")
                            }
                        }else{
                            if($('.ss1-img')[0]){
                            $('.ss1-img').remove()
                            }
                        }
                        if(data[0].ss2==1){
                            if($('.ss2-img')[0]){
                                
                            }else{
                            $('.ss2').append("<img src='{{asset('img/1200px-Check_green_icon.svg.png')}}' class='ss2-img' style='width: 14px' alt=''>")
                            }
                        }else{
                            if($('.ss1-img')[0]){
                            $('.ss2-img').remove()
                            }
                        }
                        if(data[0].ss3==1){
                            if($('.ss3-img')[0]){
                                
                            }else{
                            $('.ss3').append("<img src='{{asset('img/1200px-Check_green_icon.svg.png')}}' class='ss3-img' style='width: 14px' alt=''>")
                            }
                        }else{
                            if($('.ss3-img')[0]){
                            $('.ss3-img').remove()
                            }
                        }
                        if(data[0].system_size){
                            system_size = Math.round((data[0].system_size) * 100) / 100
                            $('#system_size').text(system_size);
                        }
                        if(data[0].remaining){
                            remaining = Math.round((data[0].remaining) * 100) / 100
                            $('#remaining').text(remaining); 
                        }
                        if(data[0].emi){
                            emi = Math.round((data[0].emi) * 100) / 100
                            $('#emi').text(emi); 
                        }
                        if(data[0].tpc){
                            tpc = Math.round((data[0].tpc) * 100) / 100 
                            $('#tpc').text(tpc); 
                        }
                    }
                })
        });
        $('#favcolor').on('change',function(){
            $('#value-color').val($(this).val());
            sketchpad.color=$(this).val();
        });
        $('#size-draw-id').on('change',function(){
            sketchpad.penSize = $(this).val();
        });
        //up load file
        $('#upload-doc-1').on('click',function(){
            $('#upload-doc-hide-1').trigger('click');
            return false;
        });
        $('#upload-doc-2').on('click',function(){
            $('#upload-doc-hide-2').trigger('click');
            return false;
        });
        $('#upload-doc-3').on('click',function(){
            $('#upload-doc-hide-3').trigger('click');
            return false;
        });
        $('#upload-doc-hide-1,#upload-doc-hide-2,#upload-doc-hide-3').on('change',function(){
            var fd = new FormData();
            fd.append('val', $(this)[0].files[0] );
            fd.append('name', $(this).attr('name'));
            fd.append('id',$('#id-hide').val());
            $('#loading').show();
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
            url: '{{asset("api/update-inspection-detail-document-api")}}',
            method: 'post',
            data: fd,
            processData: false,
            contentType: false,
            success: function (data) {
                $('#loading').hide();
                if(data.super_btn_hide!==""){
                    $('.btn-super-hide').show()
                }
                else{
                    $('.btn-super-hide').hide()
                }
                if(data.ss4==1){
                        if($('.ss4-img')[0]){

                        }else{
                        $('.ss4').append("<img src='{{asset('img/1200px-Check_green_icon.svg.png')}}' class='ss4-img' style='width: 14px' alt=''>")
                        }
                    }
                if(data.error == true){
                    alert(data.message);
                }else{
                    name_re_val = 'input[name='+data.name+'_show]';
                    classnamelink =  '.'+data.name+'_link';
                    classnamehref =  '.'+data.name+'_href';
                    classnamebtn =  '#'+data.name+'_btn';
                    deletebtn =  '#delete_'+data.name+'_btn';
                    if($(classnamehref)[0]){
                        $(classnamehref).remove();
                        $(deletebtn).remove();
                        $(classnamebtn).append( "<input type='button' id='delete_"+data.name+"_btn' value='Remove' name='btn-remove-doc' class='btn btn-danger' style='margin-top:.5rem'/>" );
                        console.log(data.type);
                        if(data.type=="document"){
                            $(classnamelink).append( "<a href='"+data.url_file+"' class='"+data.name+"_href' target='_blank'>View Document</a>" );
                        }else{
                            $(classnamelink).append( "<a href='"+data.url_file+"' class='"+data.name+"_href' target='_blank'><img class='img-show' src='"+data.url_file+"' alt=''></a>");
                        }
                    }else{
                    $(classnamelink).find('.img-show').remove();
                    $(deletebtn).remove();

                    $(classnamebtn).append( "<input type='button' id='delete_"+data.name+"_btn' value='Remove' name='btn-remove-doc' class='btn btn-danger' style='margin-top:.5rem'/>" );
                    if(data.type=="document"){
                            $(classnamelink).append( "<a href='"+data.url_file+"' class='"+data.name+"_href' target='_blank'>View Document</a>" );
                        }else{
                            $(classnamelink).append( "<a href='"+data.url_file+"' class='"+data.name+"_href' target='_blank'><img class='img-show' src='"+data.url_file+"' alt=''></a>");
                        }
                    $(name_re_val).val('Re-Upload');
                    }
                }
            }
            })
        });
        $('.document_btn').on('click',function(){
            if (!confirm("Do you want to delete")){
                return false;
            }
            idBtnremove = $(this).children('input[name=btn-remove-doc]').attr('id');
            stringdoc = idBtnremove.substring(7, 17);
            id = $('#id-hide').val()
            $('#loading').show();
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
            url: '{{asset("api/remove-document-api")}}',
            method: 'post',
            data: {
                'id':id,
                'namedoc':stringdoc,
            },
            success: function (data) {
                $('#loading').hide();
                if(data.super_btn_hide!==""){
                        $('.btn-super-hide').show()
                    }else{
                        $('.btn-super-hide').hide()
                    }
                if(data.ss4==0){
                        if($('.ss4-img')[0]){
                            $('.ss4-img').remove()
                        }
                    }
                if(data.deletedoc == true){
                    name_re_val = 'input[name='+data.name+'_show]';
                    classnamehref =  '.'+data.name+'_href';
                    deletebtn =  '#delete_'+data.name+'_btn';
                    if($(classnamehref)[0]){
                        $(classnamehref).remove();
                        $(deletebtn).remove();
                        $(name_re_val).val('Upload');
                    }
                }
            }
            })
        }); 

    //Area
        //
        $('#panel_area_show').on('click',function(){
            $('#panel_area').trigger('click');
            return false
        });
        $('#inverter_area_show').on('click',function(){
            $('#inverter_area').trigger('click');
            return false
        });
        $('#wiring_path_video_show').on('click',function(){
            $('#wiring_path_video').trigger('click');
            return false
        });
        //ajax file
        $('#panel_area,#inverter_area,#wiring_path_video').on('change',function(){
            var ins = $(this)[0].files.length;
            var fd = new FormData();
            for (var x = 0; x < ins; x++) {
                fd.append("file[]", $(this)[0].files[x]);
            }
            fd.append('namedb', $(this).attr('id'));
            fd.append('id',$('#id-hide').val());
            $('#loading').show();
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:'{{asset("api/save-area")}}',
                type:'POST',
                data: fd,
                contentType: false,
                processData: false,
                success: function (data) {
                    $('#loading').hide();
                    if(data.super_btn_hide!==""){
                        $('.btn-super-hide').show()
                    }else{
                        $('.btn-super-hide').hide()
                    }
                    if(data.ss5==1){
                        if($('.ss5-img')[0]){

                        }else{
                        $('.ss5').append("<img src='{{asset('img/1200px-Check_green_icon.svg.png')}}' class='ss5-img' style='width: 14px' alt=''>")
                        }
                    }
                    if(data.save==true && data.style=='img'){
                        var namediv = '.'+data.namedb+'_class';
                        var btnup = '#'+data.namedb+'_show';
                            $(namediv).find('.show-list-img .img-show').remove();
                            $(namediv).find('.delete_area .btn-remove').remove();
                            $(btnup).val('Re-Upload');
                            for(i=0;i<data.url_file.length;i++){
                                $(namediv).find('.show-list-img').append("<a href='"+data.url_file[i]+"' target='_blank'><img class='img-show' src='"+data.url_file[i]+"' alt=''></a>");
                            }
                            $(namediv).find('.delete_area').append("<input type='button' value='Delete' id='"+data.namedb+"_remove' class='btn btn-primary btn-remove'>");
                    }
                    if(data.save==true && data.style=='video'){
                        var namediv = '.'+data.namedb+'_class';
                        var btnup = '#'+data.namedb+'_show';
                        $(namediv).find('.show-list-video .video-show').remove();
                        $(namediv).find('.delete_area .btn-remove').remove();
                        $(btnup).val('Re-Upload');
                        for(i=0;i<data.url_file.length;i++){
                                $(namediv).find('.show-list-video').append("<video width='320' height='240' class='video-show' controls><source src='"+data.url_file[i]+"' type='video/mp4'></video><a href='"+data.url_file[i]+"' class='video-show' target='_blank'>open_new_tab</a>");
                        }
                        $(namediv).find('.delete_area').append("<input type='button' value='Delete' id='"+data.namedb+"_remove' class='btn btn-primary btn-remove'>");
                    }
                    if(data.error==true){
                        alert(data.message);
                    }
                }
            });
        });
        $(".delete_area").on("click",function(){
            if (!confirm("Do you want to delete")){
                return false;
            }
            btnremove = $(this).children('.btn-remove').attr('id');
            namearea = btnremove.substring(0,btnremove.length-7);
            id = $('#id-hide').val()
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#loading').show();
            $.ajax({
                url:'{{asset("api/delete-area")}}',
                type:'POST',
                data: {
                    'id':id,
                    'name':namearea,
                },
                success: function (data) {
                    $('#loading').hide();
                    if(data.super_btn_hide!==""){
                        $('.btn-super-hide').show()
                    }else{
                        $('.btn-super-hide').hide()
                    }
                    if(data.ss5==0){
                        if($('.ss5-img')[0]){
                            $('.ss5-img').remove()
                        }
                    }
                    if(data.delete==true && data.style == 'img'){
                        var namediv = '.'+data.namedb+'_class';
                        var btnup = '#'+data.namedb+'_show';
                        if($(namediv).find('.show-list-img .img-show')[0]){
                            $(namediv).find('.show-list-img .img-show').remove();
                            $(namediv).find('.delete_area .btn-remove').remove();
                            $(btnup).val('Upload');
                        }
                    }
                    if(data.delete==true && data.style == 'video'){
                        var namediv = '.'+data.namedb+'_class';
                        var btnup = '#'+data.namedb+'_show';
                        if($(namediv).find('.show-list-video .video-show')[0]){
                            $(namediv).find('.show-list-video .video-show').remove();
                            $(namediv).find('.delete_area .btn-remove').remove();
                            $(btnup).val('Upload');
                        }
                    }
                }
            });
        });
    });
</script>
@endsection
@endsection