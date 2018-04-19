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
                        Edit Leads
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
									echo form_open_multipart('leads/update', array('name' => 'change','onsubmit'=>'return validation();')); 
									?>
                                    
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"> SKU :</label>
                                            <input type="text" class="form-control" id="sku" name="sku" placeholder="SKU" readonly  value="<?php echo set_value('sku',$result->sku); ?>" />
                                            <?php echo form_error('sku_l', '<span class="php-error"  style="color:#f00;">', '</span>'); ?>
                                            <span class="php-error" id="sku_msg" style="color:#f00;"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1"><em class="star_red">*</em> Section :</label>
                                            <select name="section" id="section" class="form-control" onchange="salesUser();">
                                              <option value="0">Select Section</option>
                                              <?php foreach($sections as $section) { ?>
                                              <option value="<?php echo $section->id;?>" <?php echo ($section->id == $result->section_id)?('selected'):('');?>><?php echo $section->section;?></option>
                                              <?php } ?>
                                            </select>
                                             <?php echo form_error('lsection', '<span class="php-error"  style="color:#f00;">', '</span>'); ?>
                                             <span class="php-error" id="section_msg" style="color:#f00;"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1"><em class="star_red">*</em> Section :</label>
                                            <select name="category" id="category" class="form-control" onchange="getCategory(this.id);">
                                                <option value="0">Select Section</option>
                                                <?php foreach($categorys as $category) { ?>
                                                <option value="<?php echo $category->id;?>" <?php echo ($category->id == $result->category_id)?('selected'):('');?>><?php echo $category->category;?></option>
                                                <?php } ?>
                                            </select>
                                            <?php echo form_error('lcategory', '<span class="php-error"  style="color:#f00;">', '</span>'); ?>
                                            <span class="php-error" id="category_msg" style="color:#f00;"></span>
                                        </div>
                                        <?php foreach($details as $detail) {?>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1"> <?php echo $detail->lead_key;?> :</label>
                                            <input type="text" class="form-control" id="detail[<?php echo $detail->lead_key;?>]" name="detail[<?php echo $detail->lead_key;?>]" value="<?php echo $detail->lead_value;?>">
                                            
                                        </div>
                                        <?php } ?>         

                                        
                                       <input type="hidden" id="id" name="id" value="<?php echo $this->input->get_post('id'); ?>">
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