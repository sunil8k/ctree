<?php $this->load->view("layout/header");?><!--<?php $this->load->view("layout/header_menu");?>-->
<body id="body_leads" class="at-page site itemid-102 at-quote">
    	<div id="at-page-wrapper">
            <div class="row" id="flex-container">
                <div id="main-left-container" class="col-sm-3 col-lg-3 col-xl-3 col-md-3 left-sidebar mCustomScrollbar">
                    <div class="inner-left-sidebar">
                        <div class="inner-block">
                            <div class="quate-left-header-wrap text-center at-paddingT20 at-paddingB20">
                                <a href="<?=base_url()?>index.php"><img src="<?= base_url();?>assets/images/white_logo.png" class="img-fluid" alt="Compare Tree" width="250px"></a>
                            </div>
                            <!--<div id="left-sectioninfo">
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
                            </div>-->

                        </div>                        
                    </div>
                </div>
                <div id="main-right-container" class="col-sm-12 col-lg-9 col-xl-9 col-md-9 right-content">
                    <div class="inner-right-content">
                        <div class="inner-block at-paddingB15">
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:5%"> 5% </div>
                            </div> 
                            <!--customer or agent Registrsion Form add here-->
                            <div class="row" id="registration-container" style="padding-left:20px;">
                            	<div id="left-question-container" class="col-sm-12 col-lg-8 col-xl-8 col-md-8 inner-left-question-container">
                                    <div class="head">
                                        <h1 id="container-heading">Registration Type</h1>
                                    </div>
                                    <div class="form-step-container">
                                    	<div class="row">
                                            <div class="col-sm-12 col-lg-6 col-xl-6 col-md-6">
                                                
                                                <div class="btn-group " id="number_of_stories">
                                                    <h4 for="Gender">User Type</h4>
                                                    <label class="btn btn-default btn-default" onClick="genFunc('male')">Seeker
                                                    <input id="customer" name="user_type" class="form-control userT"  type="radio" value="customer" checked="checked">
                                                        <span></span>
                                                    </label>
                                                    <label class="btn btn-default btn-default" onClick="genFunc('female')">Agency
                                                    <input id="agent" name="user_type" class="form-control userT"  type="radio" value="agent">
                                                        <span></span>
                                                    </label>
                                                        
                                                </div>
                                            </div>
                                        </div>
                                        <div id="confirm-button3" class="action-buttons at-marginT20">
                                            <a class="btn btn-primary" id="basicinfo-gender-btn"  title="" onClick="loadForm()">Load Form</a>
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
        
       <!--Agent or Customer Load Form Start-->
       <script type="text/javascript">
       function loadForm() {
		   //alert(baseUrl);
		   var cont = $("input[name='user_type']:checked").val();
       		var sUrl = baseUrl+'/'+cont+'/register';
			var dd = '#registration-container';
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
							$(dd).html(data);
						//alert(data);
					}
				} // End of success function of ajax form
			});
       }
	   </script>
       <!--Agent or Customer Load Form end-->
    </body>
</html>