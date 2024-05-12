<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>SBMN Add New Contact</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<script src="<?=ASSET?>js/jquery.min.js"></script>
		<link rel="stylesheet" href="<?=ASSET?>css/bootstrap.min.css">
		<link rel="stylesheet" href="<?=ASSET?>css/ionicons.min.css">
	</head>
<body>
	<!------------------------------------------------ {Navbar Start} ------------------------------------------------>
	<nav class="navbar navbar-inverse">
			<div class="container-fluid">
			<div class="navbar-header">
				<span class="navbar-brand"><a href="<?= base_url()?>dashboard">Home</a></span>
  				<span class="navbar-brand" >List Of Phone Numbers</span>
			</div>
			<ul class="nav navbar-nav navbar-right">
  				<li><a href="<?= base_url()?>dashboard/user_profile"><?= $this->session->userdata("username");?></a></li>
			</ul>
			</div>
	</nav>
	<!------------------------------------------------ {Navbar End} ------------------------------------------------>

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
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<!--<?php if($data){?>
					<td class="text-center" colspan="7">
						Your Directory Is Empty.
						<a href="<?= base_url()?>/dashboard/addNewContact">Save Number</a>
					</td>
				<?php }?>-->
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
		              	<td>
		              		<a href="<?php echo base_url()."dashboard/view/{$phone->id}"?>">V</a>
		              		<a href="<?php echo base_url()."dashboard/edit/{$phone->id}"?>">E</a>
		              		<a href="<?php echo base_url()."dashboard/delete/{$phone->id}"?>">D</a>
		              	</td>
		            </tr>
	            <?php endforeach;?>
			</tbody>
		</table>

		<a href="<?= base_url()?>dashboard/addNewContact">Add New Contact</a>
	</div>
</body>
</html>