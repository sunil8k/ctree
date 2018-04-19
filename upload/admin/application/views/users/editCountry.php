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
                        Edit Country
                         <a href="<?= base_url();?>index.php/users/showCountry" style="float: right; margin-right: 10px;">
                        	<i class="btn btn-info btn-sm">Go Back</i>
                         </a>
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
                                <div class="box-header">
                                    <h3 class="box-title">Quick Example</h3>
                                </div>
                                
                                 <?php if($this->session->flashdata('success')){ ?>
                                <div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Alert!</b> <?php echo $this->session->flashdata('success'); ?>
                                    </div>
                                    <?php } ?>
                                
                                <?php echo form_open_multipart('users/saveEditCountry', array('name' => 'create','onsubmit'=>'return validation();')); ?>
                                
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"> Country Name :</label>
                                           <input type="text" class="form-control" id="name" name="name" placeholder="Country" required="required" value="<?php echo set_value('name', $data['name']); ?>">
                                           <?php echo form_error('name', '<span class="php-error"  style="color:#f00;">', '</span>'); ?>
                                           <span class="php-error" id="name_msg" style="color:#f00;"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1"> Country Code :</label>
                                            <input type="text" class="form-control" id="code" name="code" placeholder="Country Code" value="<?php echo set_value('country_code', $data['country_code']); ?>">
                                            <?php echo form_error('code', '<span class="php-error" style="color:#f00;">', '</span>'); ?>
                                            <span class="php-error" id="code_msg" style="color:#f00;"></span>
                                        </div>
                                       <input type="hidden" name="id" value="<?php echo $data['id'];?>" />
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
	function reloadPage(){
		window.location='<?= base_url();?>index.php/users/addCountry';
	  }
	  

  function validation()
	 {
		var flag=0;
		var country = document.getElementById("country").value;	
	    if(country ==""){
		document.getElementById("country_msg").innerHTML='<div class="error-left"></div><div class="error-inner">This field is required.</div>';	
		flag=1;
		}else {
		document.getElementById("country_msg").innerHTML="";
		}
		
	
			
				
			if(flag==0)
			{
			return true;
				}else{
					
				
			return false;
				}
    }

</script>