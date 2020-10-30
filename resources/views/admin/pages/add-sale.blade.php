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
        
        <form id="formValidate" method="POST" action="./add-user-sale" novalidate="true">
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
          <div class="form-group">
            <label for=""> Name </label><input class="form-control" data-error="Your name is invalid" placeholder="Enter your name" required="required" type="text" name="name">
            <div class="help-block form-text with-errors form-control-feedback"></div>
          </div>

          <div class="form-group">
            <label for=""> Phone </label><input class="form-control" data-error="Please enter a valid country India phone number." pattern="^(\+91[\-\s]?)?[0]?(91)?[789]\d{9}$" placeholder="Enter your phone" required="required" type="text" name="phone">
            <div class="help-block form-text with-errors form-control-feedback"></div>
          </div>
          <div class="form-group">
            <label for=""> Email address </label><input class="form-control" data-error="Your email address is invalid" placeholder="Enter your email" required="required" type="email" name="email">
            <div class="help-block form-text with-errors form-control-feedback"></div>
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
@endsection