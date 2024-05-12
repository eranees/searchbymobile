<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>SBMN Messages</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<script src="<?=ASSET?>js/jquery.min.js"></script>
		<link rel="stylesheet" href="<?=ASSET?>css/bootstrap.min.css">
	</head>
	<body>
		<div>
			<u><h1 class="text-primary">Messages For You By Site Admin</h1></u>
		</div>
		<div>
		<ul>
		<?php foreach($data as $msg){?>
			<li><?php echo $msg->message."  ";?><a href="<?= base_url()."dashboard/deletemsg/{$msg->id}"?>" class="btn btn-danger">Delete</a></li><Br>
		<?php
			} 
		?>
		</ul>
		</div>

		<a style="margin-left: 30px;" href="<?= base_url()?>dashboard">Home</a>
	</body>
</html>