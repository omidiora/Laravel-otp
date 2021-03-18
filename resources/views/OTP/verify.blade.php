<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/app.css">
</head>
<body>
    

<div class="row">
<div class="col-md-8">

<div class="card">
<div class="card-header"> Dashboard </div>

<div class="card-body">
    

<div class="card-body">
<form action="/verifyOTP" method="POST">
    @csrf
<div class="form-group">
<label for="otp">YOUR OTP </label>
<input type="text" name="otp" id="otp" class="form-control" required>
</div>

<input type="submit" value="verify" class="btn btn-info">





</form>
</div>
</div>
</div>

</div>


</body>
</html>