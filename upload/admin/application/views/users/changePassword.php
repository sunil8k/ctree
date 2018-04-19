<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>iWant Admin Panel</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?= base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?= base_url();?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?= base_url();?>assets/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?= base_url();?>assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <?php $this->load->view("layout/header");?>
          <div class="wrapper row-offcanvas row-offcanvas-left">
        <?php $this->load->view("layout/left_content");?>

        
            

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        CHANGE PASSWORD
                        <!--<small>Preview</small>-->
                    </h1>
                    <!--<ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Forms</a></li>
                        <li class="active">General Elements</li>
                    </ol>-->
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                       
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <!--<div class="box-header">
                                    <h3 class="box-title">Quick Example</h3>
                                </div>-->
                                
                                 <?php if($this->session->flashdata('success')){ ?>
                                <div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Alert!</b> <?php echo $this->session->flashdata('success'); ?>
                                    </div>
                                    <?php } ?>
                                
                                 <?php
									echo form_open('users/changepassword', array('name' => 'change','onsubmit'=>'return validation();'));    
									?>
                                    
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1"><em class="star_red">*</em> Old Password :</label>
                                            <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Old Password" required="required">
                                           <?php echo $this->session->flashdata('unsuccess'); ?>
                                            <span class="php-error" id="old_password_msg" style="color:#f00;"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1"><em class="star_red">*</em> New Password :</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder=" New Password" required="required">
                                            <?php echo form_error('password', '<span class="php-error"  style="color:#f00;">', '</span>'); ?>
                                            <span class="php-error" id="password_msg" style="color:#f00;"></span>
                                        </div>
                                         <div class="form-group">
                                            <label for="exampleInputEmail1"> Confirm Password :</label>
                                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" >
                                           <?php echo form_error('confirm_password', '<span class="php-error"  style="color:#f00;">', '</span>'); ?>
                                           <span class="php-error" id="confirm_password_msg" style="color:#f00;"></span>
                                        </div>
                                        
                                       
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                    <?php
									echo form_close();
									?>
                                <!--</form>-->
                            </div>
                         
                        </div>
                       
                    
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?= base_url();?>assets/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url();?>assets/js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="js/AdminLTE/demo.js" type="text/javascript"></script>        
    </body>
</html>

<script>
function usersReset()
	 {
		   document.getElementById("old_password_msg").innerHTML="";
           document.getElementById("password_msg").innerHTML="";
		   document.getElementById("confirm_password_msg").innerHTML="";
	 }


function validation()
	 {
		var flag=0;
		
		var old_password = document.getElementById("old_password").value;	
	    if(old_password ==""){
		document.getElementById("old_password_msg").innerHTML='<div class="error-left"></div><div class="error-inner">This field is required.</div>';	
		flag=1;
		}else {
		document.getElementById("old_password_msg").innerHTML="";
		}
		
		
		
			
		
			
		var password = document.getElementById("password").value;	
	    if(password ==""){
		document.getElementById("password_msg").innerHTML='<div class="error-left"></div><div class="error-inner">This field is required.</div>';	
		flag=1;
		}else if(password.length < 4){
		document.getElementById("password_msg").innerHTML='<div class="error-left"></div><div class="error-inner">Use between 4 to 20 character.</div>';	
		flag=1;
		}else{
		document.getElementById("password_msg").innerHTML="";
		} 
		
		
		
		
		var confirm_password = document.getElementById("confirm_password").value;
		 if(confirm_password ==""){
		document.getElementById("confirm_password_msg").innerHTML='<div class="error-left"></div><div class="error-inner">This field is required.</div>';	
		flag=1;
		}else if(password != confirm_password){
		document.getElementById("confirm_password_msg").innerHTML='<div class="error-left"></div><div class="error-inner">Password not match.</div>';	
		flag=1;
		} else {
		document.getElementById("confirm_password_msg").innerHTML="";
		} 
			
		
	   
		
			if(flag==0)
			{
			return true;
				}else{
					
				
			return false;
				}
    }

</script>
