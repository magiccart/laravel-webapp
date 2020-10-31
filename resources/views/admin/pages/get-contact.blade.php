@extends('admin.layout.index')
@section('content')
<style>
    .step{
    display: none !important;
    }
    .step.active{
        display: block !important;
    }
    .hr.active{
        display: block !important;
    }
    .hr{
        display: none !important;
    }
    .right-retals{
        position: absolute !important;
        right: -160px !important;
        top: 15px !important;
    }
    .filter-w{
        position: relative !important;
    }
    
    input[type="checkbox"][readonly] {
        pointer-events: none !important;
    }
    </style>
        <div class="content-i">
            <div class="content-box">
                <div class="element-wrapper">
                    <h6 class="element-header">
                        Data Tables
                    </h6>
                    <?php
                    $message = Session::get('message');
                    $status = Session::get('status');   
                    if($status == 1 && $message) {
                    $mess = json_encode($message);
                    echo " <div class='alert alert-success text-center'>".$mess." </div>";
                    Session::put('message',null);
                    }elseif($status == 0 &&$message){
                    $mess = json_encode($message);
                    echo " <div class='alert alert-danger text-center'>".$mess." </div>";
                    Session::put('message',null);
                    }
                    ?>
                    <div class="element-box">
                        <div aria-labelledby="exampleModalLabel" id="exampleModal"
                             class="modal fade bd-example-modal-lg" role="dialog" tabindex="-1" aria-modal="true"
                             style="padding-right: 15px;">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            Confirm
                                        </h5>
                                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                            <span aria-hidden="true"> ×</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{asset('./update-user-contact')}}" method="POST">
                                            @csrf
                                            <input type="text" value="" name="idcontact" id="id-contact" style="display: none">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for=""> Create At</label>
                                                        <p id="createAt"></p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="">Name</label>
                                                        <p id="name"></p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="visit">Visit date and time: </label>
                                                        <input id="scheduleDate" type="datetime-local" value=""
                                                               name="scheduleDate">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <p>Phone Number: <span id="phone"></span> </p>
                                                    <span>Email:</span>
                                                    <p id="email"></p>
                                                    <p>Yearly Electricity Usage in kWh: <span id="contact_meu"></span>
                                                    </p>
                                                    <p>Pincode: <span id="contact_pincode"></span> </p>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="">Address 1</label>
                                                        <input class="form-control" id="address1" type="text"
                                                               placeholder="" value="" name="address1">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Address 2</label>
                                                        <input class="form-control" type="text" placeholder=""
                                                        id="address2" value="" name="address2">
                                                    </div>
                                                    <p>City: <span id="contact_city"></span></p>
                                                    <p>State: <span id="contact_state"></span></p>
                                                </div>
                                            </div>
                                            <div class="modal-footer-parent"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <div id="dataTable1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <div class="row">
                                    <div class="col-6" id="step11">
                                        <p style="text-align: center">To be Confirmed</p>
                                        <div class="hr active"
                                             style="width: 100%; height: 3px; background:#047bf8;"></div>
                                    </div>
                                    <div class="col-6" id="step22">
                                        <p style="text-align: center">Confirmed</p>
                                        <div class="hr" style="width: 100%; height: 3px;background:#047bf8;"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12  step" id="step1">
                                        <table id="dataTable1" width="100%"
                                               class="table table-striped table-lightfont dataTable" role="grid"
                                               aria-describedby="dataTable1_info" style="width: 100%;">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="dataTable1"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="id: activate to sort column descending"
                                                    style="width: 251px;">ID
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1"
                                                    colspan="1" aria-label="Name: activate to sort column ascending"
                                                    style="width: 378px;">Name
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1"
                                                    colspan="1" aria-label="Email: activate to sort column ascending"
                                                    style="width: 182px;">Email
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1"
                                                    colspan="1" aria-label="Phone: activate to sort column ascending"
                                                    style="width: 87px;">Phone
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="YEARLY ELECTRICITY USAGE IN KWh: activate to sort column ascending"
                                                    style="width: 170px;">YEARLY ELECTRICITY USAGE IN KWH
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1"
                                                    colspan="1" aria-label="VISIT: activate to sort column ascending"
                                                    style="width: 161px;">VISIT TIME AND DATE
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1"
                                                    colspan="1" aria-label="CONFIRM: activate to sort column ascending"
                                                    style="width: 161px;">CONFIRM
                                                </th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th rowspan="1" colspan="1">ID</th>
                                                <th rowspan="1" colspan="1">NAME</th>
                                                <th rowspan="1" colspan="1">EMAIL</th>
                                                <th rowspan="1" colspan="1">PHONE</th>
                                                <th rowspan="1" colspan="1">YEARLY ELECTRICITY USAGE IN KWH</th>
                                                <th rowspan="1" colspan="1">VISIT TIME AND DATE</th>
                                                <th rowspan="1" colspan="1">CONFIRM</th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            @if(isset($data['isconfirmed']) >0)
                                                @foreach($data['isconfirmed'] as $user)
                                                    <tr id="link{{$user->id}}" role="row" class="odd">
                                                        <td class="sorting_1">{{$user->id}}</td>
                                                        <td>{{$user->contact_name}}</td>
                                                        <td>{{$user->contact_email}}</td>
                                                        <td>{{$user->contact_phone}}</td>
                                                        @if($user->type_meu=='Month'&&$user->contact_meu>=12)
                                                            <?php
                                                            $year = round(($user->contact_meu)/12);
                                                            $month = ($user->contact_meu)%12;
                                                            ?>
                                                            <td>{{$year}} Year {{$month}} Month</td>
                                                        @else
                                                        <td>{{$user->contact_meu}} {{$user->type_meu}}</td>
                                                        @endif
                                                        <?php
                                                            $old_date = date($user->contact_visit);
                                                            $new_date = date('d/m/Y H:i A', strtotime($old_date));
                                                        ?>
                                                        <td>{{$new_date}}</td>
                                                       
                                                        <td>
                                                            <a href="javascript:void(0)" data-id="{{$user->id }}"
                                                               id="exampleModal1"
                                                               class="btn btn-primary confirm-btn confirm-data">Confirm</a>
                                                        </td>
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-sm-12 step active" id="step2">
                                        <table id="dataTable1" width="100%"
                                               class="table table-striped table-lightfont dataTable" role="grid"
                                               aria-describedby="dataTable1_info" style="width: 100%;">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="dataTable1"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="id: activate to sort column descending"
                                                    style="width: 251px;">ID
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1"
                                                    colspan="1" aria-label="Name: activate to sort column ascending"
                                                    style="width: 378px;">Name
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1"
                                                    colspan="1" aria-label="Email: activate to sort column ascending"
                                                    style="width: 182px;">Email
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1"
                                                    colspan="1" aria-label="Phone: activate to sort column ascending"
                                                    style="width: 87px;">Phone
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="YEARLY ELECTRICITY USAGE IN KWh: activate to sort column ascending"
                                                    style="width: 170px;">YEARLY ELECTRICITY USAGE IN KWH
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1"
                                                    colspan="1" aria-label="VISIT: activate to sort column ascending"
                                                    style="width: 161px;">VISIT TIME AND DATE
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1"
                                                    colspan="1" aria-label="CONFIRM: activate to sort column ascending"
                                                    style="width: 161px;">CONFIRM
                                                </th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th rowspan="1" colspan="1">ID</th>
                                                <th rowspan="1" colspan="1">NAME</th>
                                                <th rowspan="1" colspan="1">EMAIL</th>
                                                <th rowspan="1" colspan="1">PHONE</th>
                                                <th rowspan="1" colspan="1">YEARLY ELECTRICITY USAGE IN KWH</th>
                                                <th rowspan="1" colspan="1">VISIT TIME AND DATE</th>
                                                <th rowspan="1" colspan="1">CONFIRM</th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            @if(isset($data['notconfirmed']))
                                                @foreach($data['notconfirmed'] as $user)
                                                    <tr id="link{{$user->id}}" role="row" class="odd">
                                                        <td class="sorting_1">{{$user->id}}</td>
                                                        <td>{{$user->contact_name}}</td>
                                                        <td>{{$user->contact_email}}</td>
                                                        <td>{{$user->contact_phone}}</td>
                                                        @if($user->type_meu=='Month'&&$user->contact_meu>=12)
                                                        <?php
                                                        $year = round(($user->contact_meu)/12);
                                                        $month = ($user->contact_meu)%12;
                                                        ?>
                                                        <td>{{$year}} Year {{$month}} Month</td>
                                                        @else
                                                        <td>{{$user->contact_meu}} {{$user->type_meu}}</td>
                                                        @endif
                                                        <?php
                                                            $old_date = date($user->contact_visit);
                                                            $new_date = date('d/m/Y H:i A', strtotime($old_date));
                                                        ?>
                                                        <td>{{$new_date}}</td>
                                                        <td>
                                                            <a href="javascript:void(0)" data-id="{{$user->id }}"
                                                                id="exampleModal1"
                                                                class="btn btn-primary confirm-btn confirm-data">Confirm</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
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
        $(document).ready(function () {
        $('.confirm-data').on('click',function(){
            var id = $(this).data("id");
            var _url = "{{asset('api/getDetailUser')}}/" + id;
            $.ajax({
                url: _url,
                type: "get",
                success: function (data) {
                    console.log(data);
                    if (data) {
                        console.log(data);
                        $("#name").html(data[0].contact_name);
                        $("#address1").val(data[0].contact_adr_1);
                        $("#address2").val(data[0].contact_adr_2);
                        $("#email").html(data[0].contact_email);
                        $("#phone").html(data[0].contact_phone);
                        if(data[0].type_meu=='Month'&& data[0].contact_meu>=12){
                            year = Math.floor((data[0].contact_meu)/12);
                            month = (data[0].contact_meu)%12;
                            if(month==0){
                                $("#contact_meu").html(year+'Year');
                            
                            }else{
                                $("#contact_meu").html(year+' Year '+month+" Month");
                            }
                        }else{
                            $("#contact_meu").html(data[0].contact_meu+'Year')
                        }
                        $("#contact_pincode").html(data[0].contact_pincode);
                        $("#createAt").html(data[0].created_at);
                        $("#contact_city").html(data[0].contact_city);
                        $("#contact_state").html(data[0].contact_state);
                        $("#scheduleDate").val(data[0].contact_visit);
                        $("#id-contact").val(data[0].id);
                        $('#exampleModal').addClass("show");
                        $('#exampleModal').css("display", "block");
                        if (data[0].status == 1) {
                            $(".modal-footer-parent").append("<div class=\"modal-footer\">\n" +
                                "<button type='submit' data-id=\"\" id=\"confirm-status\" class=\"btn btn-primary confirm-btn\">Confirm</button>\n" +
                                "</div>");
                            $('.modal-footer button').attr("data-id", data[0].id);
                        } else {
                            $(".modal-footer").remove();
                        }
                    }
                }
            });
        }) 
            $('.close').click(
                function () {
                    $(".modal-footer").remove();
                    $('#exampleModal').removeClass("show");
                    $('#exampleModal').css("display", "none");
                }
            );
            $('#step11').click(function () {
                    $('#step1').removeClass("active");
                    $('#step2').addClass("active");
                    $('#step11 .hr').addClass("active");
                    $('#step22 .hr').removeClass("active");
                }
            );
            $('#step22').click(
                function () {
                    $('#step2').removeClass("active");
                    $('#step1').addClass("active");
                    $('#step11 .hr').removeClass("active");
                    $('#step22 .hr').addClass("active");
                }
            );
        });
    </script>
@endsection