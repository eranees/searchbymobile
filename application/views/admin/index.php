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
					<li class="active"><a href="<?= base_url()?>admin">Contact List</a></li>
					<li><a href="<?= base_url()?>admin/message">Messages</a></li>
					<li><a href="<?= base_url()?>admin/addContact">Add Contact</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="<?= base_url()?>adminlogin/logout">Logout</a></li>
				</ul>
			</div>
		</nav>
		<!-------------------------------------------- {Navbar End} ------------------------------------------------>
		
		<center><div style="width: 50%;">
			<?php
				if($message = $this->session->flashdata('is_delete')){
					$alert_class = $this->session->flashdata('alert_class');
				?>
				<div class="alert <?= $alert_class?>">
						<p class="text-center"><?= $message?></p>
				</div>
			<?php
				}
			?>
		</div></center>
		<center><div style="width: 50%;">
			<?php
				if($message = $this->session->flashdata('is_updated')){
					$alert_class = $this->session->flashdata('alert_class');
				?>
				<div class="alert <?= $alert_class?>">
						<p class="text-center"><?= $message?></p>
				</div>
			<?php
				}
			?>
		</div></center>

	<div class="container table-responsive">
		<table class="table table-striped responsive">
			<thead>
				<tr>
					<th>ID</th>
					<th>Firstname</th>
					<th>Lastname</th>
					<th>State</th>
					<th>District</th>
					<th>Phone</th>
					<th>Photo</th>
					<th>Username</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($data as $phone):?>
		        	<tr>
		            	<td><?= $phone->id ?></td>
		            	<td><?= $phone->fname ?></td>
		            	<td><?= $phone->lname ?></td>
		            	<td><?= $phone->state ?></td>
		            	<td><?= $phone->district ?></td>
		            	<td><?= $phone->phone ?></td>
		              	<td>
		                	<img src="<?= $phone->photo ?>" class="img-thumbnail img-responsive img-circle" width="40" height="40" alt="image error">
		              	</td>
		              	<td><?= $phone->username?></td>
		              	<td>
		              		<a href="<?php echo base_url()."admin/view/{$phone->id}"?>">V</a>
		              		<a href="<?php echo base_url()."admin/edit/{$phone->id}"?>">E</a>
		              		<a href="<?php echo base_url()."admin/delete/{$phone->id}"?>">D</a>
		              	</td>
		            </tr>
	            <?php endforeach;?>
			</tbody>
		</table>
	</div>		
	</body>
</html>