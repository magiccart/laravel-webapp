<!DOCTYPE html>
<html>
@include('admin.layout.head')
<body>
<style>
span.input-group-addon {
    -webkit-tap-highlight-color: rgba(0,0,0,0);
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    border-collapse: separate;
    box-sizing: border-box;
    display: table-cell;
    width: 13%;
    white-space: nowrap;
    vertical-align: middle;
    padding: 12px 12px;
    font-size: 14px;
    font-weight: 400;
    line-height: 1;
    color: #555;
    text-align: center;
    background-color: #eee;
    border: 1px solid #ccc;
    border-radius: 4px;
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
    border-left: 0;
    cursor: pointer;
}
span.glyphicon.glyphicon-chevron-down {
    -webkit-tap-highlight-color: rgba(0,0,0,0);
    list-style: none;
    border-spacing: 0;
    border-collapse: collapse;
    color: #337ab7;
    font-size: 14px;
    text-align: center;
    white-space: nowrap;
    user-select: none;
    box-sizing: border-box;
    position: relative;
    top: 1px;
    font-family: 'Glyphicons Halflings';
    font-style: normal;
    font-weight: 400;
    -webkit-font-smoothing: antialiased;
    display: inline-block;
    width: 54px;
    height: 54px;
    line-height: 54px;
    margin: 2px 1.5px;
    cursor: pointer;
    border-radius: 4px;
}
.glyphicon-chevron-down:before {
    font-family: "Font Awesome 5 Free";
    content: "\f107";
    display: inline-block;
    padding-right: 3px;
    vertical-align: middle;
    font-weight: 900;
}
.glyphicon-chevron-up:before {
    font-family: "Font Awesome 5 Free";
    content: "\f106";
    display: inline-block;
    padding-right: 3px;
    vertical-align: middle;
    font-weight: 900;
}
.error {
    color: var(--red);
}
</style>
<div class="all-wrapper menu-side with-pattern">
    <div class="auth-box-w wider">
        <div class="logo-w">
            <a href="index.html"><img alt="" src="img/logo-big.png"></a>
        </div>
        <h4 class="auth-header">
            Register
        </h4>
        <form id="valiform" action="./register" method="POST">
            @csrf
            <?php
                $message = Session::get('message');
                $error = Session::get('error');   
                if($error == true && $message) {
                $mess = json_encode($message);
                echo $mess;
                Session::put('message',null);
            } 
            ?>
            <div class="form-group">
                <label for="">Name</label><input class="form-control" placeholder="Enter Name" id="name" name="name" type="text">
            </div>
            <div class="form-group">
                <label for="">Address Line-1</label><input class="form-control" placeholder="Enter Address Line-1" id="contact_adr_1" name="contact_adr_1" type="text">
            </div>
            <div class="form-group">
                <label for="">Address Line-2</label><input class="form-control" placeholder="Enter Address Line-2" id="contact_adr_2" name="contact_adr_2" type="text">
            </div>
            <div class="form-group">
                <label for="">Pin Code</label><input class="form-control" placeholder="Enter Pin Code" id="contact_pincode" name="contact_pincode" type="text">
            </div>
            <div class="form-group">
                <label for="">State Select</label>
                <select class="form-control form-control-sm" id="contact_state" name="contact_state">
                    <option value="">Select State</option>
                    @foreach ($data as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">City Select</label>
                <select class="form-control form-control-sm" name="contact_city" id="contact_city">
                    <option value="">City</option>
                </select>
            </div>
            <div class="row">
                <div class="col-sm-7">
                    <div class="form-group">
                        <label for="">Electricity Usage in kWh</label>
                        <input class="form-control" placeholder="Enter Electricity Usage in kWh" id="contact_meu" name="contact_meu" type="text">
                    </div>
                </div>
                <div class="col-sm-4 mg-edit-check">
                    <div class="form-group">
                        <input class="form-check-input" name="type_meu" type="radio" value="Year" checked >Year <br>
                        <input class="form-check-input" name="type_meu" type="radio" value="Month">Month
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="">Phone</label><input class="form-control" placeholder="Enter Phone" type="text" name="phone">
            </div>
            <div class="form-group">
                <label for="">Email</label><input class="form-control" placeholder="Enter email" name="email" type="email" aria-invalid="true">
            </div>
            <div class="form-group">
                <label for="">Visit Date and Time</label>
                {{-- <input class="form-control" name="contact_visit" placeholder="Enter Visit Date and Time" type="datetime-local"> --}}
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' name="contact_visit" placeholder="Enter Visit Date and Time" class="form-control"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"><i class="icon-calendar"></i></span>
                    </span>
                </div>
            </div>
            <div class="buttons-w">
                <button  class="btn btn-primary btn-contact">Contact Now</button>
                <a href="./login"> <div type="submit" class="btn btn-primary">Login</div></a>
            </div>
        </form>
    </div>
</div>
</body>
@include('admin.layout.script')
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
$(document).ready(function(){
    $('#datetimepicker1').datetimepicker({
    defaultDate: new Date(),
    format: 'DD-MM-YYYY H:mm',
    sideBySide: true
    });

    $.validator.addMethod("regx", function(value, element, regexpr) {          
    return regexpr.test(value);
    }, "Please phone india.");

    $("#valiform").validate({
        
        onfocusout: function(element) {$(element).valid()},
        onkeyup: function(element) {$(element).valid()},
        onchange: function(element) {$(element).valid()},
		rules: {
			"name": {
				required: true,
			},
			"contact_adr_1": {
				required: true,
			},
			"contact_adr_2": {
				required: true,
			},
			"contact_pincode": {
				required: true,
			},
			"contact_state": {
				required: true,
			},
			"contact_city": {
				required: true,
			},
			"contact_meu": {
				required: true,
                digits:true
			},
			"phone": {
				required: true,
                regx:/^[6-9]\d{9}$/
			},
			"email": {
				required: true,
                email:true
			},
			"contact_visit": {
				required: true,
			},
		}
	});

$('select[name="contact_state"]').on('change', function(){  
    var call_city = $(this).val();  
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    $.ajax({
    url: './call-city',
    method: 'get',
    data: {
        'city':call_city,
    },
    success: function (data) {
        $('#contact_city').find('option').remove().end().append('<option value="">City</option>');    
        for (let i = 0; i < data.length; ++i){
            $('#contact_city').append($('<option>', {
            value: data[i].id,
            text: data[i].city
        }));
        }
    }
    })
});
})
</script>
</html>