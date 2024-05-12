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
    <!------------------------------------------------ {Navbar Start} ------------------------------------------------>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
              <span class="navbar-brand" >Admin Login Pannel</span>
          </div>
          <ul class="nav navbar-nav navbar-right">
              <li></li>
          </ul>
        </div>
    </nav>
    <!------------------------------------------------ {Navbar End} ------------------------------------------------>
    <center><div style="width: 50%;">
      <?php
        if($message = $this->session->flashdata('is_valid')){?>
        <div class="alert alert-danger">
            <p class="text-center"><?= $message?></p>
        </div>
      <?php
        }
    ?>
    </div></center>
    <div class="container">
    <?php echo form_open("adminlogin/check_valid_admin",['class'=>'form-horizontal']); ?>  
        <div class="form-group row">
          <div class="col-sm-6">
              <?php echo form_input(['name'=>'email','class'=>'form-control','type'=>'text','id'=>'email','placeholder'=>'Enter Email','value'=>'']); ?>
          </div>
          <div class="col-sm-6 font-size"><?php echo form_error('email'); ?></div>
        </div>

        <div class="form-group row">
          <div class="col-sm-6">
              <?php echo form_input(['name'=>'password','class'=>'form-control','id'=>'pwd','type'=>'text','placeholder'=>'Enter Last Name','value'=>'']); ?>
          </div>
          <div class="col-sm-6 font-size"><?php echo form_error('password'); ?></div>
        </div>
        <div class="">
        	<?php echo form_submit("submit","Log In",['class'=>'btn btn-primary']);?>
        	<?php echo form_reset("reset","Reset",['class'=>'btn btn-danger']);?>
        </div>
    <?php echo form_close(); ?>
    </div>
  </body>
</html>