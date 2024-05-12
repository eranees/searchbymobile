<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Admin Edit Contact</title>
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
					<li class=""><a>You Can Edit Contact Here!</a></li>
					<li class=""><a href="<?= base_url()?>admin">Contact List</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="<?= base_url()?>adminlogin/logout">Logout</a></li>
				</ul>
			</div>
		</nav>
		<!-------------------------------------------- {Navbar End} ------------------------------------------------>

    <center><div style="width: 50%;">
      <?php
        if($message = $this->session->flashdata('is_successfull')){
          $alert_class = $this->session->flashdata('alert_class');
        ?>
        <div class="alert <?= $alert_class?>">
            <p class="text-center"><?= $message?></p>
        </div>
      <?php
        }
      ?>
    </div></center>
    <?php
      foreach ($data as $phone) {
          
        }  
    ?>
     <?php echo form_open_multipart("admin/editUserPhone",['class'=>'form-horizontal']); ?>


        <?php echo form_hidden(['name'=>'ID','class'=>'form-control','type'=>'text','value'=>$phone->id]); ?>
        <div class="form-group row">
          <label class="control-label col-sm-2 text-white" for="ID">ID</label>
          <div class="col-sm-6">
            <input type="text" name="ID" class="form-control" value="<?= $phone->id?>" readonly>
          </div>
        </div>
        
        <div class="form-group row">
          <label class="control-label col-sm-2 text-white" for="fname">First Name</label>
          <div class="col-sm-6">
              <?php echo form_input(['name'=>'fname','class'=>'form-control','type'=>'text','id'=>'fname','placeholder'=>'Enter First Name','value'=>$phone->fname]); ?>
          </div>
          <div class="col-sm-4 font-size"><?php echo form_error('fname'); ?></div>
        </div>

        <div class="form-group row">
          <label class="control-label col-sm-2 text-white" for="lname">Last Name</label>
          <div class="col-sm-6">
              <?php echo form_input(['name'=>'lname','class'=>'form-control','id'=>'lname','type'=>'text','placeholder'=>'Enter Last Name','value'=>$phone->lname]); ?>
          </div>
          <div class="col-sm-4 font-size"><?php echo form_error('lname'); ?></div>
        </div>

        <div class="form-group row">
          <label class="control-label col-sm-2 text-white" for="state">State</label>
          <div class="col-sm-6">
              <?php
                    $options = array(
                    'Select Your State' => 'Select Your State',
                    'Jammu And Kashmir' => 'Jammu And Kashmir',
                    'Delhi'             => 'Delhi' 
                    );
                echo form_dropdown('state', $options , $phone->state , ['class'=>'form-control','id'=>'state']);
              ?>
          </div>
          <div class="col-sm-4 font-size"><?php echo form_error('state'); ?></div>
        </div>

        <div class="form-group row">
          <label class="control-label col-sm-2 text-white" for="district">District</label>
          <div class="col-sm-6">
              <?php echo form_input(['name'=>'district','class'=>'form-control','id'=>'district','type'=>'text','placeholder'=>'Enter District Name','value'=>$phone->district]); ?>
          </div>
          <div class="col-sm-4 font-size"><?php echo form_error('district'); ?></div>
        </div>
        
        <div class="form-group row">
          <label class="control-label col-sm-2 text-white" for="address">Village/City</label>
          <div class="col-sm-6">
              <?php echo form_input(['name'=>'address','class'=>'form-control','id'=>'address','type'=>'text','placeholder'=>'Enter Village/City','value'=>$phone->address]); ?>
          </div>
          <div class="col-sm-4 font-size"><?php echo form_error('address'); ?></div>
        </div>

        <div class="form-group row">
          <label class="control-label col-sm-2 text-white" for="pno">Phone Number</label>
          <div class="col-sm-6">
              <?php echo form_input(['name'=>'phone','class'=>'form-control','id'=>'pno','type'=>'text','placeholder'=>'Enter Phone Number','value'=>$phone->phone]); ?>
          </div>
          <div class="col-sm-4 font-size"><?php echo form_error('phone'); ?></div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
              <?php echo form_submit("submit","Submit",['class'=>'btn btn-primary']);?>
              <?php echo form_reset("reset","Reset",['class'=>'btn btn-danger']); ?>
          </div>
        </div>
    <?php echo form_close(); ?>
  </body>
</html>