<?php $this->load->view("layout/header");
//echo $this->session->userdata('email');
//echo $this->session->flashdata('success');
$login = $this->session->userdata('id');
print_r($myProfile);
?>

  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
    <body class="at-page site itemid-101 at-home">
    	<div id="at-page-wrapper">
    		<?php $this->load->view("layout/header_menu");?>
  			<section id="banner-wrap">
  				<div class="container">
  					<div class="inner-block at-paddingT15 at-paddingB15 at-paddingT50 at-paddingB100">
  						<div class="row">
  							
  							<div class="col-sm-3 col-lg-3 col-xl-3 col-md-3">
                                <div class="insurance-content-wrap">
                                    <h3>My Account</h3>
                                    <ul style="list-style:none;">
                                    	<li data-toggle="collapse" id="profile"><a>My Profile</a></li>
                                    	<li data-toggle="collapse" data-target="#myContact1" ><a>My Contacts</a></li>
                                    	<li data-toggle="collapse" data-target="#myQuery" ><a>My Queries</a></li>
                                    	<li data-toggle="collapse" data-target="#My_Notification"><a>Notifications&nbsp;<span style="border-radius:10px; background:#F00; color:#FFFFFF; width:20px;">&nbsp;14</span></a></li>
                                    	<li data-toggle="collapse" data-target="#Change_Password"><a>Change Password</a></li>
                                    	<li><a href="<?= base_url();?>index.php/customer/logout">Logout</a></li>
                                    </ul>
                                    
                                </div>
                            
                            </div>
  							<div class="col-sm-9 col-lg-9 col-xl-9 col-md-9 at-paddingL100 at-paddingT50">  								
  								<div id="my_profile" class="insurance-content-wrap" style="height:300px;">
                                    asdasd
								</div>
								<div id="myQuery" class="insurance-content-wrap" style="height:300px;">                                	
									asdasd
								</div>
                                <div id="myContact1" class="insurance-content-wrap">
                                asdasd
                                </div>                                
                                <div id="My_Notification" class="insurance-content-wrap">
                                asdas
                                </div>                                
                                <div id="Change_Password" class="insurance-content-wrap">
                                asdasd
                                </div>									
  							</div>
  						</div>
  					</div>
  				</div>
  			</section>
  			<section id="top-below-wrap">
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
    <script type="application/javascript">
	//alert('<?php echo base_url();?>');
	</script>

        <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
	<script type="text/javascript">
		$('li').click(function(){
			$('#my_'(this.id)).fadeIn(1000);//.delay(1000).fadeIn(1000);
			//$('#myProfile').collapse('show');
			/*$(this)).find('#'+(this.target)).toggle();*/
			//$("#"+pid).fadeOut(1000);
			//$("#"+nid).delay(1000).fadeIn(1000);
		});
	</script>
    </body>
</html>