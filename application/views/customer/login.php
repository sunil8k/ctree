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
                	<div class="form-box" id="login-box">
         
           <?php
				echo form_open('customer/checkLogin', array('name' => 'login','id' => 'clearingForm'));    
			?>
                <div class="body bg-gray col-sm-6 col-lg-6 col-xl-6 col-md-6">
            <h3>Sign In</h3>
                    <div class="form-group">
                    	<?php echo $this->session->flashdata('success'); ?>
                    </div>
                    <div class="form-group">
                       <label>Provider <input type="radio" name="type" value="provider"  class="form-control"/></label>
                       &nbsp;&nbsp;&nbsp;
                       <label>Seeker <input type="radio" name="type" value="seeker" checked class="form-control" /></label>
                    </div>
                    <div class="form-group">
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password"/>
                    </div>          
                    <div class="form-group">
                        <input type="checkbox" name="remember_me"/> Remember me
                    </div>
                    <div>
                    	    
                    <p><a href="<?= base_url();?>index.php/users/forgotPassword">I forgot my password</a></p>
                    <button type="submit" class="btn bg-olive btn-block">Sign me in</button> 
                    </div>
                </div>
                <div class="footer">                                                            
                    
                    
                    <!--<a href="register.html" class="text-center">Register a new membership</a>-->
                </div>
            <?php
				echo form_close();
			?>
        </div>
                
                 </div>
            </div>
    	</div>
        <?php $this->load->view("layout/footer");?>


        


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?= base_url();?>assets/js/bootstrap.min.js" type="text/javascript"></script>   

<script type="text/javascript" src="<?= base_url();?>assets/js/bootstrapValidator.min.js"></script>     

<script type="text/javascript">

$(document).ready(function() {
	
    $('#clearingForm')
        // IMPORTANT: You must declare .on('init.field.bv')
        // before calling .bootstrapValidator(options)
        .on('init.field.bv', function(e, data) {
            // data.bv      --> The BootstrapValidator instance
            // data.field   --> The field name
            // data.element --> The field element

            var $parent = data.element.parents('.form-group'),
                $icon   = $parent.find('.form-control-feedback[data-bv-icon-for="' + data.field + '"]');

            // From v0.5.3, you can retrieve the icon element by
            // $icon = data.element.data('bv.icon');

            $icon.on('click.clearing', function() {
                // Check if the field is valid or not via the icon class
                if ($icon.hasClass('glyphicon-remove')) {
                    // Clear the field
                    data.bv.resetField(data.element);
                }
            });
        })

        .bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                username: {
                    validators: {
                        notEmpty: {
                            message: 'The username is required'
                        }
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'The password is required'
                        }
                    }
                }
            }
        });
});

</script>

    </body>
</html>