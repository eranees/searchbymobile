<?php 
	foreach ($data as $phone) {
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>SBMN Add View Contact</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<link rel="stylesheet" href="<?=ASSET?>css/bootstrap.css">
	</head>
	<body>
		<center><div class="card" style="width:400px">
		  	<img class="card-img-top" src="<?= $phone->photo?>" alt="Card image">
		  	<div class="card-body">
			    <h4 class="card-title"><?= $phone->fname?> <?= $phone->lname?></h4>
			    <p class="card-text">
			    	<?= $phone->state?><br>
			    	<?= $phone->district?><br>
			    	<?= $phone->address?><br>
			    	<?= $phone->phone?><br>
			    	
			    </p>
			    <a href="<?= base_url()?>dashboard" class="btn btn-primary">Home</a>
	  		</div>
		</div></center>
	</body>
</html>