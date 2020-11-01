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
            Contact Form
        </h4>
        <form action="">
            <div class="form-group">
                <label for="">Name</label><input class="form-control" placeholder="Enter Name" type="text">
            </div>
            <div class="form-group">
                <label for="">Address 1</label><input class="form-control" placeholder="Enter your address 1" type="text">
            </div>
            <div class="form-group">
                <label for="">Address 2</label><input class="form-control" placeholder="Enter your address 2" type="text">
            </div>
            <div class="form-group">
                <label for="">Pincode</label><input class="form-control" placeholder="Enter your Pincode" type="password">
            </div>
            <div class="form-group">
                <label for="">Select City</label><select class="form-control">
                    <option value="New York">
                        New York
                    </option>
                    <option value="California">
                        California
                    </option>
                    <option value="Boston">
                        Boston
                    </option>
                    <option value="Texas">
                        Texas
                    </option>
                    <option value="Colorado">
                        Colorado
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Select State</label><select class="form-control">
                    <option value="New York">
                        New York
                    </option>
                    <option value="California">
                        California
                    </option>
                    <option value="Boston">
                        Boston
                    </option>
                    <option value="Texas">
                        Texas
                    </option>
                    <option value="Colorado">
                        Colorado
                    </option>
                </select>
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="form-group">
                        <label for="">Electricity Usage in kwh</label><input class="form-control" placeholder="Electricity Usage in kwh" type="text">
                    </div>

                </div>
                <div class="col-4 mt-4">
                    <div class="form-check">
                        <label class="form-check-label"><input checked="" class="form-check-input" name="optionsRadios[]" type="radio" value="Year">Year</label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label"><input checked="" class="form-check-input" name="optionsRadios[]" type="radio" value="Month">Month</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="">Phone</label><input class="form-control" placeholder="Enter your Phone" type="text">
            </div>
            <div class="form-group">
                <label for="">Email</label><input class="form-control" placeholder="Enter your Email" type="text">
            </div>
            <div class="form-group">
                <label for="">Visit Date and time</label><input class="form-control" placeholder="Visit Date And Time" type="Date">
            </div>

            <div class="buttons-w">
                <a href="/admin/contact"> <button  class="btn btn-primary">Contact Now</button></a>
                <button class="btn btn-primary">Log in</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>