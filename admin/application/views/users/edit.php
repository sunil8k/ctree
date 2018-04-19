<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CompareTree Admin Panel</title>
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
                        Edit Customer Profile
                        <!--<small>Preview</small>-->
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                       
                            <!-- general form elements -->
                            <div class="box box-primary">
                                
                                 <?php if($this->session->flashdata('success')){ ?>
                                <div class="alert alert-success alert-dismissable" style="width:98%;">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Alert!</b> <?php echo $this->session->flashdata('success'); ?>
                                    </div>
                                    <?php } ?>
                                
                                 <?php
									echo form_open_multipart('users/saveEdit', array('name' => 'change','onsubmit'=>'return validation();')); 
									?>
                                    
                                    <div class="box-body">
                                         <div class="form-group">
                                            <label for="exampleInputEmail1"> First Name :</label>
                                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" require="require" value="<?php echo set_value('first_name',$data['first_name']); ?>">
                                           <?php echo form_error('fname', '<span class="php-error"  style="color:#f00;">', '</span>'); ?>
                                           <span class="php-error" id="fname_msg" style="color:#f00;"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1"> Last Name :</label>
                                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="<?php echo set_value('last_name',$data['last_name']); ?>">
                                            <?php echo form_error('lname', '<span class="php-error" style="color:#f00;">', '</span>'); ?>
                                            <span class="php-error" id="lname_msg" style="color:#f00;"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1"><em class="star_red">*</em> Email :</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="E-Mail" autocomplete="off" onkeyup="checkEmail(<?php echo $data['id']; ?>)" value="<?php echo set_value('email',$data['email']); ?>">
                                            <?php echo form_error('email', '<span class="php-error"  style="color:#f00;">', '</span>'); ?>
                                            <span class="php-error" id="email_msg" style="color:#f00;"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1"><em class="star_red">*</em> Mobile :</label>
                                            <input type="number" class="form-control" id="mobile" name="mobile" placeholder="Mobile No" autocomplete="off"  value="<?php echo set_value('mobile',$data['mobile']); ?>">
                                            <?php echo form_error('mobile', '<span class="php-error"  style="color:#f00;">', '</span>'); ?>
                                            <span class="php-error" id="mobile_msg" style="color:#f00;"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1"><em class="star_red">*</em> Password :</label>
                                            <input type="number" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off"  value="<?php echo set_value('password',$data['password_text']); ?>">
                                            <?php echo form_error('password', '<span class="php-error"  style="color:#f00;">', '</span>'); ?>
                                            <span class="php-error" id="password_msg" style="color:#f00;"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1"><em class="star_red">*</em> Gender :</label>
                                            <label >Male<input type="radio" class="form-control" id="gender_m" name="gender" <?php echo ($data['gender']=='male')?('checked'):(''); ?>   value="male"></label>
                                            <label >Female
                                            <input type="radio" class="form-control" id="gender_f" name="gender" <?php echo ($data['gender']=='female')?('checked'):(''); ?>  value="female"></label><?php //echo set_value('gender',$data['gender']); ?>
                                            <?php echo form_error('gender', '<span class="php-error"  style="color:#f00;">', '</span>'); ?>
                                            <span class="php-error" id="gender_msg" style="color:#f00;"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1"><em class="star_red">*</em> Marital Status :</label>
                                            <label >Single &nbsp;
                                            <input type="radio" class="form-control" id="single" name="marital" <?php echo ($data['marital']=='single')?('checked'):(''); ?>   value="single"></label>
                                            <label >Married &nbsp;
                                            <input type="radio" class="form-control" id="married" name="marital" <?php echo ($data['marital']=='married')?('checked'):(''); ?>  value="married"></label>
                                            <?php echo form_error('marital', '<span class="php-error"  style="color:#f00;">', '</span>'); ?>
                                            <span class="php-error" id="marital_msg" style="color:#f00;"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1"><em class="star_red">*</em> Is Delete :</label>
                                            
                                            <input type="checkbox" class="form-control" id="is_delete" name="is_delete" <?php echo ($data['is_delete'])?('checked'):(''); ?>   value="1">
                                            <?php echo form_error('is_delete', '<span class="php-error"  style="color:#f00;">', '</span>'); ?>
                                            <span class="php-error" id="is_delete_msg" style="color:#f00;"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1"><em class="star_red">*</em> Status :</label>
                                            
                                            <input type="checkbox" class="form-control" id="status" name="status" <?php echo ($data['status'])?('checked'):(''); ?>   value="1">
                                            <?php echo form_error('status', '<span class="php-error"  style="color:#f00;">', '</span>'); ?>
                                            <span class="php-error" id="status_msg" style="color:#f00;"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1"><em class="star_red">*</em> Change Profile Pic :</label>
                                            
                                            <input type="file" class="form-control" id="image" name="image">
                                        </div>
                                        
                                       
                                        
                                       <input type="hidden" id="id" name="id" value="<?php echo $this->input->get_post('id'); ?>">
                                       <input type="hidden" id="view" name="view" value="<?php echo $this->input->get_post('view'); ?>">
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
<script>
	function reloadPage(){
		window.location='<?= base_url();?>index.php/users/saveUser';
		
	  /*document.getElementById("username_msg").innerHTML="";
	  document.getElementById("name_msg").innerHTML="";
	  document.getElementById("email_msg").innerHTML="";
	  document.getElementById('profile_image_msg').innerHTML = "";
	  document.getElementById("country_msg").innerHTML="";
	  document.getElementById("city_msg").innerHTML="";*/
	  }
	  
	function isletter(txt)
		{
			 var iChars = "!@#$^&*()+=-[]\\\';,./{}|\":<>?0123456789";
			 var chk =1;
			 for (var i = 0; i < txt.length; i++) {
				if (iChars.indexOf(txt.charAt(i)) != -1) {
				 chk=0;
					}
				}
			 if(chk){
			 return true;
			 }else{
			 return false;
			 }
		}  
	  
 
 
  function dfgsvalidation()
	 {
		// alert("hello");
		var flag=0;
		var mobile = document.getElementById("mobile").value;	
	    if(mobile ==""){
		document.getElementById("mobile_msg").innerHTML='<div class="error-left"></div><div class="error-inner">This field is required.</div>';	
		flag=1;
		}else {
		document.getElementById("mobile_msg").innerHTML="";
		}
		
		
		
	    if(document.getElementById("first_name").value ==""){
		document.getElementById("fname_msg").innerHTML='<div class="error-left"></div><div class="error-inner">This field is required .</div>';	
		flag=1;
		}else if(!isletter(document.getElementById("first_name").value)){
		document.getElementById("fname_msg").innerHTML='<div class="error-left"></div><div class="error-inner">Invalid Name.</div>';	
		flag=1;
		}else{
		document.getElementById("fname_msg").innerHTML="";
		}
		
		if(document.getElementById("last_name").value ==""){
		document.getElementById("lname_msg").innerHTML='<div class="error-left"></div><div class="error-inner">This field is required .</div>';	
		flag=1;
		}else if(!isletter(document.getElementById("last_name").value)){
		document.getElementById("lname_msg").innerHTML='<div class="error-left"></div><div class="error-inner">Invalid Name.</div>';	
		flag=1;
		}else{
		document.getElementById("lname_msg").innerHTML="";
		}
		
		
		
		var email = document.getElementById("email").value;
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	    if(email ==""){
		document.getElementById("email_msg").innerHTML='<div class="error-left"></div><div class="error-inner">This field is required .</div>';	
			flag=1;
		}else if(reg.test(email)== false){
		document.getElementById("email_msg").innerHTML='<div class="error-left"></div><div class="error-inner">Invalid e-mail address.</div>';	
        flag=1;
          }	else{
		document.getElementById("email_msg").innerHTML="";
			}
		
		
		/*var password = document.getElementById("password").value;
		var cpassword = document.getElementById("cpassword").value;	
	    if(password ==""){
		document.getElementById("password_msg").innerHTML='<div class="error-left"></div><div class="error-inner">This field is required.</div>';	
		flag=1;
		}else {
		document.getElementById("password_msg").innerHTML="";
		}
		if(password != cpassword){
		    document.getElementById("cpassword_msg").innerHTML='<div class="error-left"></div><div class="error-inner">Password not match.</div>';	
		    flag=1;
		}else{
			document.getElementById("cpassword_msg").innerHTML="";
		}*/
		
		
		
		var image = document.getElementById('image').value; 
		var imageLength = image.length;
		var imageDot = image.lastIndexOf(".");
		var imageType = image.substring(imageDot,imageLength);
		if(image == ""){
			document.getElementById('image_msg').innerHTML = "Plz select Image"; 
			flag = 1;
		}else if(image)
		if((imageType==".jpg")||(imageType==".jpeg")||(imageType==".gif")||(imageType==".png")) {
		document.getElementById('image_msg').innerHTML = "";
		}else {
		flag = 1;
		document.getElementById('image_msg').innerHTML = "Invalid file format"; 
		}
				
		  
		
		  
		/*if(document.getElementById("address").value ==""){
		document.getElementById("address_msg").innerHTML='<div class="error-left"></div><div class="error-inner">This field is required.</div>';	
		flag=1;
		}else{
		document.getElementById("address_msg").innerHTML="";
		}*/
		
		
		
		
		if(document.getElementById("mobile").value ==""){
		document.getElementById("mobile_msg").innerHTML='<div class="error-left"></div><div class="error-inner">This field is required.</div>';	
		flag=1;
		}else{
		document.getElementById("mobile_msg").innerHTML="";
		}
		if(document.getElementById("user_type").value ==""){
		document.getElementById("user_type_msg").innerHTML='<div class="error-left"></div><div class="error-inner">This field is required.</div>';	
		flag=1;
		}else{
		document.getElementById("user_type_msg").innerHTML="";
		}
		
		
			
			
				
			if(flag==0)
			{
			return true;
				}else{
					
				
			return false;
				}
    }

</script>