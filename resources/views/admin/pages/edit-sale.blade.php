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
      <h6 class="element-header"> Sale </h6>
      <div class="element-box">
        
        <form id="formValidate" method="POST" action="{{asset('./update-user-sale')}}" novalidate="true">
          @csrf
        <input type="text" style="display: none" value="{{$id_user}}" name="id">
          <div class="form-group">
            <label for=""> Name </label><input class="form-control" data-error="Your name is invalid" value="{{$user_info->name}}" placeholder="Enter your name" required="required" type="text" name="name">
            <div class="help-block form-text with-errors form-control-feedback"></div>
          </div>

          <div class="form-group">
            <label for=""> Phone </label><input class="form-control" data-error="Your phone is invalid" value="{{$user_info->phone}}" placeholder="Enter your phone" required="required" type="text" name="phone">
            <div class="help-block form-text with-errors form-control-feedback"></div>
          </div>
          <div class="form-group">
            <label for=""> Email address </label><input class="form-control" data-error="Your email address is invalid" value="{{$user_info->email}}" placeholder="Enter your email" required="required" type="email" name="email" readonly="">
            <div class="help-block form-text with-errors form-control-feedback"></div>
          </div>
          <div class="form-buttons-w">
            <button class="btn btn-primary" type="submit"> Submit</button>
          </div>
        </form>
      </div>
      </div>
  </div>
</div>
@endsection