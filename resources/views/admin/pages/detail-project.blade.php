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
                                        <p>Project ID - {{$project->id}}</p>
                                        <a href="">Survey-111</a>
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
                                                <input type="checkbox" class="custom-control-input data-change" data-name="discom_application" {{$project->d_application_submitted==1?'checked':''}} name="d_application_submitted" id="d_application_submitted">
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
                                                <select class="form-control data-change" name="d_status" id="" data-name="discom_application">
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
                                        <img src="{{asset('img/1200px-Check_green_icon.svg.png')}}" class="ss1-img" style="width: 14px" alt="">
                                        @endif
                                    </h6>
                                    <i class="icon-arrow-down"></i>
                                </div>
                                <div class="filter-body">
                                    <h4>Finance Application</h4>
                                    <div class="row">
                                        <div class="col-5">
                                            Application Submited
                                        </div>
                                        <div class="col-5">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input data-change" data-name="finance_application" {{$project->f_application_submitted==1?'checked':''}} name="f_application_submitted" id="f_application_submitted">
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
                                                <select class="form-control data-change" name="d_status" id="" data-name="finance_application">
                                                    <option value="Approved" {{$project->f_status=='Approved'?'selected':''}}>Approved</option>
                                                    <option value="Denied" {{$project->f_status=='Denied'?'selected':''}}>Denied</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="filter-w">
                                <div class="filter-toggle">
                                    <h6 class="filter-header">
                                        Listing Type
                                    </h6>
                                    <i class="icon-arrow-down"></i>
                                </div>
                                <div class="filter-body">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, quod!
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
                    if(data.discom_application==1){
                        $('.ss1').find('.ss1-title').append("<img class='ss1-img' style='width: 14px' src='{{asset('img/1200px-Check_green_icon.svg.png')}}'/>");
                        $('[data-name="discom_application"]').attr('disabled',true);
                    }else{
                        $('.ss1').find('.ss1-img').remove();
                    }
                }
            })
        });
    });
    </script>
@endsection