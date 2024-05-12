<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>SBMN Edit Contact</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <script src="<?=ASSET?>js/jquery.min.js"></script>
    <link rel="stylesheet" href="<?=ASSET?>css/bootstrap.min.css">
  </head>
  <body>
          <div class="form-group row">
          <label class="control-label col-sm-2" for="state">State</label>
          <div class="col-sm-6">
              <?php
                $options = array(
                  'Jammu And Kashmir','Delhi'
            );
            echo form_dropdown('state', $options , '' , ['class'=>'form-control','id'=>'state']);
              ?>
          </div>
        </div>
      </body>
      </html>s