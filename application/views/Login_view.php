<!DOCTYPE html>
<html lang="en">
<head>
	<title>Halaman Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Favicons -->
 <link href="<?php echo base_url()?>assets/img/pos123.png" rel="icon">
  <link href="<?php echo base_url()?>assets/img/pos123.png" rel="icon">
<!--===============================================================================================-->	
	<link rel="icon" type="assets/img/png" href="<?php echo base_url()?>assets/img/ipos2.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('<?php echo base_url()?>assets/img/graha1.jpeg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				
        <div class="d-flex align-items-center justify-content-between">
       <a href="index.html" class="logo d-flex align-items-center">
        <img src="<?php echo base_url()?>assets/img/pos1234.png" alt="">
        <span class="login100-form-title p-b-31"> 
					
				</span> 				
      </a>
      <h2 class="text-secondary">BULOG</h2>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
    <h5 class="text-white text-center">Penyaluran Beras Bulog</h5> 
    <h4 class="text-info text-center">PT Pos Indonesia (Persero)</h4> <br>
           
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
         <h6 class="fw-bold mb-2 text-uppercase">Silahkan Login User BULOG</h6><br>
           
            <form action="<?php echo site_url()?>/Login/validasi" method="post">
			  <div class="form-group">
			    
			    <input type="username" class="form-control" name="username" placeholder="Username" id="username">
			  </div><br>
			  <div class="form-group">
			   
			  <input type="password" name="password" class="form-control" placeholder="Password" id="pwd">
			  </div>

			  <p class="small mb-5 pb-lg-2 text-right"><a class="text-primary " href="#!">Forgot password?</a></p>

              <!-- <button class="btn btn-outline-primary btn-lg px-5 text-right" type="button">Login</button> -->
			 <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
			 

			</form>

            


            </div>

          </div>
        </div>
      </div>
    </div>
  </div>



	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="<?php echo base_url()?>assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url()?>assets/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url()?>assets/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url()?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url()?>assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url()?>assets/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url()?>assets/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url()?>assets/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url()?>assets/js/main.js"></script>

</body>
</html>