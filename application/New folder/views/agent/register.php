<?php $this->load->view("layout/header");?>

    <body class="bg-black">

        <div class="form-box" id="login-box">
         <?php echo $this->session->flashdata('unsuccess'); ?>
            <div class="header">New Registration</div>
           <?php
				echo form_open('customer/save', array('name' => 'register','id' => 'clearingForm'));    
			?>
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="last_name" id="last_name" class="form-control" placeholder="Last Name"/>
                    </div> 
                    <div class="form-group">
                        <input type="text" name="email" id="email" class="form-control" placeholder="Email"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password"/>
                    </div> 
                    <div class="form-group">
                        <input type="password" name="re_password" id="re_password" class="form-control" placeholder="Confirm Password"/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile"/>
                    </div>        
                    <div class="form-group">
                        <input type="radio" name="gender" value="male" id="male" checked /> Male<input type="radio" name="gender" value="female" id="female" /> Female
                    </div>
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-olive btn-block">Sign me in</button>  
                    
                    <p><a href="#" onClick="window.location='<?= base_url();?>index.php/users/forgotPassword'">I forgot my password</a></p>
                    
                    <!--<a href="register.html" class="text-center">Register a new membership</a>-->
                </div>
            <?php
				echo form_close();
			?>
        </div>


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