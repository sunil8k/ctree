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
                        Compose Mail
                       <!-- <small>Preview</small>-->
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
								echo form_open_multipart('users/adminMail', array('name' => 'create','onsubmit'=>'return validation();')); 
								?>
                                
                                    <div class="box-body">
                                        <!--<div class="form-group">
                                            <label for="exampleInputEmail1"> Select All :</label>
                                            <input type="checkbox" onClick="allUser()" name="chkall" id="chkall" value="all"/>
                                           <?php //echo form_error('chkall', '<span class="php-error"  style="color:#f00;">', '</span>'); ?>
                                           <span class="php-error" id="chkall_msg" style="color:#f00;"></span>
                                        </div>-->
                                        <div class="form-group" id="all1">
                                            <label for="exampleInputPassword1">  To :</label>
                                            <input type="text" class="form-control" name="to" id="to"/>
                                            <?php echo form_error('to', '<span class="php-error" style="color:#f00;">', '</span>'); ?>
                                            <span class="php-error" id="to_msg" style="color:#f00;"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1"><em class="star_red">*</em> Subject :</label>
                                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required="required">
                                            <?php echo form_error('subject', '<span class="php-error" style="color:#f00;">', '</span>'); ?>
                                            <span class="php-error" id="subject_msg" style="color:#f00;"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1" id="codeTitle"><em class="star_red">*</em>Massege :</label>
                                            <!--<textarea class="form-control" name="message" id="message"></textarea>-->
                                            <textarea id="editor1" name="editor1" rows="10" cols="80"> </textarea>  
                                            <?php echo form_error('message', '<span class="php-error"  style="color:#f00;">', '</span>'); ?>
                                            <span class="php-error" id="message_msg" style="color:#f00;"></span>
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
         <script src="js/AdminLTE/demo.js" type="text/javascript"></script>      
         <script src="<?= base_url();?>assets/js/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>  
          <script type="text/javascript">
            $(function() {
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace('editor1');
                //bootstrap WYSIHTML5 - text editor
                $(".textarea").wysihtml5();
            });
        </script>
    </body>
</html>
<script type="text/javascript">    
    </body>
</html> 

<script>
     function allUser(){
		 alert("hello");
		 	if(document.getElementById("chkall").checked){
				//alert('yes');
				document.getElementById("all1").style.visibility="hidden";
			}else{
				//alert('no');
		       document.getElementById("all1").style.visibility="visible";
			}
	 }
	 
	 
	 
	/*$("#chkall").click(function(){
  alert("The paragraph was clicked.");
}); */


</script>


<script>
var xmlhttp;
function checkEmail(str){
	var email = document.getElementById("email").value;
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	if(email ==""){
		document.getElementById("email_msg").innerHTML='';	
	}
	else if(reg.test(email)== false){
		document.getElementById("email_msg").innerHTML='<div class="error-inner">Invalid e-mail address</div>';
	
	}	
	else{
		
		if (window.XMLHttpRequest) 
		{
			xmlhttp=new XMLHttpRequest();
		}
		else 
		{
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200) 
			{
				if(xmlhttp.responseText=="No")
				document.getElementById("email_msg").innerHTML='<div class="error-left"></div><div class="error-inner">Email already exist!</div>';	
				else 
				document.getElementById("email_msg").innerHTML='<div style="color:#3C3;">Email Available!</div>';
			}
		}
		xmlhttp.open("GET","<?= base_url();?>index.php/users/checkEmail?email="+email,true);
		xmlhttp.send();	
		
		document.getElementById("email_msg").innerHTML="";
	}
}

</script> 
