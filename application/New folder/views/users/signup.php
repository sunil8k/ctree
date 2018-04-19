
<?php $this->load->view("layout/header");?>
<?php $this->load->view("layout/menu");?>
<section id="contact1">
        <div class="container-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5 col-sm-offset-2">
                        <div class="contact-form">
                            <h3>Signup</h3>
							<div class="form-group">
                            	<span><?php echo $this->session->flashdata('unsuccess');?></span>
                            	<span><?php echo $this->session->flashdata('logout');?></span>
                            </div>

                            <form id="login-form" name="contact-form" method="post" action="<?= base_url();?>index.php/users/signupCheck">
                                <div class="form-group">
                                   <span>Customer</span> <input type="radio" name="user_type" class="form-control1" value="customer" checked="checked">
                                   <span>Agency</span> <input type="radio" name="user_type" class="form-control1" value="agency">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
                                </div>
                                <div class="form-group">
                                   <span>Male</span> <input type="radio" name="gender" class="form-control1" value="male" checked="checked">
                                   <span>Female</span> <input type="radio" name="gender" class="form-control1" value="female">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <div class="form-group"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
<?php $this->load->view("layout/footer");?>