
                                <div id="left-question-container" class="col-sm-12 col-lg-8 col-xl-8 col-md-8 inner-left-question-container">
                                    <div class="head">
                                        <h1 id="container-heading">Registration</h1>
                                    </div>
                                    <div class="form-step-container">
                                        <form action="<?=base_url()?>index.php/customer/save" method="post" name="leadForm" >
                                        <div class="form-container">
                                        	
                                            <div id="basicinfo-container" class="step-wrap" style="display:;">
                                                <div class="section-address">
                                                    <div class="form-option" id="basicinfo-name">
                                                        <div class="heading at-paddingB15" style="display:none;">
                                                            <h1 id="basicinfo-container-heading">Basic Information?</h1>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12 col-lg-6 col-xl-6 col-md-6">
                                                                <div class="form-group">
                                                                    <label for="first_name">First Name</label>
                                                                    <input placeholder="First Name" id="first_name" name="first_name" class="form-control"  type="text"><span></span>
                                                                </div>
                                                            </div>
                                                        </div>                                                        
                                                        <div class="row">
                                                            <div class="col-sm-12 col-lg-6 col-xl-6 col-md-6">
                                                                 <div class="form-group">
                                                                    <label for="last_name">Last Name</label>
                                                                    <input placeholder="Last Name" id="last_name" name="last_name" class="form-control"  type="text"><span></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row">
                                                            <div class="col-sm-12 col-lg-6 col-xl-6 col-md-6">
                                                                <div class="form-group">
                                                                    <label for="first_name">Email</label>
                                                                    <input placeholder="Email" id="email" name="email" class="form-control" onkeyup="checkEmail(this.value)"  type="text"><span id="email_txt"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12 col-lg-6 col-xl-6 col-md-6">
                                                                 <div class="form-group">
                                                                    <label for="last_name">Username</label>
                                                                    <input placeholder="Username" id="username" name="username" class="form-control" onkeyup="checkUsername(this.value)"  type="text"><span id="username_txt"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12 col-lg-6 col-xl-6 col-md-6">
                                                                 <div class="form-group">
                                                                    <label for="last_name">Mobile</label>
                                                                    <input placeholder="Mobile" id="mobile" name="mobile" class="form-control"  type="text"><span></span>
                                                                    <input type="hidden" name="email_val" id="email_val" value="0"  />
                                                                    <input type="hidden" name="username_val" id="username_val" value="0"  />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="confirm-button1" class="action-buttons at-marginT20">
                                                            <a class="btn btn-primary savenext" id="basicinfo-name-btn" charset="first_name" title="basicinfo">Save &amp; Continue</a>
                                                        </div>
                                                    </div>
                                                    <div class="form-option" id="basicinfo-dob" style="display:none;">
                                                        <div class="row">
                                                            <div class="col-sm-12 col-lg-6 col-xl-6 col-md-6">
                                                                <div class="form-group">
                                                                    <label for="first_name">Birth Day</label>
                                                                    <input placeholder="Date of Birth" id="dob" name="dob" maxlength="10" class="form-control"  type="text" onKeyUp="checkDob(this.value)">
                                                                    <span>*Year-Month-Day</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="confirm-button2" class="action-buttons at-marginT20">
                                                            <a class="btn btn-primary savenext"  id="basicinfo-dob-btn" charset="dob"  title="basicinfo">Save &amp; Continue</a>
                                                        </div>
                                                    </div>
                                                    <div class="form-option" id="basicinfo-gender"  style="display:none;">
                                                        <div class="row">
                                                            <div class="col-sm-12 col-lg-6 col-xl-6 col-md-6">
                                                                <div class="btn-group " id="number_of_stories">
                                                                    <h4 for="Gender">Gender</h4>
                                                                    <label class="btn btn-default btn-default" onClick="genFunc('male')">Male
                                                                        <input value="male" id="male" class="radio" name="gender" type="radio">
                                                                        <span></span>
                                                                    </label>
                                                                    <label class="btn btn-default btn-default" onClick="genFunc('female')">Female
                                                                        <input value="female" id="female" class="radio" name="gender" type="radio">
                                                                        <span></span>
                                                                    </label>
                                                                        
                                                                        <!--<input type="hidden" name="gender" id="gender" value="0" >-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="confirm-button3" class="action-buttons at-marginT20">
                                                            <a class="btn btn-primary savenext" id="basicinfo-gender-btn"  title="basicinfo">Save &amp; Continue</a>
                                                        </div>
                                                    </div>
                                                    <div class="form-option" id="basicinfo-marital" style="display:none;">
                                                        <div class="row">
                                                            <div id="section-garage" class="at-marginT25">
                                                                <div class="btn-group" id="number_of_storie">
                                                                	<h4 id="">Marital Status</h4>
                                                                    <label class="btn btn-default btn-default" onClick="genFunc('marital_no')">No
                                                                        <input value="single" id="marital_no" class="radio" name="marital" type="radio">
                                                                        <span></span>
                                                                    </label>
                                                                    <label class="btn btn-default btn-default" onClick="genFunc('marital_yes')">Yes
                                                                        <input value="married" id="marital_yes" class="radio" name="marital" type="radio">
                                                                        <span></span>
                                                                        
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="confirm-button4" class="action-buttons at-marginT20">
                                                            <a class="btn btn-primary savenext" id="basicinfo-marital-btn"  title="basicinfo">Save &amp; Continue</a>
                                                        </div>
                                                    </div>
                                                    
                                                </div>                                                
                                            </div>
                                            
                                            <div id="address-container" class="step-wrap" style="display:none;">
                                                <div class="section-address">
                                                    <div class="heading at-paddingB15" style="display:none;">
                                                        <h1 id="address-container-heading">What is your address</h1>
                                                    </div>
                                                    <div class="map-wrap at-marginB20">
                                                        <img src="<?= base_url();?>assets/images/map.jpg" class="img-fluid" alt="Map">
                                                    </div>
                                            
                                                    <div class="form-option" id="address-address">
                                                        <div class="row">
                                                            <div class="col-sm-12 col-lg-6 col-xl-6 col-md-6">
                                                                <div class="form-group">
                                                                    <label for="first_name">Address</label>
                                                                    <input placeholder="Address" id="address" name="address" class="form-control"  type="text">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="confirm-button-address" class="action-buttons at-marginT20">
                                                            <a class="btn btn-primary savenext" id="address-address-btn"  title="address">Save &amp; Continue</a>
                                                        </div>
                                                    </div>  
                                                    <div class="form-option" id="address-country" style="display:none;">
                                                        <div class="row">
                                                            <div class="col-sm-12 col-lg-6 col-xl-6 col-md-6">
                                                                <div class="form-group">
                                                                    <label for="first_name">Country</label>
                                                                    <select name="country" id="country"  class="form-control" onChange="fillState(this.value)">
                                                                    <option value="0">Choose Country</option>
                                                                   <?php
																   foreach($countrys as $country) {
																	   ?>
                                                                    <option value="<?php echo $country->id;?>"><?php echo $country->country;?></option>
                                                                    <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="confirm-button-country" class="action-buttons at-marginT20">
                                                            <a class="btn btn-primary savenext" id="address-country-btn"  title="address">Save &amp; Continue</a>
                                                        </div>
                                                    </div>  
                                                    <div class="form-option" id="address-state" style="display:none;">
                                                        <div class="row">
                                                            <div class="col-sm-12 col-lg-6 col-xl-6 col-md-6">
                                                                <div class="form-group">
                                                                    <label for="first_name">State</label>
                                                                    <select name="state" id="state"  class="form-control">
                                                                    <option value="0">Choose State</option>
                                                                   
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="confirm-button-state" class="action-buttons at-marginT20">
                                                            <a class="btn btn-primary savenext" id="address-state-btn"  title="address">Save &amp; Continue</a>
                                                        </div>
                                                    </div>
                                                    <div class="form-option" id="address-city" style="display:none;">
                                                        <div class="row">
                                                            <div class="col-sm-12 col-lg-6 col-xl-6 col-md-6">
                                                                <div class="form-group">
                                                                    <label for="first_name">City</label>
                                                                    <input placeholder="City" id="city" name="city" class="form-control"  type="text" onKeyUp="continent1('city','cityAjax','city','city',this.value,country.value)">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="confirm-button-city" class="action-buttons at-marginT20">
                                                            <a class="btn btn-primary savenext" id="address-city-btn" onClick="genFunc('city')"  title="address">Save &amp; Continue</a>
                                                        </div>
                                                    </div>   
                                            		<div class="form-option" id="address-zip" style="display:none;">
                                                        <div class="row">
                                                            <div class="col-sm-12 col-lg-6 col-xl-6 col-md-6">
                                                                <div class="form-group">
                                                                    <label for="pin">Zip</label>
                                                                    <input placeholder="Zip" id="zip" name="zip" class="form-control"  type="text">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="confirm-button14" class="action-buttons at-marginT20"><!--
                                                            <a class="btn btn-primary savenext" id="address-zip-btn"  title="address">Save &amp; Continue</a>-->
                                                            <button type="submit" name="save" >Save</button>
                                                        </div>
                                                    </div>                                                
                                            	</div>
                                            </div>
                                            
                                          
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                
                                
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" async defer src="http://localhost/<?=base_url()?>assets/js/customerForm.js"></script>
        
       <!--AUTO COMPLETE FUNCTIONALITY START HERE--> 
       <script type="text/javascript">
	   //alert("http://<?php echo $_SERVER['HTTP_HOST'];?><?= base_url();?>assets/js/auto/autocomplete-0.3.0.js");
	   </script>
        <script src="<?= base_url();?>assets/js/auto/autocomplete-0.3.0.js" type="text/javascript"  ></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
		<style>
        ul.ui-autocomplete {
            z-index:30001 !important;  
        }
        .editedCls {
			cursor:pointer;
        }
        </style>
        <script type="text/javascript">
		/*AJAX AUTOCOMPLETE VALUE SET HERE START*/
function continent1(contr,func,id,key,val,county_id) {
	
	var sUrl = baseUrl+'/'+contr+'/'+func+'?'+key+'='+val+'&country='+county_id;
	var dd = '#'+id;
	//alert(dd+'   '+sUrl);	
	$.ajax({
		url: sUrl,
		type:'POST',		
		//	dataType: 'json',
		error: function(){
			//$('#datad').html('<p>goodbye world</p>');
		},		
		success: function(data){
			if(data=="error") {
				//alert('error');
			} 
			else {
					$(dd).autocomplete({
					  source: JSON.parse(data)
					});
				//alert(data);
			}
		} // End of success function of ajax form
	});
}
		</script>
       <!--AUTO COMPLETE FUNCTIONALITY END HERE--> 