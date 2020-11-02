<!DOCTYPE html>
<html>
@include('admin.layout.head')
<body  class="auth-wrapper">
  <div class="all-wrapper menu-side with-pattern">
    <div class="auth-box-w">
      <form action="{{route('confirm_ok')}}" id="form-validate" method="post">
        @csrf
        <h4 class="auth-header">
          Re-Password
        </h4>
        <div class="mess-err err"></div>
      <input type="text" name="id" value="{{$id}}" style="display: none">
        <div class="form-group">
            <label for="">Password</label>
            <input class="form-control" placeholder="Enter your email" type="password" name="password" required>
            <div class="pre-icon os-icon os-icon-user-male-circle"></div>
        </div>
        <div class="form-group">
            <label for="">Re-Password</label>
            <input class="form-control" placeholder="Enter your password" type="password" name="re-password" require>
            <div class="pre-icon os-icon os-icon-fingerprint"></div>
        </div>
        <div class="buttons-w">
            <button type="submit" class="btn btn-primary">Log in</button>
        </div>
      </form>
    </div>
  </div>
<script>
  document.querySelector("#form-validate").addEventListener("submit", function(e){
    pass = document.querySelector('input[name=password]').value;
    re_pass = document.querySelector('input[name=re-password]').value;
    if(pass!=re_pass){
      document.querySelector(".mess-err").innerHTML='Enter not true password';
      e.preventDefault(); 
    }
});

</script>
</body>
</html>