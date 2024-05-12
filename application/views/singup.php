<!DOCTYPE html>
<html lang="en">
<head>
	<title>SignUp</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?=LOGIN?>images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=LOGIN?>vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=LOGIN?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=LOGIN?>fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=LOGIN?>vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?=LOGIN?>vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=LOGIN?>vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=LOGIN?>vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?=LOGIN?>vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=LOGIN?>css/util.css">
	<link rel="stylesheet" type="text/css" href="<?=LOGIN?>css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<center><div style="width: 50%;">
      			<?php
        			if($message = $this->session->flashdata('is_add')){
          			$alert_class = $this->session->flashdata('alert_class');
        		?>	
        		<div class="alert <?= $alert_class?>">
            		<p class="text-center"><?= $message?></p>
        		</div>
      			<?php
        			}
      			?>
    			</div></center>
				<?php echo form_open("login/signupDetails",['class'=>"login100-form validate-form"]); ?>
					<span class="login100-form-title p-b-33">
						Create Account !
					</span>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="uname" placeholder="Name">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
					<?php echo form_error('uname');?>
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="username" placeholder="username">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
					<?php echo form_error('username');?>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
					<?php echo form_error('email');?>
					<div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
					<?php echo form_error('password');?>
					<div class="container-login100-form-btn m-t-20">
						<?php echo form_submit("signup","SignUp",['class'=>'login100-form-btn']);?>
					</div>

					<div class="text-center">
						<span class="txt1">
							Already Have An Account?
						</span>
						<?php echo anchor('login', 'LogIn', array('class' => 'txt2 hov1'));?>
					</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
	

	
<!--===============================================================================================-->
	<script src="<?=LOGIN?>vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=LOGIN?>vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=LOGIN?>vendor/bootstrap/js/popper.js"></script>
	<script src="<?=LOGIN?>vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=LOGIN?>vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=LOGIN?>vendor/daterangepicker/moment.min.js"></script>
	<script src="<?=LOGIN?>vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?=LOGIN?>vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?=LOGIN?>js/main.js"></script>

</body>
</html>