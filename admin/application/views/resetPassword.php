<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Crosswords | Forgot Password</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?= base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?= base_url();?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?= base_url();?>assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />        
		<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/bootstrapValidator.min.css">
        <link href="<?= base_url();?>assets/css/bootstrapVali.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-black">
        <div class="form-box" id="login-box">
            <div class="header">Forgot password</div>
            <?php
				echo form_open('users/updatePassword', array('name' => 'forgot'));    
			?>
                <div class="body bg-gray">
                    <div class="form-group">
                    
                        <span style="color:#f00;"><?php echo $this->session->flashdata('success'); ?></span>
                        <input type="text" name="password" id="password" class="form-control" placeholder="Password"/>
            		</div>
                    <div class="form-group">
                    
                        <span style="color:#f00;"><?php echo $this->session->flashdata('unsuccess'); ?></span>
				<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Confirm Password" name="npassword" id="npassword" />
            		</div>
                </div>
                <div class="footer">                  
        <input type="hidden" name="email" value="<?php echo $_REQUEST['email'];?>"  />                                             
                    <button type="submit" class="btn bg-olive btn-block">Submit</button>
                    <a href="#" onclick="window.location='<?= base_url();?>index.php/users/login'" class="text-center">Back to Login</a>
			
                </div>
        <?php
        echo form_close();
        ?>
        </div>
    <!-- jQuery 2.0.2 -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url();?>assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?= base_url();?>assets/js/bootstrapValidator.min.js"></script> 
    <script type="text/javascript">
	function validate() {
		var flag = 0;
		if($('#password').val()=="") {
			flag = 1;
			$('#tpassword').html('required');
		}
		else {
			$('#tpassword').html('');
		}
		if($('#npassword').val()=="") {
			flag = 1;
			$('#tnpassword').html('required');
		}
		else {
			$('#tnpassword').html('');
		}
		if($('#password').val() != $('#npassword').val()) {
			flag = 1;
		}
		if(flag)
		return false;	
		else
		return true;
	}
    </script>
    </body>
</html>