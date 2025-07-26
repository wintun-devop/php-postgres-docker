<?php 

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Data Submitting</title>
   <link href="../access/bootstrap/css/bootstrap.min.css" rel="stylesheet" >
    <link href="../access/css/main.css" rel="stylesheet" rel="stylesheet">
    <script src="../access/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body>
   <div class="container">
      <div class="row">
         <div class="col-md-4"></div>
         <div class="col-md-4">
            <!-- Submit data to database -->
            <div class="card-wrapper">
                     <div id="my-card" class="card card-rotating text-left">
                        <div class="product-input-box">
                           <div class="text-center h4 text-white bg-primary p-2">Input Your Product</div>
                           <form method="POST" class="needs-validation" id="identicalForm" action="product_register_script.php" enctype="multipart/form-data" novalidate="" autocomplete="off">
                              <label class="form-label">Product Name:</label>
                              <input type="text" class="form-control" name="p_name" placeholder="Product Name" id="productname" required autofocus>
                              <label class="form-label">Product Model:</label>
                              <input type="text" class="form-control" name="p_model" placeholder="Product Model" id="productmodel" required autofocus>
                              <label class="form-label">Product Vendor:</label>
                              <input type="text" class="form-control" name="p_vendor" placeholder="Product Vendor" id="productvendor" required autofocus>
                              <label class="form-label">Product Price:</label>
                              <input type="number" class="form-control" name="p_price" placeholder="Product Price" id="productprice" required autofocus>
                              <label class="form-label">Product Discount:</label>
                              <input type="number" class="form-control" name="p_discount" placeholder="Product Discount" id="productdiscount" required autofocus>
                              <!-- Special Character validation -->
                              <div><span id="lblError" style="color: #dc3545"></span></div>
                              <div><span id="numError" style="color: #dc3545"></span></div>
                              <!-- Empty form control -->
                              <div class="invalid-feedback">Please enter valid input on red alert box.</div>
                              <button type="submit" class="btn btn-primary" name="product_input" id="submit-product">Input</button>
                           </form>
                        </div>
                     </div>    
            <div>  
         </div>
         <div class="col-md-4"></div>
      </div>
   </div>
<!-- Empty form control-->
<script>
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
</script>
<!-- Special character on First-Name and Last-Name Vertification -->
<script type="text/javascript">
    $(function () {
        $("#productname, #productmodel,#productvendor").keypress(function (e) {
            var keyCode = e.keyCode || e.which;
 
            $("#lblError").html("");
 
            //Regex for Valid Characters i.e. Alphabets.
            var regex = /^[A-Za-z0-9 ]+$/;
 
            //Validate TextBox value against the Regex.
            var isValid = regex.test(String.fromCharCode(keyCode));
            if (!isValid) {
                $("#lblError").html("Not allowed special characters for Product Name,Model and Vendor.");
            }
            return isValid;
        });
    });
//nunber vartification
    $(function () {
        $("#productprice, #productdiscount").keypress(function (e) {
            var keyCode = e.keyCode || e.which;
 
            $("#numError").html("");
 
            //Regex for Valid Characters i.e. Alphabets.
            var regex = /^[0-9]+$/;
 
            //Validate TextBox value against the Regex.
            var isValid = regex.test(String.fromCharCode(keyCode));
            if (!isValid) {
                $("#numError").html("Only allow numeric number.");
            }
            return isValid;
        });
    });
</script>
</body>
</html>