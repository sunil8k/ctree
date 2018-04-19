<?php
//session_start();
//if(isset($_SESSION['id'])){
$this->load->view("layout/header");

?>

<!--Menu Close-->

<!--Detail Strip-->
<!--<div id="detail_strip_p">
<div id="detail_strip">
<div class="detail_strip">

<p>User Details</p>

</div>
</div>
</div>-->
<!--Detail Strip-->

<!--Container-->

<div id="container">
  <div class="content">
  <?php
$this->load->view("layout/left_content");

?>
   
    <style>
.php-error{line-height:13px !important; margin-top:5px;}
</style>
    <div class="left_content right">
      <div class="user_panel">
        <div class="detail_container ">
          <div class="head_cont">
            <h2 class="userIcon_grd">
              <table width="99%">
                <tr>
                  <td width="50%">Create User</td>
                  <td><span style="color:#093; font-size:12px;"><?php echo $this->session->flashdata('success'); ?></span></td>
                </tr>
              </table>
            </h2>
          </div>
          <div class="grid_container">
            <table width="98%" cellpadding="0" cellspacing="2" class="tab_field">
              <tr valign="top"> 
                <!--<td width="15%" align="right"><strong>Use Avatar:</strong></td>-->
                
                <td width="15%"></td>
                
                <!-- <td align="left" valign="bottom"><button type="submit" class="profile_button">Select Image</button></td>--> 
              </tr>
            </table>
            <?php
    echo form_open_multipart('users/saveUser', array('name' => 'create','onsubmit'=>'return validation();')); 
	//echo   $data[0]['username']; 
    ?>
            <fieldset class="field_profile" >
              <legend>Personal Detail</legend>
              <table width="98%" cellpadding="0" cellspacing="2" class="tab_field">
               <tr>
                  <td valign="top" align="right" width="18%"><strong><em class="star_red">*</em> First Name :</strong></td>
                  <td valign="top" style="padding-top:5px;" ><input type="text" class="reg_txt" name="fname" id="fname"/>
                    <br/>
                    <?php echo form_error('fname', '<span class="php-error"  style="color:#f00;">', '</span>'); ?><span class="php-error" id="fname_msg" style="color:#f00;"></span></td>
                  <td valign="top" align="right"><strong><em class="star_red">*</em> Last Name :</strong></td>
                  <td valign="top" style="padding-top:5px;" ><input type="text" class="reg_txt" name="lname" id="lname"/>
                    <br/>
                    <?php echo form_error('lname', '<span class="php-error" style="color:#f00;">', '</span>'); ?><span class="php-error" id="lname_msg" style="color:#f00;"></span></td>
                  <br/>
                </tr>
                <tr>
                  <td valign="top" align="right" width="18%"><strong><em class="star_red">*</em> User Name :</strong></td>
                  <td valign="top" style="padding-top:5px;" ><input type="text" class="reg_txt" name="username" id="username"/>
                    <br/>
                    <?php echo form_error('username', '<span class="php-error" style="color:#f00;">', '</span>'); ?><span class="php-error" id="username_msg" style="color:#f00;"></span></td>
                  <td valign="top" align="right" width="18%"><strong><em class="star_red">*</em> Email :</strong></td>
                  <td valign="top" style="padding-top:5px;" ><input type="text" class="reg_txt" name="email" id="email"/>
                    <br/>
                    <?php echo form_error('email', '<span class="php-error"  style="color:#f00;">', '</span>'); ?><span class="php-error" id="email_msg" style="color:#f00;"></span></td>
                </tr>
                 <tr>
                  <td valign="top" align="right" width="18%"><strong><em class="star_red">*</em> Password :</strong></td>
                  <td valign="top" style="padding-top:5px;" ><input type="password" class="reg_txt" name="password" id="password"/>
                    <br/>
                    <?php echo form_error('password', '<span class="php-error"  style="color:#f00;">', '</span>'); ?><span class="php-error" id="password_msg" style="color:#f00;"></span></td>
                  <td valign="top" align="right"><strong><em class="star_red">*</em> Confirm Password :</strong></td>
                  <td valign="top" style="padding-top:5px;" ><input type="password" class="reg_txt" name="cpassword" id="cpassword"/>
                    <br/>
                    <?php echo form_error('cpassword', '<span class="php-error" style="color:#f00;">', '</span>'); ?><span class="php-error" id="cpassword_msg" style="color:#f00;"></span></td>
                  <br/>
                </tr>
                <tr>
                  <td valign="bottom" align="right" width="18%"><strong><em class="star_red">*</em> Gender :</strong></td>
                  <td valign="bottom" style="padding-top:5px;" >Male<input type="radio" name="gender" id="gender" value="Male"  />&nbsp; Female<input type="radio" name="gender" id="gender" value="Female" select="select" />
                    <br/>
                    <?php echo form_error('gender', '<span class="php-error"  style="color:#f00;">', '</span>'); ?><span class="php-error" id="language_msg" style="color:#f00;"></span></td>
                  <td valign="top" align="right"><strong><em class="star_red">*</em> Profile Image :</strong></td>
                  <td valign="top" style="padding-top:5px;" ><input type="file" class="reg_txt" name="image" id="image"/>
                    <br/>
                    <?php echo form_error('image', '<span class="php-error" style="color:#f00;">', '</span>'); ?><span class="php-error" id="image_msg" style="color:#f00;"></span></td>
                  <br/>
                </tr>
                
                <tr>
                  <td valign="bottom" align="right" width="18%"><strong><em class="star_red">*</em> User Type :</strong></td>
                  <td valign="bottom" style="padding-top:5px;" ><select name="user_type" id="user_type" class="reg_txt">
                  <option value="">Select</option>
                  <option value="admin">Admin</option>
                  <option value="sub_admin">Sub Admin</option>
                  <option value="sales_member">Sales Member</option>
                  <option value="member">Member</option>
                  </select>
                    <br/>
                    <?php echo form_error('user_type', '<span class="php-error"  style="color:#f00;">', '</span>'); ?><span class="php-error" id="user_type_msg" style="color:#f00;"></span></td>
                  
                 
                </tr>
                
                <tr>
                  <td align="right"></td>
                  <td align="right"></td>
                  <td></td>
                </tr>
              </table>
            </fieldset>
            <fieldset class="field_profile" >
              <legend>Contact Detail</legend>
              <table width="98%" cellpadding="0" cellspacing="2" class="tab_field">
                <tr>
                  <td valign="top" align="right" width="18%"><strong><em class="star_red">*</em> Address :</strong></td>
                  <td valign="top" style="padding-top:5px;"  width="26%"><input type="text" class="reg_txt" name="address" id="address"/>
                    <br/>
                    <?php echo form_error('address', '<span class="php-error" style="color:#f00;">', '</span>'); ?><span class="php-error" id="address_msg" style="color:#f00;"></span></td>
                  <td valign="top" align="right" width="15%"><strong><em class="star_red">*</em> Country :</strong></td>
                  <td valign="top" style="padding-top:5px;" >
                  <select name="country" id="country" class="reg_txt">
                  <option>Select</option>
                  <?php foreach($data as $datas){ ?>
                  <option value="<?php echo $datas['name'] ?>"><?php echo $datas['name'] ?></option>
                  <?php } ?>
                  <option value="other">Other</option>
                  </select>
                    <br/>
                    <?php echo form_error('city_id', '<span class="php-error" style="color:#f00;">', '</span>'); ?><span class="php-error" id="city_id_msg" style="color:#f00;"></span></td>
                </tr>
                 <tr>
                   <td valign="top" align="right" width="18%"><strong><em class="star_red">*</em> Mobile No :</strong></td>
                  <td valign="top" style="padding-top:5px;" ><input type="text" class="reg_txt" name="mobile" id="mobile"/>
                    <br/>
                    <?php echo form_error('mobile', '<span class="php-error"  style="color:#f00;">', '</span>'); ?><span class="php-error" id="mobile_msg" style="color:#f00;"></span></td>
                  <td valign="top" align="right" width="15%"><strong><em class="star_red">*</em> Postal Code :</strong></td>
                  <td valign="top" style="padding-top:5px;" ><input type="text" class="reg_txt" name="postalcode" id="postalcode"/>
                    <br/>
                    <?php echo form_error('postalcode', '<span class="php-error" style="color:#f00;">', '</span>'); ?><span class="php-error" id="postalcode_msg" style="color:#f00;"></span></td>
                </tr>
                <!--<input type="hidden" name="id" value="<?php //echo $data['id'];?>" />-->
              </table>
            </fieldset>
            </p>
            <br />
            <p align="center">
              <button class="profile_button">Submit</button>
              <!--<input type="reset"  value="Reset" class="profile_button" />-->
              <button type="reset" onclick="reloadPage()" class="profile_button">&nbsp; Reset</button>
            </p>
            <?php
    echo form_close();
    ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
