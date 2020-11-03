@extends('admin.layout.index')
@section('content')
<style>
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
        margin: 1rem 10%;
    }
    h6.filter-header {
    font-weight: 700;
    }
    .row{
        margin-bottom: 1rem;
    }
    h4{
        color: #0a7cf8
    }
</style>
<div class="content-i" style="width: 100%">
    <div class="content-box">
        <div class="row">
            <div class="col-sm-12">
                <div class="element-wrapper">
                    <h6 class="element-header">
                        Project Detail
                    </h6>
                    <div class="element-box">
                        <div class="filter-side">
                            <div class="filters-header">
                                <div class="row">
                                    <div class="col-8">
                                        <p>Project ID - {{$project->id_project}}</p>
                                        <a href="{{asset('get-inspection-detail/'.$project->site_inspection_id)}}">Survey-{{$project->site_inspection_id}}</a>
                                    </div>
                                    <div class="col-4">
                                        <p>Effective System Size</p>
                                        <h3>{{$project->effective_system_size}} KW</h3>
                                    </div>
                                </div>
                            </div>
                            <input type="text" style="display: none" class="id-project-hide" value="{{$project->id_project}}">
                            <div class="filter-w app-ss1">
                                <div class="filter-toggle ss1">
                                    <h6 class="filter-header ss1-title">
                                        DISCOM Application
                                        @if ($project->d_status=="Approved"&&$project->d_application_submitted==1)
                                        <img src="{{asset('img/1200px-Check_green_icon.svg.png')}}" class="ss1-img" style="width: 14px" alt="">
                                        @endif
                                    </h6>
                                    <i class="icon-arrow-down"></i>
                                </div>
                                <div class="filter-body">
                                    <h4>Dowload Forms</h4>
                                    <div class="row">
                                        <div class="col-5">
                                            Application Submited
                                        </div>
                                        <div class="col-5">
                                            <div class="custom-control custom-switch">
                                                <input  {{$project->discom_application==1?'disabled':''}} type="checkbox" class="custom-control-input data-change" data-name="discom_application" {{$project->d_application_submitted==1?'checked':''}} name="d_application_submitted" id="d_application_submitted">
                                                <label class="custom-control-label" for="d_application_submitted"></label>
                                            </div>
                                        </div>
                                    </div>
                                    @if($project->d_application_submitted!=1)
                                        <style>
                                            .status_ss1{display: none}
                                        </style>
                                    @endif
                                    <div class="status_ss1">
                                        <div class="row">
                                            <div class="col-5">
                                                Status
                                            </div>
                                            <div class="col-5">
                                                <select {{$project->discom_application==1?'disabled':''}} class="form-control data-change" name="d_status" id="" data-name="discom_application">
                                                    <option value="Approved" {{$project->d_status=='Approved'?'selected':''}}>Approved</option>
                                                    <option value="Denied" {{$project->d_status=='Denied'?'selected':''}}>Denied</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="filter-w app-ss2">
                                <div class="filter-toggle ss2">
                                    <h6 class="filter-header ss2-title">
                                        Finance Application
                                        @if ($project->f_status=="Approved" && $project->f_application_submitted==1)
                                        <img src="{{asset('img/1200px-Check_green_icon.svg.png')}}" class="ss2-img" style="width: 14px" alt="">
                                        @endif
                                    </h6>
                                    <i class="icon-arrow-down"></i>
                                </div>
                                <div class="filter-body">
                                    <h4>Download Finance Package</h4>
                                    <div class="row">
                                        <div class="col-5">
                                            Application Submited
                                        </div>
                                        <div class="col-5">
                                            <div class="custom-control custom-switch">
                                                <input {{$project->finance_application==1?'disabled':''}} type="checkbox" class="custom-control-input data-change" data-name="finance_application" {{$project->f_application_submitted==1?'checked':''}} name="f_application_submitted" id="f_application_submitted">
                                                <label class="custom-control-label" for="f_application_submitted"></label>
                                            </div>
                                        </div>
                                    </div>
                                    @if($project->f_application_submitted!=1)
                                        <style>
                                            .status_ss2{display: none}
                                        </style>
                                    @endif
                                    <div class="status_ss1">
                                        <div class="row">
                                            <div class="col-5">
                                                Status
                                            </div>
                                            <div class="col-5">
                                                <select {{$project->finance_application==1?'disabled':''}} class="form-control data-change" name="f_status" id="" data-name="finance_application">
                                                    <option value="Approved" {{$project->f_status=='Approved'?'selected':''}}>Approved</option>
                                                    <option value="Denied" {{$project->f_status=='Denied'?'selected':''}}>Denied</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="filter-w app-ss3">
                                <div class="filter-toggle ss3">
                                    <h6 class="filter-header ss3-title">
                                        Components
                                        @if ($project->components_application==1)
                                        <img src="{{asset('img/1200px-Check_green_icon.svg.png')}}" class="ss3-img" style="width: 14px" alt="">
                                        @endif
                                    </h6>
                                    <i class="icon-arrow-down"></i>
                                </div>
                                <div class="filter-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <br>
                                            <div>Panels</div>
                                            <div>Inverter</div>
                                            <div>Frame</div>
                                            <div>Wire</div>
                                            <div>Accessories</div>
                                            <div>Monitoring System</div>
                                        </div>
                                        <div class="col-4">
                                            <div>Ordered</div>
                                            <div class="custom-control custom-switch">
                                                <input {{$project->discom_application==1&&$project->finance_application==1?'':'disabled'}} 
                                                {{$project->components_application==1?'disabled':''}}
                                                type="checkbox" 
                                                class="custom-control-input data-change"  data-name="components_application" {{$project->panels_ordered==1?'checked':''}} name="panels_ordered" id="panels_ordered">
                                                <label class="custom-control-label" for="panels_ordered"></label>
                                            </div>
                                            <div class="custom-control custom-switch">
                                                <input {{$project->discom_application==1&&$project->finance_application==1?'':'disabled'}} type="checkbox" 
                                                {{$project->components_application==1?'disabled':''}}
                                                class="custom-control-input data-change" data-name="components_application" {{$project->inverter_ordered==1?'checked':''}} name="inverter_ordered" id="inverter_ordered">
                                                <label class="custom-control-label" for="inverter_ordered"></label>
                                            </div>
                                            <div class="custom-control custom-switch">
                                                <input {{$project->discom_application==1&&$project->finance_application==1?'':'disabled'}} type="checkbox" 
                                                {{$project->components_application==1?'disabled':''}}
                                                class="custom-control-input data-change" data-name="components_application" {{$project->frame_ordered==1?'checked':''}} name="frame_ordered" id="frame_ordered">
                                                <label class="custom-control-label" for="frame_ordered"></label>
                                            </div>
                                            <div class="custom-control custom-switch">
                                                <input {{$project->discom_application==1&&$project->finance_application==1?'':'disabled'}} type="checkbox" 
                                                {{$project->components_application==1?'disabled':''}}
                                                class="custom-control-input data-change" data-name="components_application" {{$project->wire_ordered==1?'checked':''}} name="wire_ordered" id="wire_ordered">
                                                <label class="custom-control-label" for="wire_ordered"></label>
                                            </div>
                                            <div class="custom-control custom-switch">
                                                <input {{$project->discom_application==1&&$project->finance_application==1?'':'disabled'}} type="checkbox" 
                                                {{$project->components_application==1?'disabled':''}}
                                                class="custom-control-input data-change" data-name="components_application" {{$project->accessories_ordered==1?'checked':''}} name="accessories_ordered" id="accessories_ordered">
                                                <label class="custom-control-label" for="accessories_ordered"></label>
                                            </div>
                                            <div class="custom-control custom-switch">
                                                <input {{$project->discom_application==1&&$project->finance_application==1?'':'disabled'}} type="checkbox" 
                                                {{$project->components_application==1?'disabled':''}}
                                                class="custom-control-input data-change" data-name="components_application" {{$project->monitoring_system_ordered==1?'checked':''}} name="monitoring_system_ordered" id="monitoring_system_ordered">
                                                <label class="custom-control-label" for="monitoring_system_ordered"></label>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div>Received</div>
                                            <div class="custom-control custom-switch">
                                                <input {{$project->discom_application==1&&$project->finance_application==1?'':'disabled'}} type="checkbox" 
                                                {{$project->components_application==1?'disabled':''}}
                                                class="custom-control-input data-change" data-name="components_application" {{$project->panels_received==1?'checked':''}} name="panels_received" id="panels_received">
                                                <label class="custom-control-label" for="panels_received"></label>
                                            </div>
                                            <div class="custom-control custom-switch">
                                                <input {{$project->discom_application==1&&$project->finance_application==1?'':'disabled'}} type="checkbox" 
                                                {{$project->components_application==1?'disabled':''}}
                                                class="custom-control-input data-change" data-name="components_application" {{$project->inverter_received==1?'checked':''}} name="inverter_received" id="inverter_received">
                                                <label class="custom-control-label" for="inverter_received"></label>
                                            </div>
                                            <div class="custom-control custom-switch">
                                                <input {{$project->discom_application==1&&$project->finance_application==1?'':'disabled'}} type="checkbox" 
                                                {{$project->components_application==1?'disabled':''}}
                                                class="custom-control-input data-change" data-name="components_application" {{$project->frame_received==1?'checked':''}} name="frame_received" id="frame_received">
                                                <label class="custom-control-label" for="frame_received"></label>
                                            </div>
                                            <div class="custom-control custom-switch">
                                                <input {{$project->discom_application==1&&$project->finance_application==1?'':'disabled'}} type="checkbox" 
                                                {{$project->components_application==1?'disabled':''}}
                                                class="custom-control-input data-change" data-name="components_application" {{$project->wire_received==1?'checked':''}} name="wire_received" id="wire_received">
                                                <label class="custom-control-label" for="wire_received"></label>
                                            </div>
                                            <div class="custom-control custom-switch">
                                                <input {{$project->discom_application==1&&$project->finance_application==1?'':'disabled'}} type="checkbox" 
                                                {{$project->components_application==1?'disabled':''}}
                                                class="custom-control-input data-change" data-name="components_application" {{$project->accessories_received==1?'checked':''}} name="accessories_received" id="accessories_received">
                                                <label class="custom-control-label" for="accessories_received"></label>
                                            </div>
                                            <div class="custom-control custom-switch">
                                                <input {{$project->discom_application==1&&$project->finance_application==1?'':'disabled'}} type="checkbox" 
                                                {{$project->components_application==1?'disabled':''}}
                                                class="custom-control-input data-change" data-name="components_application" {{$project->monitoring_system_received==1?'checked':''}} name="monitoring_system_received" id="monitoring_system_received">
                                                <label class="custom-control-label" for="monitoring_system_received"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="filter-w app-ss4">
                                <div class="filter-toggle ss4">
                                    <h6 class="filter-header ss4-title">
                                        Installation
                                        @if (isset($project->i_date_scheduled) && $project->installation_completed==1)
                                        <img src="{{asset('img/1200px-Check_green_icon.svg.png')}}" class="ss4-img" style="width: 14px" alt="">
                                        @endif
                                    </h6>
                                    <i class="icon-arrow-down"></i>
                                </div>
                                <div class="filter-body">
                                    <div class="status_ss4">
                                         {{-- <div class="row">
                                            <div class="col-5">
                                                Assign Installer
                                            </div>
                                            <div class="col-5">
                                                <select class="form-control" name="assign_installer" id="assign_installer" data-name="installation_application">
                                                    <option value="Approved">232132</option>
                                                    <option value="Denied">1232132</option>
                                                </select>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <div class="row">
                                        <div class="col-5">
                                            Date Scheduled
                                        </div>
                                        <div class="col-5">
                                        <input {{$project->components_application==1?'':'disabled'}} 
                                        {{$project->installation_application==1?'disabled':''}} 
                                        type="datetime-local" class="form-control data-change" value="{{$project->i_date_scheduled}}" data-name="installation_application" id="i_date_scheduled" name="i_date_scheduled">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-5">
                                            Installation Completed
                                        </div>
                                        <div class="col-5">
                                            <div class="custom-control custom-switch">
                                                <input {{$project->components_application==1?'':'disabled'}} 
                                                {{$project->installation_application==1?'disabled':''}} type="checkbox" class="custom-control-input data-change" data-name="installation_application" {{$project->installation_completed==1?'checked':''}} name="installation_completed" id="installation_completed">
                                                <label class="custom-control-label" for="installation_completed"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="filter-w app-ss5">
                                <div class="filter-toggle ss5">
                                    <h6 class="filter-header ss5-title">
                                        Compliance
                                        @if (isset($project->c_date_scheduled) && $project->compliance_completed==1)
                                        <img src="{{asset('img/1200px-Check_green_icon.svg.png')}}" class="ss5-img" style="width: 14px" alt="">
                                        @endif
                                    </h6>
                                    <i class="icon-arrow-down"></i>
                                </div>
                                <div class="filter-body">
                                    <div class="row">
                                        <div class="col-5">
                                            Installation Completed
                                        </div>
                                        <div class="col-5">
                                            <div class="custom-control custom-switch">
                                                <input {{$project->installation_application==1?'':'disabled'}} 
                                                {{$project->compliance_application==1?'disabled':''}} type="checkbox" class="custom-control-input data-change" data-name="compliance_application" {{$project->compliance_completed==1?'checked':''}} name="compliance_completed" id="compliance_completed">
                                                <label class="custom-control-label" for="compliance_completed"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-5">
                                            Date Scheduled
                                        </div>
                                        <div class="col-5">
                                        <input  {{$project->installation_application==1?'':'disabled'}} 
                                        {{$project->compliance_application==1?'disabled':''}}  type="datetime-local" class="form-control data-change" value="{{$project->c_date_scheduled}}" data-name="compliance_application" id="c_date_scheduled" name="c_date_scheduled">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="filter-w app-ss6">
                                <div class="filter-toggle ss6">
                                    <h6 class="filter-header ss6-title">
                                        DISCOM Commingssioning Application
                                        @if (isset($project->d_date_scheduled) && $project->application_completed==1)
                                        <img src="{{asset('img/1200px-Check_green_icon.svg.png')}}" class="ss6-img" style="width: 14px" alt="">
                                        @endif
                                    </h6>
                                    <i class="icon-arrow-down"></i>
                                </div>
                                <div class="filter-body">
                                    <div class="row">
                                        <div class="col-5">
                                            Date Scheduled
                                        </div>
                                        <div class="col-5">
                                        <input {{$project->compliance_application==1?'':'disabled'}} 
                                        {{$project->discom_commissioning_application==1?'disabled':''}}  type="datetime-local" class="form-control data-change" value="{{$project->d_date_scheduled}}" data-name="discom_commissioning_application" id="d_date_scheduled" name="d_date_scheduled">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-5">
                                            Installation Completed
                                        </div>
                                        <div class="col-5">
                                            <div class="custom-control custom-switch">
                                                <input {{$project->compliance_application==1?'':'disabled'}} 
                                                {{$project->discom_commissioning_application==1?'disabled':''}}  type="checkbox" class="custom-control-input data-change" data-name="discom_commissioning_application" {{$project->application_completed==1?'checked':''}} name="application_completed" id="application_completed">
                                                <label class="custom-control-label" for="application_completed"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="filter-w app-ss7">
                                <div class="filter-toggle ss7">
                                    <h6 class="filter-header ss7-title">
                                        Commission
                                        @if ($project->commissioned==1)
                                        <img src="{{asset('img/1200px-Check_green_icon.svg.png')}}" class="ss7-img" style="width: 14px" alt="">
                                        @endif
                                    </h6>
                                    <i class="icon-arrow-down"></i>
                                </div>
                                <div class="filter-body">
                                    <div class="row">
                                        <div class="col-5">
                                            Commissioned
                                        </div>
                                        <div class="col-5">
                                            <div class="custom-control custom-switch">
                                                <input {{$project->discom_commissioning_application==1?'':'disabled'}} 
                                                {{$project->commission_application==1?'disabled':''}} type="checkbox" class="custom-control-input data-change" data-name="commission_application" {{$project->commissioned==1?'checked':''}} name="commissioned" id="commissioned">
                                                <label class="custom-control-label" for="commissioned"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>            
    </div>
</div>
@endsection
@section('script')
    <script>
    $(document).ready(function(){
        $('.filter-body').hide();
        $('.filter-w').addClass('collapsed');
        $('.filter-w').parent().find('.app-ss1>.filter-body').slideDown();
        $('.app-ss1').find('.icon-arrow-down').addClass('icon-arrow-up');
        $('.filter-toggle').on('click', function(){
            $(this).parent().siblings().find('.filter-body').slideUp();
            $(this).find('.icon-arrow-down').addClass('icon-arrow-up');
            $(this).parent().siblings().find('.icon-arrow-down').removeClass('icon-arrow-up')
            $('.filter-w').addClass('collapsed');
        });

        $('.data-change').on('change',function(){
            if($(this).attr("type")=="checkbox"){
                if(this.checked) {
                    val = 1;
                    $('.status_ss1').css('display','block');
                }else{
                    val = 0;
                    $('.status_ss1').css('display','none');
                }
            }else{
                val = $(this).val()
            }
            name = $(this).attr("name");
            id = $('.id-project-hide').val();
            section = $(this).data('name');
            $('#loading').show();
            $.ajax({
                url: '{{asset("api/update-project-detail")}}',
                method: 'post',
                data: {
                    'id_project':id,
                    'name':name,
                    'val':val,
                    'section':section
                },
                success: function (data) {
                    $('#loading').hide();
                    switch (data.table) {
                        case 'discom_application':
                            if(data.check==true){
                                $('.ss1').find('.ss1-title').append("<img class='ss1-img' style='width: 14px' src='{{asset('img/1200px-Check_green_icon.svg.png')}}'/>");
                                $('[data-name="discom_application"]').attr('disabled',true);
                            }else{
                                $('.ss1').find('.ss1-img').remove();
                            }
                            if(data.ss_check==true){
                                $('[data-name="components_application"]').attr('disabled',false);
                            }
                        break;
                        case 'finance_application':
                            if(data.check==true){
                                $('.ss2').find('.ss2-title').append("<img class='ss2-img' style='width: 14px' src='{{asset('img/1200px-Check_green_icon.svg.png')}}'/>");
                                $('[data-name="finance_application"]').attr('disabled',true);
                            }else{
                                $('.ss2').find('.ss2-img').remove();
                            }
                            if(data.ss_check==true){
                                $('[data-name="components_application"]').attr('disabled',false);
                            }
                        break;
                        case 'components_application':
                        if(data.check==true){
                                $('.ss3').find('.ss3-title').append("<img class='ss3-img' style='width: 14px' src='{{asset('img/1200px-Check_green_icon.svg.png')}}'/>");
                                $('[data-name="components_application"]').attr('disabled',true);
                            }else{
                                $('.ss3').find('.ss3-img').remove();
                            }
                            if(data.ss_check==true){
                                $('[data-name="installation_application"]').attr('disabled',false);
                            }
                        break;
                        case 'installation_application':
                        if(data.check==true){
                                $('.ss4').find('.ss4-title').append("<img class='ss4-img' style='width: 14px' src='{{asset('img/1200px-Check_green_icon.svg.png')}}'/>");
                                $('[data-name="installation_application"]').attr('disabled',true);
                            }else{
                                $('.ss4').find('.ss4-img').remove();
                            }
                        if(data.ss_check==true){
                            $('[data-name="compliance_application"]').attr('disabled',false);
                        }
                        break;
                        case 'compliance_application':
                        if(data.check==true){
                                $('.ss5').find('.ss5-title').append("<img class='ss5-img' style='width: 14px' src='{{asset('img/1200px-Check_green_icon.svg.png')}}'/>");
                                $('[data-name="compliance_application"]').attr('disabled',true);
                            }else{
                                $('.ss5').find('.ss5-img').remove();
                            }
                        if(data.ss_check==true){
                            $('[data-name="discom_commissioning_application"]').attr('disabled',false);
                        }
                        break;
                        case 'discom_commissioning_application':
                        if(data.check==true){
                                $('.ss6').find('.ss6-title').append("<img class='ss6-img' style='width: 14px' src='{{asset('img/1200px-Check_green_icon.svg.png')}}'/>");
                                $('[data-name="discom_commissioning_application"]').attr('disabled',true);
                            }else{
                                $('.ss6').find('.ss6-img').remove();
                            }
                        if(data.ss_check==true){
                        $('[data-name="commission_application"]').attr('disabled',false);
                        }
                        break;
                        case 'commission_application':
                        if(data.check==true){
                                $('.ss7').find('.ss7-title').append("<img class='ss7-img' style='width: 14px' src='{{asset('img/1200px-Check_green_icon.svg.png')}}'/>");
                                $('[data-name="commission_application"]').attr('disabled',true);
                            }else{
                                $('.ss7').find('.ss7-img').remove();
                            }
                        break;
                        default:
                            console.log('ccc');
                        break;
                    }
                }
            })
        });
    });
    </script>
@endsection