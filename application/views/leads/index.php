<?php $this->load->view("layout/header");?>
<body id="body_leads" class="at-page site itemid-102 at-quote">
    	<div id="at-page-wrapper">
            <div class="row" id="flex-container">
                <div id="main-left-container" class="col-sm-3 col-lg-3 col-xl-3 col-md-3 left-sidebar mCustomScrollbar">
                    <div class="inner-left-sidebar">
                        <div class="inner-block">
                            <div class="quate-left-header-wrap text-center at-paddingT20 at-paddingB20">
                                <a class="navbar-brand" href="<?= base_url();?>index.php"><img src="<?= base_url();?>assets/images/white_logo.png" class="img-fluid" alt="Compare Tree" width="250px"></a>
                            </div>
                            <div id="left-sectioninfo">
                            	<p>Section Details</p>
                            </div>
                    		<div id="left-basicinfo">
                                        <?php if(!($this->session->userdata('id'))) {?>
                              <ul id="ul-contact">
                                <div class="title-wrap">Contact Detail</div>
                              </ul>
                              <?php }?>
                              <ul id="ul-basicinfo">
                                <li><div class="title-wrap">Basic Info</div></li>                                
                              </ul>
                              <ul id="ul-address">
                                <div class="title-wrap">Address Detail</div>                                
                              </ul>
                              <ul id="ul-category">
                                <div class="title-wrap">Section Category</div>
                              </ul>
                              <ul id="ul-section">
                                <div class="title-wrap">Section Detail</div>
                              </ul>
                            </div>

                        </div>                        
                    </div>
                </div>
                <div id="main-right-container" class="col-sm-12 col-lg-9 col-xl-9 col-md-9 right-content">
                    <div class="inner-right-content">
                        <div class="inner-block at-paddingB15">
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:5%"> 5% Complete </div>
                            </div> 
                            <div id="question-container" class="row">
                                <div id="left-question-container" class="col-sm-12 col-lg-8 col-xl-8 col-md-8 inner-left-question-container">
                                    <div class="head">
                                        <h1 id="container-heading"><?php echo $this->session->userdata('id')?'Basic Information':'Contact Informations';?></h1>
                                    </div>
                                    <div class="form-step-container">
                                        <form action="<?=base_url()?>index.php/leads/save" method="post" name="leadForm" >
                                        <div class="form-container">
                                        <?php if(!($this->session->userdata('id'))) {?>
                                        	<div id="contact-container" class="step-wrap" style="display:;">
                                            	<div class="section-contact">
                                                    <div class="heading at-paddingB15" style="display:none;">
                                                        <h1 id="contact-container-heading">Contact Information?</h1>
                                                    </div>
                                            	</div>
                                                <div id="contact-email" class="at-marginT25">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-lg-6 col-xl-6 col-md-6">
                                                            <div class="form-group">
                                                                <label for="first_name">Email</label>
                                                                <input placeholder="Email" id="email" name="email" class="form-control" onKeyUp="checkEmail(this.value)"  type="text"><span id="email_txt"></span>
                                                                <div id="sendPin_btn"><a onClick="sendPin()">Send Pin</a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-lg-6 col-xl-6 col-md-6">
                                                             <div class="form-group">
                                                                <label for="last_name">Validate your mail</label>
                                                                <input placeholder="Fill Valid pin" id="pin" name="pin" class="form-control" onKeyUp="validatePin(this.value)"  type="text"><span id="pin_txt"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="confirm-button-email" class="action-buttons at-marginT20">
                                                        <input type="hidden" name="email_val" id="email_val" value="0"  />
                                                        <input type="hidden" name="pin_val" id="pin_val" value="0"  />
                                                        <a class="btn btn-primary savenext" id="contact-email-btn"  title="contact">Save &amp; Continue</a>
                                                    </div>
                                                </div>
                                                    
                                                <div id="contact-mobile" class="at-marginT25" style="display:none">
                                                
                                                    <div class="row">
                                                        <div class="col-sm-12 col-lg-6 col-xl-6 col-md-6">
                                                             <div class="form-group">
                                                                <label for="last_name">Username</label>
                                                                <input placeholder="Username" id="username" name="username" class="form-control" onKeyUp="checkUsername(this.value)"  type="text"><span id="username_txt"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-lg-6 col-xl-6 col-md-6">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1"><em class="star_red">*</em> Mobile :</label>
                                                                <input class="form-control" id="mobile" name="mobile" placeholder="Length of Residence" type="text">
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    <div id="confirm-button-mobile" class="action-buttons at-marginT20">
                                                        <input type="hidden" name="username_val" id="username_val" value="0"  />
                                                        <a class="btn btn-primary savenext" id="contact-mobile-btn"  title="contact">Save &amp; Continue</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                            <div id="basicinfo-container" class="step-wrap" style="display:<?php echo $this->session->userdata('id')?'':'none';?>;">
                                                <div class="section-address">
                                                    <div class="form-option" id="basicinfo-name">
                                                        <div class="heading at-paddingB15" style="display:none;">
                                                            <h1 id="basicinfo-container-heading">Basic Information</h1>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12 col-lg-6 col-xl-6 col-md-6">
                                                                <div class="form-group">
                                                                    <label for="first_name">Customer Name</label>
                                                                    <input placeholder="First Name" id="first_name" name="first_name" class="form-control"  type="text"><span></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-lg-6 col-xl-6 col-md-6">
                                                                 <div class="form-group">
                                                                    <label for="last_name">Last Name</label>
                                                                    <input placeholder="Last Name" id="last_name" name="last_name" class="form-control"  type="text"><span></span>
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
                                                        <div id="confirm-button14" class="action-buttons at-marginT20">
                                                            <a class="btn btn-primary savenext" id="address-zip-btn"  title="address">Save &amp; Continue</a>
                                                        </div>
                                                    </div>                                                
                                            	</div>
                                            </div>
                                            
                                            <div id="category-container" class="step-wrap" style="display:none;">
                                               	<div class="section-category">
                                                    <div class="heading at-paddingB15" style="display:none;">
                                                        <h1 id="category-container-heading">Choose Your Categories</h1>
                                                    </div>
                                                    <div class="form-option" id="category-category" style="display:;">
                                                        <div class="row">
                                                            <div id="datad" style="width:100%;">
                                                                <div class="form-group" id="aaatexttt123" style="clear:both;">
                                                                    <label for="exampleInputEmail1"><em class="star_red">*</em> Category:</label>
                                                                    <select class="form-control catRm" name="parent[]" id="tt123" require="require" onChange="parentCategory(this.value,'tt123')">
                                                                        <option value="0">Category</option>
                                                                        <?php foreach($results as $result) {?>
                                                                        <option value="<?php echo $result->id;?>"><?php echo $result->category;?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                    <?php echo form_error('parent1', '<span class="php-error"  style="color:#f00;">', '</span>'); ?>
                                                                    <span class="php-error" id="parent1_msg" style="color:#f00;"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="confirm-button144" class="action-buttons at-marginT20">
                                                            <a class="btn btn-primary savenext" id="category-category-btn"  title="category">Save &amp; Continue</a>
                                                        </div>
                                                    </div>
                                               	</div>
                                            </div>
                                            
                                            <div id="section-container" class="step-wrap" style="display:none;">
                                               <?php echo $sectionHtml[0]->html;?>
                                            </div>
                                            
                                            
                                            
                                            <div id="leadsave-container" class="step-wrap" style="display:none;">
                                            	<div class="section-leadsave">
                                                    <div class="heading at-paddingB15" style="display:none;">
                                                        <h1 id="leadsave-container-heading">Save Information?</h1>
                                                    </div>
                                            	</div>
                                                <div id="leadsave-save" class="at-marginT25">
                                                    <div id="confirm-button-leadsave" class="action-buttons at-marginT20">
                                                        <input type="hidden" value="<?php echo $this->input->get_post('section');?>" name="section_id" >
                                                        <button type="submit" name="save" >Submit Information.</button>
                                                    </div>
                                                </div>
                                                    
                                                
                                            </div>
                                            
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                <div id="side-questions-container" class="col-sm-12 col-lg-4 col-xl-4 col-md-4 inner-side-questions-container">
                                    <div class="agent-wrap">
                                        <span class="intro-wrap">Speak with an agent</span> 
                                        <span class="number-wrap">855.578.3601</span>
                                        <div class="reps-wrap">
                                            <span class="greenDot"></span> Reps available now
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    	</div>
        <?php $this->load->view("layout/footer");?>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" async defer src="<?=base_url()?>assets/js/leadform.js"></script>
        
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
    </body>
</html>