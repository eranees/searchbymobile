<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>SBMN Number Not Found</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<script src="<?=ASSET?>js/jquery.min.js"></script>
		<link rel="stylesheet" href="<?=ASSET?>css/bootstrap.min.css">
	</head>
	<body>
		<h1 class="text-danger text-center">
			Sorry We Are Enable To Find.<small class="text-warning"><?= $data?></small>
		</h1>
		<h3 class="text-center text-primary">We Will Add This Number Soon.</h3>
		<div class="container">
			<a href="<?= base_url()?>dashboard">Home</a><br>
			<a href="<?= base_url()?>dashboard/addNewContact">Add New Number</a><br>
			<a href="<?= base_url()?>dashboard/view_contacts">Check Your Contacts</a>
		</div>
	</body>
</html>