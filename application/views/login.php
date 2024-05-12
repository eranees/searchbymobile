<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
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
				<?php if($error = $this->session->flashdata('login_error')){?>
					<div class="alert alert-danger">
  						<p style="font-size: 20px;"><?= $error?></p>
					</div>
				<?php
					}
				?>
				<?php if($error = $this->session->flashdata('is_add')){?>
					<div class="alert alert-success">
  						<p style="font-size: 20px;"><?= $error?></p>
					</div>
				<?php
					}
				?>
				<?php echo form_open("login/valid_login",['class'=>'login100-form validate-form']); ?>
					<span class="login100-form-title p-b-33">
						Account Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<?php echo form_input(['name'=>'email','class'=>'input100','type'=>'text','placeholder'=>'Email','value'=>set_value('email')]); ?>
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
						<?php echo form_input(['name'=>'password','class'=>'input100','type'=>'password','placeholder'=>'password']); ?>
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="container-login100-form-btn m-t-20">
						<?php echo form_submit('login', 'Log In',['class'=>'login100-form-btn']); ?>
					</div>

					<div class="text-center p-t-45 p-b-4">
						<span class="txt1">
							Forgot
						</span>

						<a href="#" class="txt2 hov1">
							<?php echo anchor('login/forgot', 'Password', array('class' => 'txt2 hov1'));?>
						</a>
					</div>

					<div class="text-center">
						<span class="txt1">
							Create an account?
						</span>
						<?php echo anchor('login/signup', 'Sign Up', array('class' => 'txt2 hov1'));?>
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