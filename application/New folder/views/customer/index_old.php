<!--<html>-->
<?php $this->load->view("layout/header");?>
	<body id="body_leads" class="at-page site itemid-102 at-leads">
    	<div id="at-page-wrapper">
            <div class="row" id="flex-container">
                <div id="main-left-container" class="col-sm-3 col-lg-3 col-xl-3 col-md-3 left-sidebar mCustomScrollbar">
                    <div class="inner-left-sidebar">
                        <div class="inner-block">
                            <div class="quate-left-header-wrap text-center at-paddingT20 at-paddingB20">
                                <img src="<?= base_url();?>assets/images/white_logo.png" class="img-fluid" alt="Compare Tree" width="250px">
                            </div>
                        </div>
                    </div>
                </div>
                <div id="main-right-container" class="col-sm-12 col-lg-9 col-xl-9 col-md-9 right-content">
                    <div class="inner-right-content">
                        <div class="inner-block at-paddingB15">
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:25%"> 25% Complete </div>
                            </div> 
                            <div id="question-container" class="row">

                                <div id="left-question-container" class="col-sm-12 col-lg-8 col-xl-8 col-md-8 inner-left-question-container">
                                    <div class="head">
                                        <h4>Current Question</h4>
                                    </div>
                                    <div class="form-step-container">
                                        <div class="form-container">
                                            <div id="applicant-name" class="step-wrap">
                                                <div class="section-address">
                                                    <div class="heading at-paddingB15">
                                                        <h1>Applicant Name?</h1>
                                                    </div>
                                                    <div class="form-option">
                                                        <div class="row">
                                                            <div class="col-sm-12 col-lg-6 col-xl-6 col-md-6">
                                                                <div class="form-group">
                                                                    <label for="first_name">My Address</label>
                                                                    <input placeholder="First Name" id="first_name" name="first_name" class="form-control" required type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-lg-6 col-xl-6 col-md-6">
                                                                 <div class="form-group">
                                                                    <label for="last_name">City</label>
                                                                    <input placeholder="Last Name" id="last_name" name="last_name" class="form-control" required type="text">
                                                                </div>
                                                            </div>
                                                            <div id="confirm-button" class="action-buttons at-marginT20">
                                                                <a class="btn btn-primary">Save &amp; Continue</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                                                
                                            </div>
                                            <div id="step-1" class="step-wrap" style="display:none;">
                                                <div class="section-address">
                                                    <div class="heading at-paddingB15">
                                                        <h1>What is your address?</h1>
                                                    </div>
                                                    <div class="map-wrap at-marginB20">
                                                        <img src="<?= base_url();?>assets/images/map.jpg" class="img-fluid" alt="Map">
                                                    </div>
                                                    <div class="form-option">
                                                        <div class="form-group">
                                                            <label for="address">My Address</label>
                                                            <input placeholder="Start typing..." id="address" name="address" class="form-control" required type="text">
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12 col-lg-6 col-xl-6 col-md-6">
                                                                 <div class="form-group">
                                                                    <label for="address">City</label>
                                                                    <input placeholder="City" id="city" name="city" class="form-control" required type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-lg-3 col-xl-3 col-md-3">
                                                                 <div class="form-group">
                                                                    <label for="address">State</label>
                                                                    <select class="form-control " id="stateInput">
                                                                        <option value="? undefined:undefined ?" selected="selected"></option>
                                                                        <option disabled="disabled" value="State">State</option>
                                                                        <option value="AL" class="ng-binding ng-scope">AL</option>  
                                                                        <option value="AK" class="ng-binding ng-scope">AK</option>  
                                                                        <option value="AZ" class="ng-binding ng-scope">AZ</option>  
                                                                        <option value="AR" class="ng-binding ng-scope">AR</option>  
                                                                        <option value="CA" class="ng-binding ng-scope">CA</option>  
                                                                        <option value="CO" class="ng-binding ng-scope">CO</option>  
                                                                        <option value="CT" class="ng-binding ng-scope">CT</option>  
                                                                        <option value="DE" class="ng-binding ng-scope">DE</option>  
                                                                        <option value="DC" class="ng-binding ng-scope">DC</option>  
                                                                        <option value="FL" class="ng-binding ng-scope">FL</option>  
                                                                        <option value="GA" class="ng-binding ng-scope">GA</option>  
                                                                        <option value="HI" class="ng-binding ng-scope">HI</option>  
                                                                        <option value="ID" class="ng-binding ng-scope">ID</option>  
                                                                        <option value="IL" class="ng-binding ng-scope">IL</option>  
                                                                        <option value="IN" class="ng-binding ng-scope">IN</option>  
                                                                        <option value="IA" class="ng-binding ng-scope">IA</option>  
                                                                        <option value="KS" class="ng-binding ng-scope">KS</option>  
                                                                        <option value="KY" class="ng-binding ng-scope">KY</option>  
                                                                        <option value="LA" class="ng-binding ng-scope">LA</option>  
                                                                        <option value="ME" class="ng-binding ng-scope">ME</option>  
                                                                        <option value="MD" class="ng-binding ng-scope">MD</option>  
                                                                        <option value="MA" class="ng-binding ng-scope">MA</option>  
                                                                        <option value="MI" class="ng-binding ng-scope">MI</option>  
                                                                        <option value="MN" class="ng-binding ng-scope">MN</option>  
                                                                        <option value="MS" class="ng-binding ng-scope">MS</option>  
                                                                        <option value="MO" class="ng-binding ng-scope">MO</option>  
                                                                        <option value="MT" class="ng-binding ng-scope">MT</option>  
                                                                        <option value="NE" class="ng-binding ng-scope">NE</option>  
                                                                        <option value="NV" class="ng-binding ng-scope">NV</option>  
                                                                        <option value="NH" class="ng-binding ng-scope">NH</option>  
                                                                        <option value="NJ" class="ng-binding ng-scope">NJ</option>  
                                                                        <option value="NM" class="ng-binding ng-scope">NM</option>  
                                                                        <option value="NY" class="ng-binding ng-scope">NY</option>  
                                                                        <option value="NC" class="ng-binding ng-scope">NC</option>  
                                                                        <option value="ND" class="ng-binding ng-scope">ND</option>  
                                                                        <option value="OH" class="ng-binding ng-scope">OH</option>  
                                                                        <option value="OK" class="ng-binding ng-scope">OK</option>  
                                                                        <option value="OR" class="ng-binding ng-scope">OR</option>  
                                                                        <option value="PA" class="ng-binding ng-scope">PA</option>  
                                                                        <option value="RI" class="ng-binding ng-scope">RI</option>  
                                                                        <option value="SC" class="ng-binding ng-scope">SC</option>  
                                                                        <option value="SD" class="ng-binding ng-scope">SD</option>  
                                                                        <option value="TN" class="ng-binding ng-scope">TN</option>  
                                                                        <option value="TX" class="ng-binding ng-scope">TX</option>  
                                                                        <option value="UT" class="ng-binding ng-scope">UT</option>  
                                                                        <option value="VT" class="ng-binding ng-scope">VT</option>  
                                                                        <option value="VA" class="ng-binding ng-scope">VA</option>  
                                                                        <option value="WA" class="ng-binding ng-scope">WA</option>  
                                                                        <option value="WV" class="ng-binding ng-scope">WV</option>  
                                                                        <option value="WI" class="ng-binding ng-scope">WI</option>  
                                                                        <option value="WY" class="ng-binding ng-scope">WY</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-lg-3 col-xl-3 col-md-3">
                                                                 <div class="form-group">
                                                                    <label for="address">Zip</label>
                                                                    <input pattern="[0-9\-]+" inputmode="numeric" id="zipInput" placeholder="Zip" maxlength="5" required type="tel">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="section-residence_type" class="at-marginT25">
                                                    <h4 id="residencetype_header">What type of residence is your home?</h4>
                                                    <div class="hidden-xs hidden-sm">
                                                        <div class="form-group">
                                                            <input class="form-control" id="residence_type" name="residence_type" placeholder="Type of Residence" type="text">
                                                             <p class="help-block"><small>Incomplete value. Select one of the options below to continue</small></p>
                                                        </div>

                                                        <div class="options-container" id="options-residence">
                                                            <ul>
                                                                <li><a class="box-link"><span class="year-name">Single family home</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">Multi family home</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">Duplex</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">Apartment</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">Townhome</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">Condominium</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">Mobile Home</span></a></li>
                                                            </ul>
                                                        </div>
                                                        <div id="confirm-button" class="action-buttons at-marginT20">
                                                            <a class="btn btn-primary">Save &amp; Continue</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="step-2" class="step-wrap" style="display:none;">                                                
                                                <div id="section-residence_type" class="at-marginT25">
                                                    <h4 id="residencetype_header">How long have you been living here?</h4>
                                                    <div class="hidden-xs hidden-sm">
                                                        <div class="form-group">
                                                            <input class="form-control" id="residence_length" name="residence_length" placeholder="Length of Residence" type="text">
                                                        </div>

                                                        <div class="options-container at-marginB25" id="options-residence">
                                                            <ul>
                                                                <li><a class="box-link"><span class="year-name">Less than 1 year</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">1 year</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">2 years</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">3 to 5 years</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">5 to 10 years</span></a></li>
                                                                <li><a class="box-link"><span class="year-name">Over 10 years</span></a></li>
                                                            </ul>
                                                        </div>
                                                        
                                                    </div>
                                                    <div id="confirm-button" class="action-buttons at-marginT20">
                                                        <a class="btn btn-primary">Save &amp; Continue</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="step-3" class="step-wrap" style="display:none;">
                                                <div class="section-year_built">
                                                    <div class="heading">
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
                                            </div>
                                        </div>
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
		<script type="text/javascript">
			$(".btn").click(function(){
				//alert('');
				//$("#div2").fadeIn("slow");
				$("#step-1").fadeOut(3000);
				$("#step-2").fadeIn('slow');
			});
		</script>
    </body>
</html>