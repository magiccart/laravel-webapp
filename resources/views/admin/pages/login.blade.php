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
            Login Form
        </h4>
        <?php
            $message = Session::get('message');
            $error = Session::get('error');
            if($error == false && $message) {
            echo '<p class="text-success text-center">'.$message.'</p>';
            Session::put('message',null);
            }
        ?>
        <form action="">
            <div class="form-group">
                <label for="">Username</label><input class="form-control" placeholder="Enter your username" type="text">
                <div class="pre-icon os-icon os-icon-user-male-circle"></div>
            </div>
            <div class="form-group">
                <label for="">Password</label><input class="form-control" placeholder="Enter your password" type="password">
                <div class="pre-icon os-icon os-icon-fingerprint"></div>
            </div>
            <div class="buttons-w">
                <button class="btn btn-primary">Log in</button>
                <a href="./register"> <div  class="btn btn-primary">Contact</div></a>
            </div>
        </form>
    </div>
</div>
</body>
</html>