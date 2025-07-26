<?php 
session_start();
require_once(__DIR__ . '../../functions/classes.php');
if(!isset($_SESSION['e-mail'])){
    header('location:../users/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Muhamad Nauval Azhar">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="This is a login page template based on Bootstrap 5">
	<title>Change Password</title>
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
							<h1 class="fs-4 card-title fw-bold mb-4">Change Password</h1>
							<form method="POST" class="needs-validation" id="identicalForm" action="change_pass_script.php" enctype="multipart/form-data" novalidate="" autocomplete="off">
                              <label class="form-label">Old Password:</label>
                              <input type="password" class="form-control" id="old-password" name="oldPassword" placeholder="Old Password" required autofocus>
                              <div class="invalid-feedback">Please enter valid old password.</div>
                              <label class="form-label">New Password:</label>
                              <input type="password" class="form-control" id="new-password" name="newPassword" placeholder="New Password" required autofocus>
                              <div class="invalid-feedback">Please enter valid new password.</div>
                              <label class="form-label">Confirm New Password:</label>
                              <input type="password" class="form-control" id="retype-password" name="retype" placeholder="Confirmed New Password" required autofocus>
                              <!-- Password Match validation -->
                              <div class="form-text confirm-message"></div>
                              <div class="invalid-feedback">Please enter valid confirmed password.</div>
                              <button type="submit" class="btn btn-primary" name="password_data" id="submit-1">Change</button>
                              <a href="../cart/products.php"  type="submit" class="btn btn-secondary">Cancle</a>       
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
//Bootstrap Form Control 
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
//Password match vertically
$('#new-password, #retype-password').on('keyup', function(){
$('.confirm-message').removeClass('success-message').removeClass('error-message');
let password=$('#new-password').val();
let confirm_password=$('#retype-password').val();
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
