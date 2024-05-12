<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Admin login</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<script src="<?=ASSET?>js/jquery.min.js"></script>
		<link rel="stylesheet" href="<?=ASSET?>css/bootstrap.min.css">
		<style>
		body{
		/*background-image: url("<?= base_url()?>/uploads/bg3.png");*/
		}
		.font-size{
		font-size: 15px;
		}
		.text-white{
		color : white;
		}
		</style>
	</head>
	<body>
		<!-------------------------------------------- {Navbar Start} -------------------------------------------->
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<span class="navbar-brand" >Admin Control Pannel Pannel</span>
				</div>
				<ul class="nav navbar-nav navbar-right">
					<li><a><?= $this->session->userdata('name')?></a></li>
				</ul>
			</div>
			<div class="container-fluid">
				<div class="navbar-header">
					<span class="navbar-brand" ></span>
				</div>
				<ul class="nav navbar-nav">
					<li class=""><a href="<?= base_url()?>admin">Contact List</a></li>
					<li class="active"><a href="<?= base_url()?>admin/message">Messages</a></li>
					<li><a href="<?= base_url()?>admin/addContact">Add Contact</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="<?= base_url()?>adminlogin/logout">Logout</a></li>
				</ul>
			</div>
		</nav>
		<!-------------------------------------------- {Navbar End} ------------------------------------------------>



		<div class="container table-responsive">
			<table class="table table-striped responsive">
				<thead>
					<tr>
						<th>Message</th>
						<th>User Name</th>
						<th>Feedback</th>
						<th>Send</th>
						<th>Delete Message</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($data as $admin):?>
			        	<tr>
			            	<td><?= $admin->message ?></td>
			            	<td><?= $admin->username ?></td>
			            	<?php echo form_open("admin/feedback");?>
			            	<td>
			            		<textarea name="feedback" placeholder="Enter message" cols="20" required maxlength="400" rows="1"></textarea>
			            		<input type="hidden" name="username" value="<?= $admin->username?>">
			            	</td>
			            	<td>
			            		<button class="btn btn-primary">Send</button>
			            	</td>
			            	<?php echo form_close(); ?>
			            	<td><a class="btn btn-danger" href="<?php echo base_url()."admin/deleteMsg/{$admin->id}"?>">Delete</a></td>
			            </tr>
		            <?php endforeach;?>
				</tbody>
			</table>
		</div>

		<center><div style="width: 50%;">
	  	<?php
	    	if($message = $this->session->flashdata('feedback')){
	      		$alert_class = $this->session->flashdata('alert_class');
	    	?>
	    	<div class="alert <?= $alert_class?>">
	        	<p class="text-center"><?= $message?></p>
	    	</div>
	  	<?php
	    	}
	  	?>		
	</body>
</html>