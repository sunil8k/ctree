<?php $this->load->view("layout/header");?>
<body id="body_leads" class="at-page site itemid-102 at-quote">
    	<div id="at-page-wrapper">
            <div class="row" id="flex-container">
                <div id="main-left-container" class="col-sm-3 col-lg-3 col-xl-3 col-md-3 left-sidebar mCustomScrollbar">
                    <div class="inner-left-sidebar">
                        <div class="inner-block">
                            <div class="quate-left-header-wrap text-center at-paddingT20 at-paddingB20">
                                <img src="<?= base_url();?>assets/images/white_logo.png" class="img-fluid" alt="Compare Tree" width="250px">
                            </div>
                            <div id="left-sectioninfo">
                            	<p>Section Details</p>
                            </div>
                    		<div id="left-basicinfo">
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
                              <ul id="ul-contact">
                                <div class="title-wrap">Contact Detail</div>
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
                                        <h1 id="container-heading">Basic Informations</h1>
                                    </div>
                                    <div class="form-step-container">
                                        <form action="<?=base_url()?>index.php/leads/save" method="post" name="leadForm" >
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
                                                                    <label for="exampleInputEmail1"><em class="star_red">*</em> Parent :</label>
                                                                    <select class="form-control catRm" name="parent[]" id="tt123" require="require" onChange="parentCategory(this.value,'tt123')">
                                                                        <option value="0">Parent 1</option>
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
                                            
                                            <div id="contact-container" class="step-wrap" style="display:none;">
                                            	<div class="section-contact">
                                                    <div class="heading at-paddingB15" style="display:none;">
                                                        <h1 id="contact-container-heading">Contact Information?</h1>
                                                    </div>
                                            	</div>
                                                <div id="contact-email" class="at-marginT25">
                                                    <div class="row">
                                                        <div class="hidden-xs hidden-sm">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1"><em class="star_red">*</em> Email :</label>
                                                                <input class="form-control" id="email" name="email" placeholder="Length of Residence" type="text">
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    <div id="confirm-button-email" class="action-buttons at-marginT20">
                                                        <a class="btn btn-primary savenext" id="contact-email-btn"  title="contact">Save &amp; Continue</a>
                                                    </div>
                                                </div>
                                                    
                                                <div id="contact-mobile" class="at-marginT25" style="display:none">
                                                    <div class="row">
                                                        <div class="hidden-xs hidden-sm">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1"><em class="star_red">*</em> Mobile :</label>
                                                                <input class="form-control" id="mobile" name="mobile" placeholder="Length of Residence" type="text">
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    <div id="confirm-button-mobile" class="action-buttons at-marginT20">
                                                        <a class="btn btn-primary savenext" id="contact-mobile-btn"  title="contact">Save &amp; Continue</a>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div id="leadsave-container" class="step-wrap" style="display:none;">
                                            	<div class="section-leadsave">
                                                    <div class="heading at-paddingB15" style="display:none;">
                                                        <h1 id="leadsave-container-heading">Generating Leads?</h1>
                                                    </div>
                                            	</div>
                                                <div id="leadsave-save" class="at-marginT25">
                                                    <div id="confirm-button-leadsave" class="action-buttons at-marginT20">
                                                        <input type="hidden" value="<?php echo $this->input->get_post('section');?>" name="section_id" >
                                                        <button type="submit" name="save" >Generate Lead Now.</button>
                                                    </div>
                                                </div>
                                                    
                                                
                                            </div>
                                            
                                        <!--<div id="step-3" class="step-wrap" style="display:none;">
                                                <div class="section-year_built">
                                                    <div class="heading" style="display:none;">
                                                        <h1>Tell us about your property</h1>
                                                    </div>                                                    
                                                </div>
                                                <div id="section-residence_type" class="at-marginT25">
                                                    <h4 id="residencetype_header">How old is your property?</h4>
                                                    <div class="hidden-xs hidden-sm">
                                                        <div class="form-group">
                                                            <input class="form-control" id="year_built" name="year_built" type="text" placeholder="Property Age">
                                                        </div>

                                                        <div class="options-container at-marginB25" id="options-residence">
                                                            <ul>
                                                                <li><a class="box-link"><span class="year-name">New</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">5 years</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">10 years</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">20 years</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">30 years</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">Over 40 years</span></a></li>
                                                            </ul>
                                                        </div>                                                        
                                                    </div>
                                                    <h4 id="residencetype_header">What is the square footage?</h4>
                                                    <div class="hidden-xs hidden-sm">
                                                        <div class="form-group">
                                                            <input class="form-control" id="square_footage" name="square_footage" type="text" placeholder="Square Footage">
                                                        </div>


                                                        <div class="options-container at-marginB25" id="options-residence">
                                                            <ul>
                                                                <li><a class="box-link"><span class="year-name">1,000 or less</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">1,000 - 2,000</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">2,000 - 3,000</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">3,000 - 4,000</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">4,000 - 5,000</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">5,000+</span></a></li>
                                                            </ul>
                                                        </div>                                                        
                                                    </div>
                                                    <h4 id="residencetype_header">Number of stories</h4>
                                                    <div class="btn-group pill-buttons-large at-marginB25" data-toggle="buttons" id="number_of_stories">
                                                        <label class="btn btn-default btn-default">
                                                            <input value="1" id="stories1" class="pristine ng-untouched ng-valid ng-empty" name="412" type="radio">
                                                            <span>1</span>
                                                        </label>
                                                        <label class="btn btn-default btn-default">
                                                            <input value="2" id="stories2" class="ng-pristine ng-untouched ng-valid ng-empty" name="413" type="radio">
                                                            <span>2</span>
                                                        </label>
                                                        <label class="btn btn-default btn-default">
                                                            <input value="3" id="stories3" class="ng-pristine ng-untouched ng-valid ng-empty" name="414" type="radio">
                                                            <span>3</span>
                                                        </label>
                                                        <label class="btn btn-default btn-default">
                                                            <input value="4" id="stories4" class="ng-pristine ng-untouched ng-valid ng-empty" name="415" type="radio">
                                                            <span>4 or more</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="step-4" class="step-wrap" style="display:none;">
                                                <div class="section-number-bedrooms">
                                                    <div class="heading">
                                                        <h1>Tell us about your property</h1>
                                                    </div>                                                    
                                                </div>
                                                <div id="section-residence_type" class="at-marginT25">                                                    
                                                    <h4 id="residencetype_header">Number of bedrooms</h4>
                                                    <div class="btn-group pill-buttons-large at-marginB25" data-toggle="buttons" id="number_of_stories">
                                                        <label class="btn btn-default btn-default">
                                                            <input value="1" id="stories1" class="pristine ng-untouched ng-valid ng-empty" name="412" type="radio">
                                                            <span>1</span>
                                                        </label>
                                                        <label class="btn btn-default btn-default">
                                                            <input value="2" id="stories2" class="ng-pristine ng-untouched ng-valid ng-empty" name="413" type="radio">
                                                            <span>2</span>
                                                        </label>
                                                        <label class="btn btn-default btn-default">
                                                            <input value="3" id="stories3" class="ng-pristine ng-untouched ng-valid ng-empty" name="414" type="radio">
                                                            <span>3</span>
                                                        </label>
                                                        <label class="btn btn-default btn-default">
                                                            <input value="4" id="stories4" class="ng-pristine ng-untouched ng-valid ng-empty" name="415" type="radio">
                                                            <span>4 or more</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div id="section-residence_type" class="at-marginT25">                                                    
                                                    <h4 id="residencetype_header">Number of bedrooms</h4>
                                                    <div class="btn-group pill-buttons-large at-marginB25" data-toggle="buttons" id="number_of_stories">
                                                        <label class="btn btn-default btn-default">
                                                            <input value="1" id="stories1" class="pristine ng-untouched ng-valid ng-empty" name="412" type="radio">
                                                            <span>1</span>
                                                        </label>
                                                        <label class="btn btn-default btn-default">
                                                            <input value="2" id="stories2" class="ng-pristine ng-untouched ng-valid ng-empty" name="413" type="radio">
                                                            <span>2</span>
                                                        </label>
                                                        <label class="btn btn-default btn-default">
                                                            <input value="3" id="stories3" class="ng-pristine ng-untouched ng-valid ng-empty" name="414" type="radio">
                                                            <span>3</span>
                                                        </label>
                                                        <label class="btn btn-default btn-default">
                                                            <input value="4" id="stories4" class="ng-pristine ng-untouched ng-valid ng-empty" name="415" type="radio">
                                                            <span>4 or more</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div id="section-garage" class="at-marginT25">                                                    
                                                    <h4 id="residencetype_header">Type of Garage</h4>
                                                    <div class="form-group">
                                                        <input class="form-control" id="garage_type" name="garage_type" type="text" placeholder="Garage Type">
                                                    </div>
                                                    <div class="options-container at-marginB25" id="options-residence">
                                                        <ul>
                                                            <li><a class="box-link"><span class="year-name">No Garage</span></a></li>
                                                            <li><a class="box-link"><span class="year-name">Carport</span></a></li>
                                                            <li><a class="box-link"><span class="year-name">Attached - 1 Car</span></a></li>
                                                            <li><a class="box-link"><span class="year-name">Attached - 2 Cars</span></a></li>
                                                            <li><a class="box-link"><span class="year-name">Attached - 3 Cars</span></a></li>
                                                            <li><a class="box-link"><span class="year-name">Not Attached - 1 Car</span></a></li>
                                                            <li><a class="box-link"><span class="year-name">Not Attached - 2 Cars</span></a></li>
                                                            <li><a class="box-link"><span class="year-name">Not Attached - 3 Cars</span></a></li>
                                                            <li><a class="box-link"><span class="year-name">Other</span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="step-5" class="step-wrap" style="display:none;">
                                                <div class="section-number-bedrooms">
                                                    <div class="heading">
                                                        <h1>Tell us about your property</h1>
                                                    </div>                                                    
                                                </div>
                                                <div id="section-garage" class="at-marginT25">                                                    
                                                    <h4 id="residencetype_header">Type of construction</h4>
                                                    <div class="form-group">
                                                        <input class="form-control" name="construction_type" type="text" placeholder="Construction Type">
                                                    </div>
                                                    <div class="options-container at-marginB25" id="options-residence">
                                                        <ul>
                                                            <li><a class="box-link"><span class="year-name">Wood Frame</span></a></li>
                                                            <li><a class="box-link"><span class="year-name">Metal Frame</span></a></li>
                                                            <li><a class="box-link"><span class="year-name">Masonry</span></a></li>
                                                            <li><a class="box-link"><span class="year-name">Other</span></a></li>
                                                        </ul>
                                                    </div>
                                                    <h4 id="residencetype_header">Type of foundation</h4>
                                                    <div class="form-group">
                                                        <input class="form-control" name="construction_type" type="text" placeholder="Foundation Type">
                                                    </div>
                                                    <div class="options-container at-marginB25" id="options-residence">
                                                        <ul>
                                                            <li><a class="box-link"><span class="year-name">Basement</span></a></li>
                                                            <li><a class="box-link"><span class="year-name">Open</span></a></li>
                                                            <li><a class="box-link"><span class="year-name">Slab</span></a></li>
                                                            <li><a class="box-link"><span class="year-name">Piers Pilings Stilts</span></a></li>
                                                            <li><a class="box-link"><span class="year-name">Other</span></a></li>
                                                        </ul>
                                                    </div>
                                                    <h4 id="residencetype_header">Roof type</h4>
                                                    <div class="form-group">
                                                        <input class="form-control" name="construction_type" type="text" placeholder="Roof Type">
                                                    </div>
                                                    <div class="options-container at-marginB25" id="options-residence">
                                                        <ul>
                                                            <li><a class="box-link"><span class="year-name">Asphalt Shingle</span></a></li>
                                                            <li><a class="box-link"><span class="year-name">Composition Shingle</span></a></li>
                                                            <li><a class="box-link"><span class="year-name">Wood Shingle</span></a></li>
                                                            <li><a class="box-link"><span class="year-name">Tile Shingle</span></a></li>
                                                            <li><a class="box-link"><span class="year-name">Metal Roof</span></a></li>
                                                            <li><a class="box-link"><span class="year-name">Tile Shingle</span></a></li>
                                                            <li><a class="box-link"><span class="year-name">Other</span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="step-6" class="step-wrap" style="display:none;">
                                                <div class="section-number-bedrooms">
                                                    <div class="heading">
                                                        <h1>Do you have any of these dog breeds?</h1>
                                                    </div>                                                    
                                                </div>
                                                <div id="section-garage" class="at-marginT25">                                                    
                                                    <h4 id="residencetype_header">Chow, Doberman, German Shepherd, Pitt Bull, or Rottweiler</h4>
                                                    <div class="btn-group pill-buttons-large at-marginB25" data-toggle="buttons" id="number_of_stories">
                                                        <label class="btn btn-default btn-default">
                                                            <input value="1" id="No" class="pristine ng-untouched ng-valid ng-empty" name="412" type="radio">
                                                            <span>No</span>
                                                        </label>
                                                        <label class="btn btn-default btn-default">
                                                            <input value="2" id="Yes" class="ng-pristine ng-untouched ng-valid ng-empty" name="413" type="radio">
                                                            <span>Yes</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="step-7" class="step-wrap" style="display:none;">
                                                <div class="section-insured">
                                                    <div class="heading">
                                                        <h1>Are you currently insured?</h1>
                                                    </div>                                                    
                                                </div>
                                                <div id="section-garage" class="at-marginT25">
                                                    <div class="btn-group pill-buttons-large at-marginB25" data-toggle="buttons" id="number_of_stories">
                                                        <label class="btn btn-default btn-default">
                                                            <input value="1" id="No" class="pristine ng-untouched ng-valid ng-empty" name="412" type="radio">
                                                            <span>No</span>
                                                        </label>
                                                        <label class="btn btn-default btn-default">
                                                            <input value="2" id="Yes" class="ng-pristine ng-untouched ng-valid ng-empty" name="413" type="radio">
                                                            <span>Yes</span>
                                                        </label>
                                                    </div>
                                                    <div class="section-insco">
                                                        <h4 id="residencetype_header">What is your current insurance company?</h4>
                                                        <div class="form-group">
                                                            <input class="form-control" name="construction_type" type="text" placeholder="Select Company">
                                                        </div>
                                                        <div class="options-container at-marginB25" id="options-residence">
                                                            <ul>
                                                                <li><a class="box-link"><span class="year-name">21st Century Insurance</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">AAA Insurance Co.</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">Allied</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">Allstate Insurance</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">American Family Insurance</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">American National Insurance</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">Amica Insurance</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">Cotton States Insurance</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">Country Financial</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">Erie Insurance Company</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">Esurance</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">Farm Bureau</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">Farmers Insurance</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">GEICO</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">GMAC Insurance</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">Independent Agency</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">Infinity Insurance</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">Liberty Mutual</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">Mercury</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">Metropolitan Insurance Co.</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">Nationwide</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">Other</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">Plymouth Rock</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">Progressive Insurance</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">SAFECO</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">Sentry Insurance Co.</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">Shelter Insurance Co.</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">State Farm</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">The Hartford</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">The Hartford AARP</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">Travelers Insurance Co.</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">Unitrin Direct</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">USAA</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="section-insured_for">
                                                        <h4 id="residencetype_header">How long have you been a customer for?</h4>
                                                        <div class="form-group">
                                                            <input class="form-control" name="construction_type" type="text" placeholder="Continuous Coverage">
                                                        </div>
                                                        <div class="options-container at-marginB25" id="options-residence">
                                                            <ul>
                                                                <li><a class="box-link"><span class="year-name">Less than 6 months</span></a></li>  
                                                                <li><a class="box-link"><span class="year-name">6 months</span></a></li>    
                                                                <li><a class="box-link"><span class="year-name">1 year</span></a></li>  
                                                                <li><a class="box-link"><span class="year-name">2 years</span></a></li> 
                                                                <li><a class="box-link"><span class="year-name">3 years</span></a></li> 
                                                                <li><a class="box-link"><span class="year-name">3 to 5 years</span></a></li>    
                                                                <li><a class="box-link"><span class="year-name">5 to 10 years</span></a></li>   
                                                                <li><a class="box-link"><span class="year-name">Over 10 years</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="section-policy_expiration">
                                                        <h4 id="residencetype_header">When does your policy expire?</h4>
                                                        <div class="form-group">
                                                            <input class="form-control" name="construction_type" type="text" placeholder="Policy Expiration">
                                                        </div>
                                                        <div class="options-container at-marginB25" id="options-residence">
                                                            <ul>
                                                                <li><a class="box-link"><span class="year-name">Not sure</span></a></li>    
                                                                <li><a class="box-link"><span class="year-name">A few days</span></a></li>  
                                                                <li><a class="box-link"><span class="year-name">2 weeks</span></a></li> 
                                                                <li><a class="box-link"><span class="year-name">1 month</span></a></li> 
                                                                <li><a class="box-link"><span class="year-name">2 months</span></a></li>    
                                                                <li><a class="box-link"><span class="year-name">3 months</span></a></li>    
                                                                <li><a class="box-link"><span class="year-name">4 to 6 months</span></a></li>   
                                                                <li><a class="box-link"><span class="year-name">More than 6 months</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="step-8" class="step-wrap" style="display:none;">
                                                <div class="section-number-bedrooms">
                                                    <div class="heading">
                                                        <h1>Type of coverage you are interested in</h1>
                                                    </div>                                                    
                                                </div>
                                                <div class="section-policy_expiration">
                                                    <h4 id="residencetype_header">Estimated Replacement Cost of your Structure</h4>
                                                    <div class="form-group">
                                                        <input class="form-control" name="construction_type" type="text" placeholder="Select your personal liability coverage">
                                                        <p><small>The amount you're covered for if someone hurts themselves on your property</small></p>
                                                    </div>
                                                    <div class="options-container at-marginB25" id="options-residence">
                                                        <ul>
                                                            <li><a class="box-link"><span class="year-name">$50,000 or less</span></a></li> 
                                                            <li><a class="box-link"><span class="year-name">$100,000</span></a></li>    
                                                            <li><a class="box-link"><span class="year-name">$150,000</span></a></li>    
                                                            <li><a class="box-link"><span class="year-name">$200,000</span></a></li>    
                                                            <li><a class="box-link"><span class="year-name">$250,000</span></a></li>    
                                                            <li><a class="box-link"><span class="year-name">$300,000</span></a></li>    
                                                            <li><a class="box-link"><span class="year-name">$350,000</span></a></li>    
                                                            <li><a class="box-link"><span class="year-name">$400,000</span></a></li>    
                                                            <li><a class="box-link"><span class="year-name">$450,000</span></a></li>    
                                                            <li><a class="box-link"><span class="year-name">$500,000</span></a></li>    
                                                            <li><a class="box-link"><span class="year-name">$550,000</span></a></li>    
                                                            <li><a class="box-link"><span class="year-name">$600,000</span></a></li>    
                                                            <li><a class="box-link"><span class="year-name">$650,000</span></a></li>    
                                                            <li><a class="box-link"><span class="year-name">$700,000</span></a></li>    
                                                            <li><a class="box-link"><span class="year-name">$750,000</span></a></li>    
                                                            <li><a class="box-link"><span class="year-name">$800,000</span></a></li>    
                                                            <li><a class="box-link"><span class="year-name">$850,000</span></a></li>    
                                                            <li><a class="box-link"><span class="year-name">$900,000</span></a></li>    
                                                            <li><a class="box-link"><span class="year-name">$950,000</span></a></li>    
                                                            <li><a class="box-link"><span class="year-name">$1,000,000</span></a></li>  
                                                            <li><a class="box-link"><span class="year-name">$1,100,000</span></a></li>  
                                                            <li><a class="box-link"><span class="year-name">$1,200,000</span></a></li>  
                                                            <li><a class="box-link"><span class="year-name">$1,300,000</span></a></li>  
                                                            <li><a class="box-link"><span class="year-name">$1,400,000</span></a></li>  
                                                            <li><a class="box-link"><span class="year-name">$1,500,000</span></a></li>  
                                                            <li><a class="box-link"><span class="year-name">$1,600,000</span></a></li>  
                                                            <li><a class="box-link"><span class="year-name">$1,700,000</span></a></li>  
                                                            <li><a class="box-link"><span class="year-name">$1,800,000</span></a></li>  
                                                            <li><a class="box-link"><span class="year-name">$1,900,000</span></a></li>  
                                                            <li><a class="box-link"><span class="year-name">$2,000,000 or more</span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="section-desired-deductible">
                                                    <h4 id="residencetype_header">Desired deductible</h4>
                                                    <div class="form-group">
                                                        <input class="form-control" name="construction_type" type="text" placeholder="Select your desired deductible">
                                                        <p><small>The amount you pay if you have to file a claim</small></p>
                                                    </div>
                                                    <div class="options-container at-marginB25" id="options-residence">
                                                        <ul>
                                                            <li><a class="box-link"><span class="year-name">$1,000</span></a></li>  
                                                            <li><a class="box-link"><span class="year-name">$500 (recommended)</span></a></li>  
                                                            <li><a class="box-link"><span class="year-name">$250</span></a></li>    
                                                            <li><a class="box-link"><span class="year-name">$200</span></a></li>    
                                                            <li><a class="box-link"><span class="year-name">$100</span></a></li>    
                                                            <li><a class="box-link"><span class="year-name">$50</span></a></li> 
                                                            <li><a class="box-link"><span class="year-name">$0 (No deductible)</span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="step-9" class="step-wrap" style="display:none;">
                                                <div class="section-number-bedrooms">
                                                    <div class="heading">
                                                        <h1>Any claims in last 3 years?</h1>
                                                    </div>                                                    
                                                </div>
                                                <div id="section-garage" class="at-marginT25">                                                    
                                                    <div class="btn-group pill-buttons-large at-marginB25" data-toggle="buttons" id="number_of_stories">
                                                        <label class="btn btn-default btn-default">
                                                            <input value="1" id="No" class="pristine ng-untouched ng-valid ng-empty" name="412" type="radio">
                                                            <span>No</span>
                                                        </label>
                                                        <label class="btn btn-default btn-default">
                                                            <input value="2" id="Yes" class="ng-pristine ng-untouched ng-valid ng-empty" name="413" type="radio">
                                                            <span>Yes</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>-->
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
	   alert("http://<?php echo $_SERVER['HTTP_HOST'];?><?= base_url();?>assets/js/auto/autocomplete-0.3.0.js");
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