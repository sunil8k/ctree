<?php $this->load->view("layout/header");
session_start();
$login = $_SESSION['user_id'];// = 1;
session_destroy();
?>
    <body class="at-page site itemid-101 at-home">
    	<div id="at-page-wrapper">
    		<header id="main-header-wrap">
	    		<section id="top-bar">
	    			<div class="container">
	    				<div class="inner-block at-paddingT15 at-paddingB15">
		    				<div class="row">
				    			<div class="col-sm-12 col-lg-6 col-xl-6 col-md-6">
				    				<div class="at-top-call-wrap">
				    					<span class="txt1">Talking to an Agent :</span><span class="txt2"> 855.214.2291</span>
				    				</div>
				    			</div>
				    			<div class="col-sm-12 col-lg-6 col-xl-6 col-md-6">
                                
                                    <div style="float:right;">
                                        <ul style="margin-left:20px; list-style:none;">
                                        <?php if(!$login) { ?>
                                            <li>Register| <a href="<?= base_url();?>index.php/customer/login">Login</a></li><?php } else { ?>
                                            <li>My Account | Logout</li><?php }?>
                                        </ul>
                                    </div>
                                    <div class="at-top-social-wrap">
				    					<ul>
				    						<li><a href="javascript:void(0)"><i class="fa fa-facebook"></i></a></li>
				    						<li><a href="javascript:void(0)"><i class="fa fa-linkedin"></i></a></li>
				    						<li><a href="javascript:void(0)"><i class="fa fa-instagram"></i></a></li>
				    						<li><a href="javascript:void(0)"><i class="fa fa-google-plus"></i></a></li>
				    						<li><a href="javascript:void(0)"><i class="fa fa-pinterest-p"></i></a></li>
				    						<li><a href="javascript:void(0)"><i class="fa fa-twitter"></i></a></li>
				    					</ul>
				    				</div>
				    			</div>
			    			</div>
		    			</div>
	    			</div>
	    		</section>
	    		<section id="second-top-bar">
	    			<div class="container">
	    				<div class="inner-block at-paddingT15 at-paddingB15">
		    				<div class="row">
				    			<div class="col-sm-12 col-lg-4 col-xl-4 col-md-4">
				    				<div class="brand-logo-wrap">
				    					<a class="navbar-brand" href="<?= base_url();?>index.php"><img src="<?= base_url();?>assets/images/logo.png" class="img-fluid" alt="Compare Tree"></a>
				    				</div>
				    			</div>
				    			<div class="col-sm-12 col-lg-8 col-xl-8 col-md-8">
				    				<nav class="navbar navbar-expand pull-right">				    					
										 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
										 <span class="navbar-toggler-icon"></span>
										 </button>
										<div class="collapse navbar-collapse" id="navbarSupportedContent">
					    					<ul id="menu-primary_navigation" class=" menu menu-horizontal nav navbar-nav">
												<li class="menu-item"><a class="menu-link" href="index.html">Home</a></li>
												<li class="menu-item"><a class="menu-link" href="<?= base_url();?>index.php/aboutus">About us</a></li>
												<li class="menu-item"><a class="menu-link" href="<?= base_url();?>index.php/contactus">Contact us</a></li>
												<li class="menu-item"><a class="menu-link" href="javascript:void(0)">Find an Agent</a></li>
												<li class="menu-item nav-item dropdown"><a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-labelledby="navbarDropdown">Insurance</a>
											    	<div class="child-menu level1 dropdown-menu">
														<ul class="sub-menu">
												            <li class="menu-item"><a class="menu-link" href="javascript:void(0)">Auto Insurance</a></li>
												            <li class="menu-item"><a class="menu-link" href="javascript:void(0)">Home Insurance</a></li>
												            <li class="menu-item"><a class="menu-link" href="javascript:void(0)">Renters Insurance</a></li>
												            <li class="menu-item"><a class="menu-link" href="javascript:void(0)">Health Insurance</a></li>
												            <li class="menu-item"><a class="menu-link" href="javascript:void(0)">Life Insurance</a></li>
												            <li class="menu-item"><a class="menu-link" href="javascript:void(0)">Commercial Insurance</a></li>
														</ul>
											        </div>
												</li>
												<li class="menu-item"><a class="menu-link" href="javascript:void(0)">Insurance by State</a></li>
											</ul>
										</div>
				    				</nav>
				    			</div>
			    			</div>
		    			</div>
	    			</div>
	    		</section>
    		</header>
  			<section id="banner-wrap">
  				<div class="container">
  					<div class="inner-block at-paddingT15 at-paddingB15 at-paddingT50 at-paddingB100">
  						<div class="row">
  							<div class="col-sm-12 col-lg-6 col-xl-6 col-md-6">
  								<div class="clearfix main-phone-wrap">
									<div class="phone-wrapper black-phone" id="phone-container"> 
											<div class="phone-screen-wrap"> 
												<!--<div class="screen-top">
													<img src="https://d1o2gtynftcuk2.cloudfront.net/wp-content/themes/sage/dist/images/logosolo.png" class="phone-logo" alt="SmartFinancial Logo">
												</div>-->
												<div class="screen-main">
													<ul class="phone-quotes">
														<li class="comp-list">
															<div class="row">
																<div class="col-sm-7">
																	<div class="pull-left phone-quote-company">Everest</div>
																</div>
																<div class="col-sm-5">
																	<div class="pull-right phone-quote-price clearfix">$59 <span class="highlight">/mo</span></div>
																</div>
															</div>
															<div class="row">
																<div class="col-sm-12">
																	<div class="phone-quote-car">2005 Chevrolet Equinox -  CA</div>
																</div>
															</div>
														</li>
														<li class="comp-list">
															<div class="row">
																<div class="col-sm-7">
																	<div class="pull-left phone-quote-company">Everest</div>
																</div>
																<div class="col-sm-5">
																	<div class="pull-right phone-quote-price clearfix">$52 <span class="highlight">/mo</span></div>
																</div>
															</div>
															<div class="row">
																<div class="col-sm-12">
																	<div class="phone-quote-car">1998 Chevrolet Cavalier -  NM</div>
																</div>
															</div>
														</li>
														<li class="comp-list">
															<div class="row">
																<div class="col-sm-7">
																	<div class="pull-left phone-quote-company">Foremost Auto</div>
																</div>
																<div class="col-sm-5">
																	<div class="pull-right phone-quote-price clearfix">$36 <span class="highlight">/mo</span></div>
																</div>
															</div>
															<div class="row">
																<div class="col-sm-12">
																	<div class="phone-quote-car">2006 Nissan Altima -  PA</div>
																</div>
															</div>
														</li>
														<li class="comp-list">
															<div class="row">
																<div class="col-sm-7">
																	<div class="pull-left phone-quote-company">Foremost Auto</div>
																</div>
																<div class="col-sm-5">
																	<div class="pull-right phone-quote-price clearfix">$98 <span class="highlight">/mo</span></div>
																</div>
															</div>
															<div class="row">
																<div class="col-sm-12">
																	<div class="phone-quote-car">2016 Kia Forte -  PA</div>
																</div>
															</div>
														</li>
														<li class="comp-list">
															<div class="row">
																<div class="col-sm-7">
																	<div class="pull-left phone-quote-company">Everest</div>
																</div>
																<div class="col-sm-5">
																	<div class="pull-right phone-quote-price clearfix">$41 <span class="highlight">/mo</span></div>
																</div>
															</div>
															<div class="row">
																<div class="col-sm-12">
																	<div class="phone-quote-car">2010 Mercury Grand Marquis -  CA</div>
																</div>
															</div>
														</li>
														<li class="comp-list">
															<div class="row">
																<div class="col-sm-7">
																	<div class="pull-left phone-quote-company">Infinity</div>
																</div>
																<div class="col-sm-5">
																	<div class="pull-right phone-quote-price clearfix">$35 <span class="highlight">/mo</span></div>
																</div>
															</div>
															<div class="row">
																<div class="col-sm-12">
																	<div class="phone-quote-car">2012 Nissan Sentra -  AL</div>
																</div>
															</div>
														</li>
													</ul>
												</div>
											</div>
									</div>
									<div class="phone-wrapper white-phone" id="phone-container"> 
											<div class="phone-screen-wrap"> 
												<!--<div class="screen-top">
													<img src="https://d1o2gtynftcuk2.cloudfront.net/wp-content/themes/sage/dist/images/logosolo.png" class="phone-logo" alt="SmartFinancial Logo">
												</div>-->
												<div class="screen-main">
													<ul class="phone-quotes">
														<li class="comp-list">
															<div class="row">
																<div class="col-sm-7">
																	<div class="pull-left phone-quote-company">Everest</div>
																</div>
																<div class="col-sm-5">
																	<div class="pull-right phone-quote-price clearfix">$59 <span class="highlight">/mo</span></div>
																</div>
															</div>
															<div class="row">
																<div class="col-sm-12">
																	<div class="phone-quote-car">2005 Chevrolet Equinox -  CA</div>
																</div>
															</div>
														</li>
														<li class="comp-list">
															<div class="row">
																<div class="col-sm-7">
																	<div class="pull-left phone-quote-company">Everest</div>
																</div>
																<div class="col-sm-5">
																	<div class="pull-right phone-quote-price clearfix">$52 <span class="highlight">/mo</span></div>
																</div>
															</div>
															<div class="row">
																<div class="col-sm-12">
																	<div class="phone-quote-car">1998 Chevrolet Cavalier -  NM</div>
																</div>
															</div>
														</li>
														<li class="comp-list">
															<div class="row">
																<div class="col-sm-7">
																	<div class="pull-left phone-quote-company">Foremost Auto</div>
																</div>
																<div class="col-sm-5">
																	<div class="pull-right phone-quote-price clearfix">$36 <span class="highlight">/mo</span></div>
																</div>
															</div>
															<div class="row">
																<div class="col-sm-12">
																	<div class="phone-quote-car">2006 Nissan Altima -  PA</div>
																</div>
															</div>
														</li>
														<li class="comp-list">
															<div class="row">
																<div class="col-sm-7">
																	<div class="pull-left phone-quote-company">Foremost Auto</div>
																</div>
																<div class="col-sm-5">
																	<div class="pull-right phone-quote-price clearfix">$98 <span class="highlight">/mo</span></div>
																</div>

															</div>
															<div class="row">
																<div class="col-sm-12">
																	<div class="phone-quote-car">2016 Kia Forte -  PA</div>
																</div>
															</div>
														</li>
														<li class="comp-list">
															<div class="row">
																<div class="col-sm-7">
																	<div class="pull-left phone-quote-company">Everest</div>
																</div>
																<div class="col-sm-5">
																	<div class="pull-right phone-quote-price clearfix">$41 <span class="highlight">/mo</span></div>
																</div>
															</div>
															<div class="row">
																<div class="col-sm-12">
																	<div class="phone-quote-car">2010 Mercury Grand Marquis -  CA</div>
																</div>
															</div>
														</li>
														<li class="comp-list">
															<div class="row">
																<div class="col-sm-7">
																	<div class="pull-left phone-quote-company">Infinity</div>
																</div>
																<div class="col-sm-5">
																	<div class="pull-right phone-quote-price clearfix">$35 <span class="highlight">/mo</span></div>
																</div>
															</div>
															<div class="row">
																<div class="col-sm-12">
																	<div class="phone-quote-car">2012 Nissan Sentra -  AL</div>
																</div>
															</div>
														</li>
													</ul>
												</div>
											</div>
									</div>
								</div>
								<div class="phone-txt">Lorem ipsum dolor site</div>
  							</div>
  							<div class="col-sm-12 col-lg-6 col-xl-6 col-md-6">  								
  								<div class="insurance-content-wrap">
									<h3>Lorem ipsum dolor site</h3>
									<h1>The smart way to compare agents.</h1>
									<div class="tagline"> Compare rates from top rated carriers in less than <span>3 minutes</span></div>
									<form class="form-inline form-home form-action" data-popunder="false" action="/compare/index.php/leads" id="zip-form" method="post">
										<div class="form-group">
											<div class="col-sm-12 ontop">
												<div class="row">
													<select class="form-control input-lg zip-input type-select form_id" id="section" name="section">
														<option value="0" selected="">Choose Section</option>
                                                        <?php foreach($sections as $section) {?>
														<option value="<?php echo $section->id;?>"><?php echo $section->section;?></option>
														<?php }?>
													</select>
													<input inputmode="numeric" id="zip" name="zip" class="form-control input-lg" placeholder="Zip Code" maxlength="5" type="tel">
												</div>
											</div>
											
											<div class="col-sm-12 col-lg-12 col-xl-12 col-md-12" id="btn-wrap">
												<div class="row">				
													<button type="submit" id="main-button" class="btn btn-lg submit-button quote-button"> Get Started</button>
												</div>
											</div>
											<div class="cta-disclaimer text-right">
												<small>Your information is safe &amp; secure</small>
											</div>
										</div>
									</form>
								</div>
  							</div>
  						</div>
  					</div>
  				</div>
  			</section>
  			<section id="top-below-wrap">
	    		<div class="container">
	    			<div class="inner-block at-marginB50">
		    			<div class="row">
				    		<div class="col-sm-12 col-lg-12 col-xl-12 col-md-12">
				    			<div class="smart-txt">
				    				<div class="inner-smart-txt">
				    					<div class="content-txt">
				    						Starting out, recent <span>graduate</span> or ready for a <span>fresh financial</span> start, <span>we save you</span> money on <span>your insurance.</span>
				    					</div>
				    					<div class="btn-wrap">
				    						<a href="javascript:void(0)">Get Started</a>	
				    					</div>
				    				</div>
				    			</div>
				    		</div>
			    		</div>
		    		</div>
	    		</div>
	    	</section>
	    	<section id="grid-top-1">
	    		<div class="container">
	    			<div class="inner-block at-marginB80 service-wrap">
		    			<div class="row">
				    		<div class="col-sm-12 col-lg-12 col-xl-12 col-md-12 text-center at-marginB80 at-marginT50">
				    			<h2>OK, SO WHY COMPARE TREE?</h2>
				    			<div class="tag-line">Well, lots of reasons, but most importantly because..</div>
				    		</div>

				    		<div class="col-sm-12 col-lg-4 col-xl-4 col-md-4 service-first">
				    			<ul class="service">
				    				<li class="border-bottom at-paddingB40 at-marginB50 at-marginT50">
				    					<div class="item1 text-right">
				    						<div class="icon pull-right">
				    							<img src="<?= base_url();?>assets/images/icon1.png" class="img-fluid" alt="We Protect">
				    						</div>
				    						<div class="cont">
				    							<h3>We protect your privacy</h3>
				    							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
				    						</div>
				    						
				    					</div>
				    				</li>
				    				<li>
				    					<div class="item1 text-right">
				    						<div class="icon pull-right">
				    							<img src="<?= base_url();?>assets/images/icon2.png" class="img-fluid" alt="We Protect">
				    						</div>
				    						<div class="cont">
				    							<h3>We're available everywhere</h3>
				    							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
				    						</div>				    						
				    					</div>
				    				</li>
				    			</ul>
				    		</div>
				    		<div class="col-sm-12 col-lg-4 col-xl-4 col-md-4 zoom-out-1 at-marginT--50">
				    			<div class="phone-img-wrap text-center" >
				    				<div class="phone-wrapper white-phone float-none" id="phone-container"> 
											<div class="phone-screen-wrap">
												<div class="screen-main text-left">
													<ul class="phone-quotes">
														<li class="comp-list">
															<div class="row">
																<div class="col-sm-7">
																	<div class="pull-left phone-quote-company">Everest</div>
																</div>
																<div class="col-sm-5">
																	<div class="pull-right phone-quote-price clearfix">$59 <span class="highlight">/mo</span></div>
																</div>
															</div>
															<div class="row">
																<div class="col-sm-12">
																	<div class="phone-quote-car">2005 Chevrolet Equinox -  CA</div>
																</div>
															</div>
														</li>
														<li class="comp-list">
															<div class="row">
																<div class="col-sm-7">
																	<div class="pull-left phone-quote-company">Everest</div>
																</div>
																<div class="col-sm-5">
																	<div class="pull-right phone-quote-price clearfix">$52 <span class="highlight">/mo</span></div>
																</div>
															</div>
															<div class="row">
																<div class="col-sm-12">
																	<div class="phone-quote-car">1998 Chevrolet Cavalier -  NM</div>
																</div>
															</div>
														</li>
														<li class="comp-list">
															<div class="row">
																<div class="col-sm-7">
																	<div class="pull-left phone-quote-company">Foremost Auto</div>
																</div>
																<div class="col-sm-5">
																	<div class="pull-right phone-quote-price clearfix">$36 <span class="highlight">/mo</span></div>
																</div>
															</div>
															<div class="row">
																<div class="col-sm-12">
																	<div class="phone-quote-car">2006 Nissan Altima -  PA</div>
																</div>
															</div>
														</li>
														<li class="comp-list">
															<div class="row">
																<div class="col-sm-7">
																	<div class="pull-left phone-quote-company">Foremost Auto</div>
																</div>
																<div class="col-sm-5">
																	<div class="pull-right phone-quote-price clearfix">$98 <span class="highlight">/mo</span></div>
																</div>
															</div>
															<div class="row">
																<div class="col-sm-12">
																	<div class="phone-quote-car">2016 Kia Forte -  PA</div>
																</div>
															</div>
														</li>
														<li class="comp-list">
															<div class="row">
																<div class="col-sm-7">
																	<div class="pull-left phone-quote-company">Everest</div>
																</div>
																<div class="col-sm-5">
																	<div class="pull-right phone-quote-price clearfix">$41 <span class="highlight">/mo</span></div>
																</div>
															</div>
															<div class="row">
																<div class="col-sm-12">
																	<div class="phone-quote-car">2010 Mercury Grand Marquis -  CA</div>
																</div>
															</div>
														</li>
														<li class="comp-list">
															<div class="row">
																<div class="col-sm-7">
																	<div class="pull-left phone-quote-company">Infinity</div>
																</div>
																<div class="col-sm-5">
																	<div class="pull-right phone-quote-price clearfix">$35 <span class="highlight">/mo</span></div>
																</div>
															</div>
															<div class="row">
																<div class="col-sm-12">
																	<div class="phone-quote-car">2012 Nissan Sentra -  AL</div>
																</div>
															</div>
														</li>
													</ul>
												</div>
											</div>
									</div>
				    			</div>
				    		</div>
				    		<div class="col-sm-12 col-lg-4 col-xl-4 col-md-4 service-last">
				    			<ul class="service">
				    				<li class="border-bottom  at-paddingB40 at-marginB50 at-marginT50">
				    					<div class="item1 text-left">
				    						<div class="icon pull-left">
				    							<img src="<?= base_url();?>assets/images/icon3.png" class="img-fluid" alt="We Protect">
				    						</div>
				    						<div class="cont">
				    							<h3>We're automated</h3>
				    							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
				    						</div>				    						
				    					</div>
				    				</li>
				    				<li>
				    					<div class="item1 text-left">
				    						<div class="icon pull-left">
				    							<img src="<?= base_url();?>assets/images/icon4.png" class="img-fluid" alt="We Protect">
				    						</div>
				    						<div class="cont">
				    							<h3>We give back</h3>
				    							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
				    						</div>				    						
				    					</div>
				    				</li>
				    			</ul>
				    		</div>
			    		</div>
		    		</div>
	    		</div>
	    	</section>	   
	    	<section id="main-content">
	    		<div class="container">
	    			<div class="inner-block">
		    			<div class="row at-nomargin">
				    		<div class="col-sm-12 col-lg-6 col-xl-6 col-md-6" style="position: absolute;left:0;width:100%; padding-left:0;">
				    			<div class="img-wrap" >
				    				<img src="<?= base_url();?>assets/images/page1-img1.jpg" class="img-fluid full-img" alt="">
				    			</div>
				    		</div>
				    		<div class="col-sm-12 col-lg-6 col-xl-6 col-md-6 offset-6 at-marginB60 at-marginT60 at-paddingL40">
				    			<div class="tag-line">Lorem ipsum dolor site</div>
				    			<h2 class="upercase">About <span class="blueColor">Compare</span><span class="greenColor"> Tree</span></h2>	
				    			Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi 
				    			<span class="spacer1-50"></span>
				    			<div class="card-wrap">
				    				<div class="row">
					    				<div class="col-sm-12 col-lg-3 col-xl-3 col-md-3">
					    					<img src="<?= base_url();?>assets/images/page1-img2.jpg" class="img-fluid" alt="">
					    				</div>
					    				<div class="col-sm-12 col-lg-9 col-xl-9 col-md-9">
					    					<h4 class="at-marginB15">Lorem ipsum dolor site</h4>
					    					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi</p>
					    				</div>	
					    				<div class="col-sm-12 col-lg-12 col-xl-12 col-md-12 at-marginT20">
					    					<div class="btn-wrap">
					    						<a href="javascript:void(0)">Contact Us now!</a>	
					    					</div>
					    				</div>
				    				</div>
				    			</div>
				    		</div>
			    		</div>
		    		</div>
	    		</div>
	    	</section> 
	    	<section id="main-content">
	    		<div class="full-container">
	    			<div class="inner-block">
		    			<div class="row at-nopadding">
		    				<div class="col-sm-12 col-lg-4 col-xl-4 col-md-4 bgMidOffBlackColor text-mid-center">
		    					<div class="at-paddingL100  at-paddingR100">
			    					<h2 class="upercase"><span class="fontLight300 whiteColor">What</span> <span class="greenColor"> Our Customer Say</span></h2>
			    					<div class="tag-line offWhiteColor">Lorem ipsum dolor site</div>
		    					</div>
				    		</div>
				    		<div class="col-sm-12 col-lg-4 col-xl-4 col-md-4 bgOffWhiteColor text-mid-center">
				    				<div id="testimonial-slider" class="owl-carousel at-paddingL40  at-paddingR40">
										<div class="testimonial">
											<div class="testimonial-content">
												<div class="testimonial-icon"> <i class="fa fa-quote-left"></i> </div>
												<p class="description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent bibendum dolor sit amet eros imperdiet, sit amet hendrerit nisi vehicula. </p>
											</div>
											<h3 class="title">Ken Adams</h3>
											<span class="post">CEO</span> 
										</div>
										<div class="testimonial">
											<div class="testimonial-content">
												<div class="testimonial-icon"> <i class="fa fa-quote-left"></i> </div>
												<p class="description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent bibendum dolor sit amet eros imperdiet, sit amet hendrerit nisi vehicula. </p>
											</div>
											<h3 class="title">Ken Adams</h3>
											<span class="post">CEO</span> 
										</div>
										<div class="testimonial">
											<div class="testimonial-content">
												<div class="testimonial-icon"> <i class="fa fa-quote-left"></i> </div>
												<p class="description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent bibendum dolor sit amet eros imperdiet, sit amet hendrerit nisi vehicula. </p>
											</div>
											<h3 class="title">Ken Adams</h3>
											<span class="post">CEO</span> 
										</div>
									</div>
				    		</div>

				    		<div class="col-sm-12 col-lg-4 col-xl-4 col-md-4 at-nopadding">	
				    			<div class="img-wrap">
				    				<img src="<?= base_url();?>assets/images/page1-img3.jpg" class="img-fluid full-img" alt="">
				    			</div>			    			
				    		</div>
			    		</div>
		    		</div>
	    		</div>
	    	</section> 	
    	</div>
    	<section id="grid-bottom-1">
	    	<div class="container at-marginT100 at-paddingT30">
	    		<div class="inner-block text-center">
		    		<h2 class="textTransformuppercase">Find a great rate on your insurance</h2>
		    		<p class="block-80 at-paddingL100 at-paddingR100">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolorema aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Ut enim ad minim veniam.</p>
		    	</div>
		    	<div class="at-marginT100">
		    		<div class="text-center">
		    			<img src="<?= base_url();?>assets/images/page1-img4.jpg" class="img-fluid" alt="">
		    		</div>
		    	</div>
	    	</div>
	    </section>
	    <section id="grid-bottom-2">
	    	<div class="container">
	    		<div class="inner-block at-paddingT70 at-paddingB70 whiteColor">
	    			<div class="row">
		    			<div class="col-sm-12 col-lg-4 col-xl-4 col-md-4">
		    				<h2 class="whiteColor">See how much you can save.</h2>
		    			</div>
		    			<div class="col-sm-12 col-lg-8 col-xl-8 col-md-8 at-paddingL40">
		    				<div class="tag-line WhiteColor at-paddingB10">Let's get started</div>
		    					<form class="form-inline form-action home-bottom-form" data-popunder="false" action="quote.html" method="get" id="zip-form" target="_blank">
									<div class="form-group">
										<div class="col-sm-12">
											<div class="row">
												<div class="select-wrap">
													<select class="form-control input-lg zip-input type-select form_id arrow-white" id="form_id" name="form_id">
														<option value="1" selected="">Auto Insurance</option>
														<option value="2">Home Insurance</option>
														<option value="5">Renters Insurance</option>
														<option value="3">Health Insurance</option>
														<option value="4">Life Insurance</option>
														<option value="7">Business Insurance</option>
													</select>
												</div>
												<div class="input-wrap">
													<input inputmode="numeric" id="zip" name="zip" class="form-control input-lg" placeholder="Zip Code" maxlength="5" type="tel">
												</div>
												<div class="btn-wrap">				
													<button type="submit" id="main-button" class="btn btn-lg submit-button quote-button"> Get Started</button>
												</div>
											</div>
										</div>
										<div class="cta-disclaimer text-right fontRegular at-paddingT10">
											<p>Your information is safe &amp; secure</p>
										</div>
									</div>
								</form>
		    			</div>
	    			</div>
	    		</div>
	    	</div>
	    </section> 
	    <footer id="footer" class="BlackColor1 whiteColor">
	    	<section class="footer-grid-1 at-paddingT60 at-paddingB60">
	    		<div class="container">
		    		<div class="inner-block">
		    			<div class="row">
		    				<div class="col-sm-12 col-lg-12 col-xl-12 col-md-12 at-paddingB40">
		    					<h4 class="greenColor fontSemiBold">Find Rates in Your State</h4>
		    				</div>
		    				<div class="col-sm-12 col-lg-2 col-xl-2 col-md-2">
		    					<div class="nav">
			    					<ul>
			    						<li><a href="javascript:void(0)">Alabama</a></li>
			    						<li><a href="javascript:void(0)">Alaska</a></li>
			    						<li><a href="javascript:void(0)">Arizona</a></li>
			    						<li><a href="javascript:void(0)">Arkansas</a></li>
			    						<li><a href="javascript:void(0)">California</a></li>
			    						<li><a href="javascript:void(0)">Colorado</a></li>
			    						<li><a href="javascript:void(0)">Connecticut</a></li>
			    						<li><a href="javascript:void(0)">Delaware</a></li>
			    					</ul>
		    					</div>
		    				</div>
		    				<div class="col-sm-12 col-lg-2 col-xl-2 col-md-2">
		    					<div class="nav">
			    					<ul>
			    						<li><a href="javascript:void(0)">Illinois</a></li>
			    						<li><a href="javascript:void(0)">Indiana</a></li>
			    						<li><a href="javascript:void(0)">Iowa</a></li>
			    						<li><a href="javascript:void(0)">Kansas</a></li>
			    						<li><a href="javascript:void(0)">Kentucky</a></li>
			    						<li><a href="javascript:void(0)">Louisiana</a></li>
			    						<li><a href="javascript:void(0)">Maine</a></li>
			    						<li><a href="javascript:void(0)">Maryland</a></li>
			    					</ul>
		    					</div>
		    				</div>
		    				<div class="col-sm-12 col-lg-2 col-xl-2 col-md-2">
		    					<div class="nav">
			    					<ul>
			    						<li><a href="javascript:void(0)">Montana</a></li>
			    						<li><a href="javascript:void(0)">Nebraska</a></li>
			    						<li><a href="javascript:void(0)">Nevada</a></li>
			    						<li><a href="javascript:void(0)">New Hampshire</a></li>
			    						<li><a href="javascript:void(0)">New Jersey</a></li>
			    						<li><a href="javascript:void(0)">New Mexico</a></li>
			    						<li><a href="javascript:void(0)">Connecticut</a></li>
			    						<li><a href="javascript:void(0)">North Carolina</a></li>
			    					</ul>
		    					</div>
		    				</div>
		    				<div class="col-sm-12 col-lg-2 col-xl-2 col-md-2">
		    					<div class="nav">
			    					<ul>
			    						<li><a href="javascript:void(0)">Rhode Island</a></li>
			    						<li><a href="javascript:void(0)">South Carolina</a></li>
			    						<li><a href="javascript:void(0)">South Dakota</a></li>
			    						<li><a href="javascript:void(0)">Tennessee</a></li>
			    						<li><a href="javascript:void(0)">Texas</a></li>
			    						<li><a href="javascript:void(0)">Utah</a></li>
			    						<li><a href="javascript:void(0)">Vermont</a></li>
			    						<li><a href="javascript:void(0)">Virginia</a></li>
			    					</ul>
		    					</div>
		    				</div>
		    				<div class="col-sm-12 col-lg-2 col-xl-2 col-md-2">
		    					<div class="nav">
			    					<ul>
			    						<li><a href="javascript:void(0)">Rhode Island</a></li>
			    						<li><a href="javascript:void(0)">South Carolina</a></li>
			    						<li><a href="javascript:void(0)">South Dakota</a></li>
			    						<li><a href="javascript:void(0)">Tennessee</a></li>
			    						<li><a href="javascript:void(0)">Texas</a></li>
			    						<li><a href="javascript:void(0)">Utah</a></li>
			    						<li><a href="javascript:void(0)">Vermont</a></li>
			    						<li><a href="javascript:void(0)">Virginia</a></li>
			    					</ul>
		    					</div>
		    				</div>
		    				<div class="col-sm-12 col-lg-2 col-xl-2 col-md-2">
		    					<div class="nav">
			    					<ul>
			    						<li><a href="javascript:void(0)">Rhode Island</a></li>
			    						<li><a href="javascript:void(0)">South Carolina</a></li>
			    						<li><a href="javascript:void(0)">South Dakota</a></li>
			    						<li><a href="javascript:void(0)">Tennessee</a></li>
			    						<li><a href="javascript:void(0)">Texas</a></li>
			    						<li><a href="javascript:void(0)">Utah</a></li>
			    						<li><a href="javascript:void(0)">Vermont</a></li>
			    						<li><a href="javascript:void(0)">Virginia</a></li>
			    					</ul>
		    					</div>
		    				</div>

		    			</div>
		    		</div>
	    		</div>
	    	</section>
	    	<section class="footer-grid-2 at-paddingT30 at-paddingB30 BlackColor2">
	    		<div class="container">
		    		<div class="inner-block">
		    			<div class="row">
		    				<div class="col-sm-12 col-lg-6 col-xl-6 col-md-6">
		    					<h4 class="greenColor fontSemiBold at-paddingB30">Recent Articles</h4>
		    					<div class="recent-article-wrap">
		    						<ul>
		    							<li>
		    								<img src="<?= base_url();?>assets/images/user.png" class="img-fluid" alt="">
		    								<div class="txt">10 Auto Insurance Tips for Parents of Young Drivers.</div>
		    							</li>
		    							<li>
		    								<img src="<?= base_url();?>assets/images/user.png" class="img-fluid" alt="">
		    								<div class="txt">10 Auto Insurance Tips for Parents of Young Drivers.</div>
		    							</li>
		    						</ul>
		    					</div>
		    				</div>
		    				<div class="col-sm-12 col-lg-6 col-xl-6 col-md-6">
		    					<h4 class="greenColor fontSemiBold at-paddingB20">Compare Rates Instantly</h4>
		    					<form class="form-inline form-action home-bottom-form" data-popunder="false" action="quote.html" method="get" id="zip-form" target="_blank">
									<div class="form-group">
										<div class="col-sm-12">
											<div class="row">
												<div class="select-wrap">
													<select class="form-control input-lg zip-input type-select form_id arrow-white" id="form_id" name="form_id">
														<option value="1" selected="">Auto Insurance</option>
														<option value="2">Home Insurance</option>
														<option value="5">Renters Insurance</option>
														<option value="3">Health Insurance</option>
														<option value="4">Life Insurance</option>
														<option value="7">Business Insurance</option>
													</select>
												</div>
												<div class="btn-wrap">				
													<button type="submit" id="main-button" class="btn btn-lg submit-button quote-button"> Get Started</button>
												</div>
											</div>
										</div>
									</div>
								</form>
		    				</div>
		    			</div>
		    		</div>
	    		</div>
	    	</section>
	    	<section class="footer-grid-3 at-paddingT60 at-paddingB40">
	    		<div class="container">
		    		<div class="inner-block">
		    			<div class="row">
		    				<div class="col-sm-12 col-lg-6 col-xl-6 col-md-6">
		    					<div class="conatct-info-wrap clearfix">
		    						<img src="<?= base_url();?>assets/images/footer_logo.png" class="img-fluid" alt="">
		    						<div class="info-wrap">
		    							<h4 class="greenColor fontSemiBold">Visit us</h4>
		    							<p class="at-nomargin">1901 Newport Boulevard Suite 300</p>
		    							<p>Costa Mesa, CA  92627</p>
		    							<h4 class="greenColor fontSemiBold at-paddingT10">Call us</h4>
		    							<p>855.214.2291</p>
		    						</div>		    						
		    					</div>
		    					<div class="social-wrap clearfix at-paddingT40">
		    						<ul>
		    							<li><a href="javascript:void(0)"><i class="fa fa-facebook"></i></a></li>
		    							<li><a href="javascript:void(0)"><i class="fa fa-twitter"></i></a></li>
		    							<li><a href="javascript:void(0)"><i class="fa fa-skype"></i></a></li>
		    							<li><a href="javascript:void(0)"><i class="fa fa-google-plus"></i></a></li>
		    						</ul>
		    					</div>
		    				</div>
		    				<div class="col-sm-12 col-lg-6 col-xl-6 col-md-6">
		    					<div class="row">
			    					<div class="col-sm-12 col-lg-6 col-xl-6 col-md-6">
			    						<h4 class="greenColor fontSemiBold">Useful Links</h4>
			    						<div class="nav">
					    					<ul>
					    						<li><a href="javascript:void(0)">Home</a></li>
					    						<li><a href="javascript:void(0)">About us</a></li>
					    						<li><a href="javascript:void(0)">Contact Us</a></li>
					    						<li><a href="javascript:void(0)">Careers</a></li>
					    						<li><a href="javascript:void(0)">Privacy Policy</a></li>
					    						<li><a href="javascript:void(0)">Terms of Use</a></li>
					    						<li><a href="javascript:void(0)">For Agents</a></li>
					    					</ul>
				    					</div>
			    					</div>
			    					<div class="col-sm-12 col-lg-6 col-xl-6 col-md-6">
			    						<h4 class="greenColor fontSemiBold">Insurance Quotes</h4>
			    						<div class="nav">
					    					<ul>
					    						<li><a href="javascript:void(0)">Auto Insurance</a></li>
					    						<li><a href="javascript:void(0)">Health Insurance</a></li>
					    						<li><a href="javascript:void(0)">Home Insurance</a></li>
					    						<li><a href="javascript:void(0)">Renters Insurance</a></li>
					    						<li><a href="javascript:void(0)">Life Insurance</a></li>
					    						<li><a href="javascript:void(0)">Commercial Insurance</a></li>
					    						<li><a href="javascript:void(0)">Insurance by State</a></li>
					    						<li><a href="javascript:void(0)">Find an Agent</a></li>
					    					</ul>
				    					</div>
			    					</div>
		    					</div>
		    				</div>
		    			</div>
		    		</div>
	    		</div>
	    	</section>
	    	<section class="copyright">
	    		<div class="container">
		    		<div class="inner-block border-bottom">
		    			<div class="row">
		    				<div class="grey-spacer1-10"></div>
		    				<div class="col-sm-12 col-lg-12 col-xl-12 col-md-12 at-paddingT20 at-paddingB20 text-center">
		    					
		    					<p class="grayColor"><small>&copy; 2017 Smartfinancial.com Ins LLC DBA SmartFinancial Insurance. All rights reserved.</small></p>
		    				</div>
		    			</div>
		    		</div>
		    	</div>
	    	</section>
	    </footer>
	<?php $this->load->view("layout/header");?>
	<script src="<?= base_url();?>assets/js/jquery.lettering.js"></script>
    <script type="application/javascript">
	//alert('<?php echo base_url();?>');
	</script>
<!-- 	<script type="text/javascript">
		window.players = function($elem) {
    var top = parseInt($elem.css("top"));
    var temp = -1 * $('.phone-quotes > li').height();
    if(top < temp) {
        top = $('.phone-quotes').height()
        $elem.css("top", top);
    }
    $elem.animate({ top: (parseInt(top)-70) }, 600, function () {
      window.players($(this))
    });
}
$(document).ready(function() {
    var i = 0;
    $(".phone-quotes > li").each(function () {
          $(this).css("top", i);
          i += 70;
          window.players($(this));
    });
});
	</script> -->
	<script type="text/javascript">
		$(document).ready(function(){
		    $("#testimonial-slider").owlCarousel({
		        items:1,
		        itemsDesktop:[1000,1],
		        itemsDesktopSmall:[980,1],
		        itemsTablet:[768,1],
		        itemsMobile:[650,1],
		        pagination:true,
		        navigation:false,
		        slideSpeed:1000,
		        autoPlay:true
		    });
		});
	</script>
    </body>
</html>