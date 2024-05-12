<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>SBMN Edit User Details</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <script src="<?=ASSET?>js/jquery.min.js"></script>
    <link rel="stylesheet" href="<?=ASSET?>css/bootstrap.min.css">
    <style>
      body{
        background-image: url("<?= base_url()?>/uploads/bg3.png");
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
            <span class="navbar-brand"><a href="<?= base_url()?>dashboard">Home</a></span>
              <span class="navbar-brand" >EDIT User</span>
          </div>
          <ul class="nav navbar-nav navbar-right">
              <li></li>
          </ul>
        </div>
    </nav>
    <!------------------------------------------------ {Navbar End} ------------------------------------------------>

    <center><div style="width: 50%;">
      <?php
        if($message = $this->session->flashdata('is_update')){
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
      foreach ($data as $user) {
          
        }  
    ?>
     <?php echo form_open("dashboard/edit_user_profile",['class'=>'form-horizontal']); ?>
        <div class="form-group row">
          <label class="control-label col-sm-2 text-white" for="uame">Name</label>
          <div class="col-sm-6">
              <?php echo form_input(['name'=>'uname','class'=>'form-control','type'=>'text','id'=>'uname','placeholder'=>'Change Name','value'=>$user->name]); ?>
          </div>
          <div class="col-sm-4 font-size"><?php echo form_error('uname'); ?></div>
        </div>

        <div class="form-group row">
          <label class="control-label col-sm-2 text-white" for="username">User Name</label>
          <div class="col-sm-6">
              <?php echo form_input(['name'=>'username','class'=>'form-control','id'=>'username','type'=>'text','placeholder'=>'Change User Name','value'=>$user->username]); ?>
          </div>
          <div class="col-sm-4 font-size"><?php echo form_error('username'); ?></div>
        </div>
        <div class="form-group row">
          <label class="control-label col-sm-2 text-white" for="email">Email</label>
          <div class="col-sm-6">
              <?php echo form_input(['name'=>'email','class'=>'form-control','id'=>'email','type'=>'email','placeholder'=>'Change Email','value'=>$user->email]); ?>
          </div>
          <div class="col-sm-4 font-size"><?php echo form_error('email'); ?></div>
        </div>

        <div class="form-group row">
          <label class="control-label col-sm-2 text-white" for="pwd">Password</label>
          <div class="col-sm-6">
              <?php echo form_input(['name'=>'password','class'=>'form-control','id'=>'pwd','type'=>'Password','placeholder'=>'Change Password','value'=>$user->password]); ?>
          </div>
          <div class="col-sm-4 font-size"><?php echo form_error('password'); ?></div>
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