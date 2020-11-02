<!DOCTYPE html>
<html>
@include('admin.layout.head')
<style>
.forgot-pass{
    margin-left: 1rem !important;
}
.forgot-pass:hover {
    text-decoration: none;
}
</style>
<body class="auth-wrapper">
<div class="all-wrapper menu-side with-pattern">
    <div class="auth-box-w">
        <div class="logo-w">
            <a href="{{route('login')}}"><img alt="" src="{{asset('img/logo-big.png')}}"></a>
        </div>
        <h4 class="auth-header">
            Login Form
        </h4>
        @if(count($errors) >0)
            <div class="mess-err">
                @foreach($errors->all() as $err)
                    {{$err}}<br>
                @endforeach
            </div>
        @endif
        @if(session('message'))
            <div class="mess-err">
                {{session('message')}}
            </div>
            <?php
            Session::put('message',null);
            ?>
        @endif
        @if(session('success'))
            <div class="mess-success">
                {{session('success')}}
            </div>
            <?php
            Session::put('success',null);
            ?>
        @endif
        <form action="{{route('postLogin')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Email</label>
                <input class="form-control" placeholder="Enter your email" type="email" name="email" required>
                <div class="pre-icon os-icon os-icon-user-male-circle"></div>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input class="form-control" placeholder="Enter your password" type="password" name="password" required>
                <div class="pre-icon os-icon os-icon-fingerprint"></div>
            </div>
            <div class="buttons-w">
                <button type="submit" class="btn btn-primary">Log in</button>
                <a href="{{route('register')}}"><div class="btn btn-primary">Contact</div></a>
                <a href="{{route('forgot')}}" class="forgot-pass">Forgot Password</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>