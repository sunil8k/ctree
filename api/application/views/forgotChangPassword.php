
<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>AdminLTE | Log in</title>
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
         <?php echo $this->session->flashdata('unsuccess'); ?>
            <div class="header">Change Password</div>
           <?php
				echo form_open('users/isChangepassword', array('name' => 'login', 'onsubmit'=>'return check()')); 
			?>
            
            <?php if(isset($_REQUEST['status'])=='1'){ ?>
            <p>New password and confirm-password not match!</p>
            <?php }
            if(!empty($_REQUEST['token'])){ 
            $token = $_REQUEST['token'];
            $string = base64_decode($token);
            $explod =  explode("#",$string);
            $email = $explod[0]; 
            }
            ?>
            <p class="t_box_sign">
            
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="password" name="newpassword" id="newpassword" class="form-control" placeholder="New Password"/>
                        <span id="newpassword" style="color:#C00;"></span>
                    </div>
                    <div class="form-group">
                        <input type="password" name="confirmpassword" id="confirmpassword" class="form-control" placeholder="Confirm Password"/>
                        <span id="msg_confirmpassword" style="color:#C00;"></span>
                    </div>          
                    <input type="hidden" name="email" value="<?php echo $email; ?>" />
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-olive btn-block">Submit</button>  
                    
                    <!--<p><a href="#" onclick="window.location='<?= base_url();?>index.php/users/forgotPassword'">I forgot my password</a></p>-->
                    
                    <!--<a href="register.html" class="text-center">Register a new membership</a>-->
                </div>
            <?php
				echo form_close();
			?>
           <!-- <div class="margin text-center">
                <span>Sign in using iMemet</span>
                <br/>
                <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
                <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
                <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

            </div>-->
        </div>


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?= base_url();?>assets/js/bootstrap.min.js" type="text/javascript"></script>   

<script type="text/javascript" src="<?= base_url();?>assets/js/bootstrapValidator.min.js"></script>     

<script type="text/javascript">

$(document).ready(function() {
	
    $('#clearingForm')
        // IMPORTANT: You must declare .on('init.field.bv')
        // before calling .bootstrapValidator(options)
        .on('init.field.bv', function(e, data) {
            // data.bv      --> The BootstrapValidator instance
            // data.field   --> The field name
            // data.element --> The field element

            var $parent = data.element.parents('.form-group'),
                $icon   = $parent.find('.form-control-feedback[data-bv-icon-for="' + data.field + '"]');

            // From v0.5.3, you can retrieve the icon element by
            // $icon = data.element.data('bv.icon');

            $icon.on('click.clearing', function() {
                // Check if the field is valid or not via the icon class
                if ($icon.hasClass('glyphicon-remove')) {
                    // Clear the field
                    data.bv.resetField(data.element);
                }
            });
        })

        .bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                username: {
                    validators: {
                        notEmpty: {
                            message: 'The username is required'
                        }
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'The password is required'
                        }
                    }
                }
            }
        });
});

</script>
<script type="text/javascript">
function check() {
	var chk = 1;
	var newpassword = document.getElementById('newpassword').value;
	var confirmpassword = document.getElementById('confirmpassword').value;
	if(newpassword != confirmpassword){
	    document.getElementById('msg_confirmpassword').innerHTML = "New password and confirm-password not match!";
		chk=0;
	}else {
		document.getElementById('msg_confirmpassword').innerHTML ='';
		}
	if(chk){
	return true;	
	}else{
	return false;	
	}
  
	
}


</script>

    </body>
</html>