$this->load->view("layout/footer");
//}else{
//redirect('login/index'); 

//}
?>
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
	  
 
 
  function validation()
	 {
		// alert("hello");
		var flag=0;
		var username = document.getElementById("username").value;	
	    if(username ==""){
		document.getElementById("username_msg").innerHTML='<div class="error-left"></div><div class="error-inner">This field is required.</div>';	
		flag=1;
		}else {
		document.getElementById("username_msg").innerHTML="";
		}
		
		
		
	    if(document.getElementById("fname").value ==""){
		document.getElementById("fname_msg").innerHTML='<div class="error-left"></div><div class="error-inner">This field is required .</div>';	
		flag=1;
		}else if(!isletter(document.getElementById("fname").value)){
		document.getElementById("fname_msg").innerHTML='<div class="error-left"></div><div class="error-inner">Invalid Name.</div>';	
		flag=1;
		}else{
		document.getElementById("fname_msg").innerHTML="";
		}
		
		if(document.getElementById("lname").value ==""){
		document.getElementById("lname_msg").innerHTML='<div class="error-left"></div><div class="error-inner">This field is required .</div>';	
		flag=1;
		}else if(!isletter(document.getElementById("lname").value)){
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
		
		
		var password = document.getElementById("password").value;
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
		}
		
		
		
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
				
		  
		
		  
		if(document.getElementById("address").value ==""){
		document.getElementById("address_msg").innerHTML='<div class="error-left"></div><div class="error-inner">This field is required.</div>';	
		flag=1;
		}else{
		document.getElementById("address_msg").innerHTML="";
		}
		
		
		
		
		if(document.getElementById("mobile").value ==""){
		document.getElementById("mobile_msg").innerHTML='<div class="error-left"></div><div class="error-inner">This field is required.</div>';	
		flag=1;
		}else{
		document.getElementById("mobile_msg").innerHTML="";
		}
		
		
		if(document.getElementById("city_id").value ==""){
		document.getElementById("city_id_msg").innerHTML='<div class="error-left"></div><div class="error-inner">This field is required.</div>';	
		flag=1;
		}else{
		document.getElementById("city_id_msg").innerHTML="";
		}
		
		
		if(document.getElementById("postalcode").value ==""){
		document.getElementById("postalcode_msg").innerHTML='<div class="error-left"></div><div class="error-inner">This field is required.</div>';	
		flag=1;
		}else{
		document.getElementById("postalcode_msg").innerHTML="";
		}
			
			
				
			if(flag==0)
			{
			return true;
				}else{
					
				
			return false;
				}
    }

</script>