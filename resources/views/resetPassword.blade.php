<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Pass</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <form action="{{ route('newPass') }}" method="post">
        @csrf
        <input type="text" name="token" value="{{ $info }}" hidden="">
        New Password: <input type="password" name="password" class="form-control">
        Confirm: <input type="password" name="confirm" class="form-control">
        <input type="submit" class="btn btn-danger btn-block">
    </form>
</div>
</body>
</html>