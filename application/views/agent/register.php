                                <div id="left-question-container" class="col-sm-12 col-lg-12 col-xl-12 col-md-12 inner-left-question-container">
                                    <div class="head">
                                        <h1 id="container-heading">Agent Plan's</h1>
                                    </div>
                                    <div class="form-step-container">
                                        <form action="<?=base_url()?>index.php/agent/save" method="post" name="leadForm" enctype="multipart/form-data" >
                                        <div class="form-container">
                                        	
                                            <div id="plans-container" class="step-wrap" style="display:;">
                                                <div class="section-plans">
                                                    <div class="form-option" id="plans-plan">
                                                        <div class="heading at-paddingB15" style="display:none;">
                                                            <h1 id="plans-container-heading">Agent Plan's?</h1>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-3 col-lg-3 col-xl-3 col-md-3">
                                                                <div class="form-group">
                                                                    <label for="first_name">Bronze Plan:0$/per month</label>
                                                                    <input name="plan" class="form-control"  type="radio" value="bronze">
                                                                    <div style="border:1px solid #999; border-radius:10px; padding:10px;">
                                                                    	<p>Bronze: $0/mo</p>
                                                                        <p> Most basic access to the website</p>
                                                                        <p>1. Access to the main leads pool based on their zip code</p>
                                                                        <p>2. They only can submit one quote per lead</p>
                                                                        <p>3. If their win and the prospect chose their rate, system will notify
                                                                        them through email</p>
                                                                        <p>4. They can only submit one quote and to take the next lead, the
                                                                        ongoing quote situation should be cleared or closed by the agent or
                                                                        others.</p>
                                                                        <p>5. Single user</p>
                                                                        <p>6. Single Terriotry</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 col-lg-3 col-xl-3 col-md-3">
                                                                 <div class="form-group">
                                                                    <label for="last_name">Silver Plan:</label>
                                                                    <input name="plan" class="form-control"  type="radio" value="silver" checked="checked">
                                                                    <div  style="border:1px solid #999; border-radius:10px; padding:10px;">
                                                                    	<p>Silver: $49/mo</p>
                                                                        <p>All Bronze options +</p>
                                                                        <p>1. They can submit 1 quote from 1 insurance company.</p>
                                                                        <p>2. Single user</p>
                                                                        <p>3. Access to report panel</p>
                                                                        <p>4. Email Notification</p>
                                                                        <p>5. Agent Personal Page in comparetree.com</p>
                                                                        <p>6. Access to 5 Territory</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 col-lg-3 col-xl-3 col-md-3">
                                                                 <div class="form-group">
                                                                    <label for="last_name">Gold Plan</label>
                                                                    <input name="plan" class="form-control"  type="radio" value="gold">
                                                                    <div style="border:1px solid #999; border-radius:10px; padding:10px;">
                                                                        <p>Gold: $149/mo</p>
                                                                        <p>All Silver options +</p>
                                                                        <p>1. They can submit 5 quotes from 5 different insurance companies.</p>
                                                                        <p>2. Double user</p>
                                                                        <p>3. Access to report panel</p>
                                                                        <p>4. The can upload a picture on their profiles</p>
                                                                        <p>5. Access to 10 Territories</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 col-lg-3 col-xl-3 col-md-3">
                                                                 <div class="form-group">
                                                                    <label for="last_name">Platinum Plan</label>
                                                                    <input name="plan" class="form-control"  type="radio" value="platinum">
                                                                    <div style="border:1px solid #999; border-radius:10px; padding:10px;">
                                                                    	<p>Platinum: $449/mo</p>
                                                                        <p>All Gold options +</p>
                                                                        <p>1. They can submit unlimited quotes from different insurance companies.</p>
                                                                        <p>2. 1 admin + 10 users</p>
                                                                        <p>3. Access to mobile app</p>
                                                                        <p>4. Advertisement on the website side slider</p>
                                                                        <p>5. Video option for 1 minute elevator pitch</p>
                                                                        <p>6. Access to all the submitted quote on the system</p>
                                                                        <p>7. Access to unlimited territories</p>
                                                                        <p>8. Access to agent assistant (reminder, articles, documents, cloud)</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="confirm-button1" class="action-buttons at-marginT20">
                                                            <a class="btn btn-primary savenext" id="plans-plan-btn" charset="plan" title="plans">Save &amp; Continue</a>
                                                        </div>
                                                    </div>
                                                    
                                                </div>                                                
                                            </div>
                                            
                                            <div id="basicinfo-container" class="step-wrap" style="display:none;">
                                                <div class="section-basicinfo">
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
                                                </div>                                                
                                            </div>
                                            
                                                                                        
                                            
                                            <div id="generalinfo-container" class="step-wrap" style="display:none;">
                                                <div class="section-generalinfo">
                                                    <div id="generalinfo-dob" class="form-option" style="display:;">
                                                        <div class="heading at-paddingB15" style="display:none;">
                                                            <h1 id="generalinfo-container-heading">General Info</h1>
                                                        </div>
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
                                                            <a class="btn btn-primary savenext"  id="generalinfo-dob-btn" charset="dob"  title="generalinfo">Save &amp; Continue</a>
                                                        </div>
                                                    </div>
                                                    <div class="form-option" id="generalinfo-gender"  style="display:none;">
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
                                                            <a class="btn btn-primary savenext" id="generalinfo-gender-btn" charset="gender"  title="generalinfo">Save &amp; Continue</a>
                                                        </div>
                                                    </div>
                                                    <div class="form-option" id="generalinfo-marital" style="display:none;">
                                                        <div class="row">
                                                            <div id="section-marital" class="at-marginT25">
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
                                                            <a class="btn btn-primary savenext" id="generalinfo-marital-btn" charset="marital" title="generalinfo">Save &amp; Continue</a>
                                                        </div>
                                                    </div>
                                                </div>                                                
                                            </div>
                                            
                                            <div id="address-container" class="step-wrap" style="display:none;">
                                                <div class="section-address">
                                                    <div class="heading at-paddingB15" style="display:none;">
                                                        <h1 id="address-container-heading">What is your address</h1>
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
                                            <!--Get Company Start here-->
                                            <div id="company-container" class="step-wrap" style="display:none;">
                                               	<div class="section-company">
                                                    <div class="heading at-paddingB15" style="display:none;">
                                                        <h1 id="company-container-heading">Choose Your Company</h1>
                                                    </div>
                                                    <div class="form-option" id="company-company" style="display:;">
                                                        <div class="row">
                                                            <div  style="width:100%;">
                                                                <div class="form-group" id="aaatexttt123" style="clear:both;">
                                                                    <label for="exampleInputEmail1"><em class="star_red">*</em> Company :</label>
                                                                    <select class="form-control catRm" id="company" name="company" require="require" onChange="fillComp(this.value)">
                                                                        <option value="0">Choose Company</option>
                                                                        <?php foreach($companys as $company) {?>
                                                                        <option value="<?php echo $company->id;?>"><?php echo $company->company;?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                    <?php echo form_error('company1', '<span class="php-error"  style="color:#f00;">', '</span>'); ?>
                                                                    <span class="php-error" id="company1_msg" style="color:#f00;"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="confirm-button147" class="action-buttons at-marginT20">
                                                            <a class="btn btn-primary savenext" id="company-company-btn"  title="company">Save &amp; Continue</a>
                                                        </div>
                                                    </div>
                                               	</div>
                                            </div>
                                            <!--Get Company End here-->
											
                                            <!--Company Info Start here-->
                                            <div id="companyinfo-container" class="step-wrap" style="display:none;">
                                               	<div class="section-companyinfo">
                                                   	<div class="heading at-paddingB15" style="display:none;">
                                                        <h1 id="companyinfo-container-heading">Company Information</h1>
                                                    </div>
                                                    <div id="companyinfo-data" class="form-option" style="display:;">
                                                    	
                                                        <div>
                                                            <div><h3 id="companyName"></h3><img src="" id="companyImg" /></div>
                                                            <p id="companyDetail"></p>
                                                        </div>
                                                        <div class="row">
                                                            <div  style="width:100%;">
                                                                <div class="form-group" id="" style="clear:both;">
                                                                     <label for="exampleInputEmail1"><em class="star_red">*</em> Upload your pic :</label>
                                                                    <input type="file" name="certificate" id="certificate"  />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div  style="width:100%;">
                                                                <div class="form-group" id="" style="clear:both;">
                                                                     <label for="exampleInputEmail1"><em class="star_red">*</em> Upload your D/L :</label>
                                                                    <input type="file" name="dl" id="dl"  />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div  style="width:100%;">
                                                                <div class="form-group" id="" style="clear:both;">
                                                                     <label for="exampleInputEmail1"><em class="star_red">*</em> Upload Video :</label>
                                                                    <input type="file" name="image" id="image"  />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="confirm-button148" class="action-buttons at-marginT20">
                                                            <a class="btn btn-primary savenext" id="companyinfo-data-btn" charset="data"  title="companyinfo">Save &amp; Continue</a>
                                                        </div>
                                                    </div>
                                                    <div id="companyinfo-payment" class="form-option" style="display:none;">
                                                    	
                                                        <div class="row">
                                                            <div  style="width:100%;">
                                                                <div class="form-group" id="" style="clear:both;">
                                                                    <input type="checkbox" name="terms" id="terms" value="On" required="required"  />
                                                                     <label for="exampleInputEmail1"><em class="star_red">*</em> I agree to terms and conditions (Comparetree referral fee 3%)
 :</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div  style="width:100%;">
                                                                <div class="form-group" id="" style="clear:both;">
                                                                     <label for="exampleInputEmail1"><em class="star_red">*</em> Card :</label>
                                                                    <select name="card" id="card" >
                                                                    	<option value="debit">Debit</option>
                                                                    	<option value="credit">Credit</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                        <div class="row">
                                                            <div  style="width:100%;">
                                                                <div class="form-group" id="" style="clear:both;">
                                                                     <label for="exampleInputEmail1"><em class="star_red">*</em> Card Type :</label>
                                                                    <select name="card" id="card_type" >
                                                                    	<option value="visa">Visa</option>
                                                                    	<option value="master">Master</option>
                                                                    	<option value="rupay">Rupay</option>
                                                                    	<option value="maestro">Maestro</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div  style="width:100%;">
                                                                <div class="form-group" id="" style="clear:both;">
                                                                     <label for="exampleInputEmail1"><em class="star_red">*</em> Card Number :</label>
                                                                    <input type="text" name="card_number" id="card_number"  />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div  style="width:100%;">
                                                                <div class="form-group" id="" style="clear:both;">
                                                                     <label for="exampleInputEmail1"><em class="star_red">*</em> Card Holder :</label>
                                                                    <input type="text" name="card_name" id="card_name"  />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div  style="width:100%;">
                                                                <div class="form-group" id="" style="clear:both;">
                                                                     <label for="exampleInputEmail1"><em class="star_red">*</em> CVV :</label>
                                                                    <input type="text" name="cvv" id="cvv"  />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div  style="width:100%;">
                                                                <div class="form-group" id="" style="clear:both;">
                                                                     <label for="exampleInputEmail1"><em class="star_red">*</em> expiry :</label>
                                                                    <input type="text" name="exp" id="exp" placeholder="YY-m"  />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="confirm-button149" class="action-buttons at-marginT20">
                                                            <a class="btn btn-primary savenext" id="companyinfo-payment-btn"  charset="payment"  title="companyinfo">Save &amp; Continue</a>
                                                        </div>
                                                    </div>
                                               	</div>
                                            </div>
                                            <!--Company Info End here-->
                                           
                                           <!-- 
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
                                            -->
                                            <div id="leadsave-container" class="step-wrap" style="display:none;">
                                            	<div class="section-leadsave">
                                                    <div class="heading at-paddingB15" style="display:none;">
                                                        <h1 id="leadsave-container-heading">Save details</h1>
                                                    </div>
                                            	</div>
                                                <div id="leadsave-save" class="at-marginT25">
                                                    <div id="confirm-button-leadsave" class="action-buttons at-marginT20">
                                                        <button type="submit" name="save" >Submit.</button>
                                                    </div>
                                                </div>
                                                    
                                                
                                            </div>
                                           
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                
                                
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" async defer src="<?=base_url()?>assets/js/agentForm.js?<?php echo rand(99,999);?>"></script>
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