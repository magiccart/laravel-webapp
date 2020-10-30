@extends('admin.layout.index')
@section('content')
<style>
  .content-i {
    width: 100%;
}

</style>
<div class="content-i">
  <div class="content-box">
      <div class="element-wrapper">
      <h6 class="element-header"> Installer </h6>
      <div class="element-box">
     
  <form id="formValidate" method="POST" action="{{asset('./update-install')}}" novalidate="true">
    <input type="text" style="display: none" value="{{$data_install->id}}" name="id">    
    <?php
    $message = Session::get('message');
    $status = Session::get('status');   
    if($status == 0 && $message) {
    $mess = json_encode($message);
    echo " <div class='alert alert-danger'>".$mess." </div>";
    Session::put('message',null);
    } 
    ?>
    @csrf
    <div class="row">
      <div class="col-sm-6">

        <div class="form-group">
        <label for=""> Company Name </label><input class="form-control" data-error="Your company name is invalid" placeholder="Enter company name" required="required" type="text" value="{{$data_install->installer_name}}" name="installer_name">
          <div class="help-block form-text with-errors form-control-feedback"></div>
        </div>
        <div class="form-group">
          <label for=""> Contact Name </label><input class="form-control" data-error="Your contact name is invalid" placeholder="Enter contact name" required="required" type="text" value="{{$data_install->installer_contact_name}}" name="installer_contact_name">
          <div class="help-block form-text with-errors form-control-feedback"></div>
        </div>

        <div class="form-group">
          <label for=""> Phone Number </label><input class="form-control" data-error="Please enter a valid country India phone number." pattern="^(\+91[\-\s]?)?[0]?(91)?[789]\d{9}$" placeholder="Enter phone number"  value="{{$data_install->installer_phone}}" required="required" type="text" name="installer_phone">
          <div class="help-block form-text with-errors form-control-feedback"></div>
        </div>
        <div class="form-group">
          <label for=""> Email address</label><input class="form-control" data-error="Your email address is invalid" placeholder="Enter email" required="required" type="email" value="{{$data_install->installer_email}}" name="installer_email">
          <div class="help-block form-text with-errors form-control-feedback"></div>
        </div>


        <div class="form-group">
          <label for="">Pin Code</label>
          <input class="form-control" placeholder="Enter Pin Code" type="text" data-error="Please enter a valid country India Pin Code." pattern="^[1-9][0-9]{5}$" name="installer_pincode" value="{{$data_install->installer_pincode}}" id="pincode" required="required">
          <div class="help-block form-text with-errors form-control-feedback"></div>
        </div>
        <div class="form-group">
          <label for="">State Select</label>
        <select class="form-control form-control-sm" id="installer_state" name="installer_state" required="required" data-error="
        Please select an item from the list.">
          <option value="">Select State</option>
          @foreach ($state as $item)
              @if($item->id==$data_install->installer_state)
              <option value="{{$item->id}}" selected>{{$item->name}}</option>
              @endif
              <option value="{{$item->id}}">{{$item->name}}</option>
          @endforeach
        </select>
        <div class="help-block form-text with-errors form-control-feedback"></div>
        </div>
        <div class="form-group">
          <label for="">City Select</label>
          <select class="form-control form-control-sm" name="installer_city" id="installer_city" required="required" data-error="
          Please select an item from the list.">
            @foreach ($data_city as $item)
            @if($item->id==$data_install->installer_city)
            <option value="{{$item->id}}" selected>{{$item->city}}</option>
            @endif
            <option value="{{$item->id}}">{{$item->city}}</option>
            @endforeach
              {{-- <option value="">City</option> --}}
          </select>
          <div class="help-block form-text with-errors form-control-feedback"></div>
      </div>

      </div>

      <div class="col-sm-6">

        <div class="form-group">
          <label for=""> Address Line-1</label><input class="form-control" placeholder="Enter Address Line-1" type="text" value="{{$data_install->installer_adr_1}}" name="installer_adr_1" required="required">
        </div>
        <div class="form-group">
          <label for="">Address Line-2</label><input class="form-control" placeholder="Enter Address Line-2" type="text" value="{{$data_install->installer_adr_2}}" name="installer_adr_2" required="required">
        </div>

        <div class="form-group">
          <label for=""> Number of Projects installed </label><input class="form-control" required="required" placeholder="Enter Number of Projects installed" type="text" pattern="[0-9]+([.][0-9]+)?" data-error="The number input must start with a number and use a dot as a decimal character." value="{{$data_install->installer_number_of_project}}" name="installer_number_of_project">
          <div class="help-block form-text with-errors form-control-feedback"></div>
        </div>
        <div class="form-group">
          <label for=""> Total Installed Capacity in kW </label><input class="form-control" required="required" placeholder="Enter Total Installed Capacity in kW" type="text" pattern="[0-9]+([.][0-9]+)?" data-error="The number input must start with a number and use a dot as a decimal character." value="{{$data_install->installer_total_installer}}" name="installer_total_installer">
          <div class="help-block form-text with-errors form-control-feedback"></div>
        </div>
        <div class="form-group">
          <label for=""> Maximum Install Experience in kW </label><input class="form-control" required="required" placeholder="Enter Maximum Install Experience in kW" type="text" pattern="[0-9]+([.][0-9]+)?" data-error="The number input must start with a number and use a dot as a decimal character." value="{{$data_install->installer_maximum_installer}}" name="installer_maximum_installer">
          <div class="help-block form-text with-errors form-control-feedback"></div>
        </div>

        <div class="form-group">
          <label for=""> Number of employees </label><input class="form-control" required="required" placeholder="Enter Number of employees" type="text" pattern="[0-9]+([.][0-9]+)?" data-error="The number input must start with a number and use a dot as a decimal character." value="{{$data_install->installer_number_of_employees}}" name="installer_number_of_employees">
          <div class="help-block form-text with-errors form-control-feedback"></div>
        </div>

        <div class="form-group">
          <label for=""> Maximum distance served (in km) </label><input class="form-control" required="required" placeholder="Enter Maximum distance served (in km)" type="text" pattern="[0-9]+([.][0-9]+)?" data-error="The number input must start with a number and use a dot as a decimal character." value="{{$data_install->installer_maximum_distance}}" name="installer_maximum_distance">
          <div class="help-block form-text with-errors form-control-feedback"></div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for=""> Password</label><input class="form-control" data-minlength="6" placeholder="Password" required="required" type="password" name="password">
          <div class="help-block form-text text-muted form-control-feedback">
            Minimum of 6 characters
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="">Confirm Password</label><input class="form-control" data-match-error="Passwords don't match" placeholder="Confirm Password" required="required" type="password" name="confirm_password">
          <div class="help-block form-text with-errors form-control-feedback"></div>
        </div>
      </div>
    </div>
    <div class="form-buttons-w">
      <button class="btn btn-primary disabled" type="submit"> Submit</button>
    </div>
      </form>
      </div>
      </div>
  </div>
</div>
@section('script')
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
  $(document).ready(function(){
    $('select[name="installer_state"]').on('change', function(){  
    var call_city = $(this).val();  
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    $.ajax({
    url: '{{asset("./call-city")}}',
    method: 'get',
    data: {
        'city':call_city,
    },
    success: function (data) {
        $('#installer_city').find('option').remove().end().append('<option value="">City</option>');    
        for (let i = 0; i < data.length; ++i){
            $('#installer_city').append($('<option>', {
            value: data[i].id,
            text: data[i].city
        }));
        }
    }
    })
  });
  
  });
</script>
@endsection
@endsection