<!DOCTYPE html>
<html>
@include('admin.layout.head')
<body class="auth-wrapper">
<div class="all-wrapper menu-side with-pattern">
    <div class="auth-box-w">
        <div class="logo-w">
            <a href="index.html"><img alt="" src="img/logo-big.png"></a>
        </div>
        <h4 class="auth-header">
            Check Email
        </h4>
        @if(count($errors) >0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                    {{$err}}<br>
                @endforeach
            </div>
        @endif
        @if(session('message'))
            <div class="alert alert-danger">
                {{session('message')}}
            </div>
        @endif
        <form action="{{route('forgotPassword')}}" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
                <label for="">Email</label>
                <input class="form-control" placeholder="Enter your email" type="email" name="email">
                <div class="pre-icon os-icon os-icon-user-male-circle"></div>
            </div>
            <div class="buttons-w">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

    </div>
</div>
</body>
</html>



