<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>SBMN Forgot</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<script src="<?=ASSET?>js/jquery.min.js"></script>
		<link rel="stylesheet" href="<?=ASSET?>css/bootstrap.min.css">
	</head>
	<body>
		<div class="container" style="margin-top: 20px;">
		<?php if($error = $this->session->flashdata('is_forgot')){
			$alert_class = $this->session->flashdata('alert_class');
		?>
			<div class="alert <?= $alert_class?>">
				<p class="text-center" style="font-size: 20px;"><?= $error?></p>
			</div>
		<?php
			}
		?>

		</div>
		<div class="container row" style="margin-left: 85px;">
			<?php echo form_open("login/forgot_password");?>
				<div class="col-sm-12">
					<label>Enter Email : </label>
				</div>
				<div class="col-sm-8">
					<input type="email" name="email" class="form-control col-sm-8" placeholder="Enter Email" required>
				</div>
				<?php echo form_submit("submit","Submit",['class'=>'btn btn-primary']); ?>

			<?php echo form_close();?>
		</div>

		<br><a style="margin-left: 120px;" href="<?= base_url()?>/dashboard">Home</a>
	</body>
</html>