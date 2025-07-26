<?php
    require_once(__DIR__ . '../../functions/classes.php');
    session_start();
    if(isset($_SESSION['e-mail'])){
        header('location:../cart/products.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Muhamad Nauval Azhar">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="This is a login page template based on Bootstrap 5">
	<title>Bootstrap 5 Login Page</title>
	<link href="../access/bootstrap/css/bootstrap.min.css" rel="stylesheet" >
    <link href="../access/css/main.css" rel="stylesheet" rel="stylesheet">
    <script src="../access/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body>
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-center my-5">
						<img src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="logo" width="100">
					</div>
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4">Register</h1>
							<form method="POST" class="needs-validation" id="identicalForm" action="signup_script.php" enctype="multipart/form-data" novalidate="" autocomplete="off">
                              <label class="form-label">Name:</label>
                              <input type="text" class="form-control" name="name" placeholder="Name" id="name" required autofocus>
                              <label class="form-label">Email:</label>
                              <input type="email" class="form-control" name="e-mail" placeholder="E-mail" id="email" required autofocus>
                              <label class="form-label">Password:</label>
                              <input type="password" class="form-control" id="password" name="Password" placeholder="Password" required autofocus>
                              <label class="form-label">Confirm Password:</label>
                              <input type="password" class="form-control" id="confirmpassword" name="ConfirmPassword" placeholder="Confirm Password" required autofocus>
                              <!-- Password Match validation -->
                              <div class="form-text confirm-message"></div>
                              <!-- Special Character validation -->
                              <div><span id="lblError" style="color: #dc3545"></span></div>
                              <!-- Email Format validation -->
                              <div><span id="emailFormatError" style="color: #dc3545"></span></div>
                              <div><span id="emailFormatCorrect" style="color:green"></span></div>
                              <!-- Empty form control -->
                              <div class="invalid-feedback">Please enter valid input on red alert box.</div>
                              <button type="submit" class="btn btn-primary" name="input_data" id="submit-1">Register</button>
							  <p>If you have already account?<a href="login.php">Login here!</a></p>
                           </form>
						</div>
					</div>
					<div class="text-center mt-5 text-muted">
						Copyright &copy; 2017-2021 &mdash; Your Company 
					</div>
				</div>
			</div>
		</div>
	</section>
<script type="text/javascript">
//bootstrap form control
    (function () {
	'use strict'

	// Fetch all the forms we want to apply custom Bootstrap validation styles to
	var forms = document.querySelectorAll('.needs-validation')
	// Loop over them and prevent submission
	Array.prototype.slice.call(forms)
		.forEach(function (form) {
			form.addEventListener('submit', function (event) {
				if (!form.checkValidity()) {
					event.preventDefault()
					event.stopPropagation()
				}
				form.classList.add('was-validated')
			}, false)
		})
})()
//Specifical Character Verification
$(function () {
        $("#name").keypress(function (e) {
            var keyCode = e.keyCode || e.which;
 
            $("#lblError").html("");
 
            //Regex for Valid Characters i.e. Alphabets.
            var regex = /^[A-Za-z- ]+$/;
 
            //Validate TextBox value against the Regex.
            var isValid = regex.test(String.fromCharCode(keyCode));
            if (!isValid) {
                $("#lblError").html("Not allowed special character and number for username.");
            }
            return isValid;
        });
    });
//Password match vertically
$('#password, #confirmpassword').on('keyup', function(){
$('.confirm-message').removeClass('success-message').removeClass('error-message');
let password=$('#password').val();
let confirm_password=$('#confirmpassword').val();
if(password===""){
    $('.confirm-message').text("Password Field cannot be empty").addClass('error-message');
}
else if(confirm_password===""){
    $('.confirm-message').text("Confirm Password Field cannot be empty").addClass('error-message');
}
else if(confirm_password===password)
{
    $('.confirm-message').text('Password Match!').addClass('success-message');
}
else{
    $('.confirm-message').text("Password Doesn't Match!").addClass('error-message');
}
});
</script>
</body>
</html>
