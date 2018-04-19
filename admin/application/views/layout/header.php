<!-- -------------Light Box start------------ -->
<script src="<?= base_url();?>assets/lightbox/js/modernizr.custom.js"></script>
<link rel="stylesheet" href="<?= base_url();?>assets/lightbox/css/lightbox.css" media="screen"/>


<?php
if($this->session->userdata('username')){
	}else{
redirect('users/login');
}
?>
<!---->
<script src="<?= base_url();?>assets/lightbox/js/jquery-1.10.2.min.js"></script>
<script src="<?= base_url();?>assets/lightbox/js/lightbox-2.6.min.js"></script>
<!-- -------------Light Box Close------------ -->

<!-- --------------Use for pagination in page----------- --->
<script type="text/javascript" src="<?= base_url();?>assets/jquery/page/page.js"></script>
<!-- --------------End pagination in page--------------- --->

<header class="header">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
            <a href="<?= base_url();?>index.php/welcome/index" class="logo">
                <h2>CompareTree</h2>
            </a>
               <!--iWant Admin Panel-->
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                       
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $this->session->userdata('username'); ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-black">
                                    <img src="<?= base_url();?><?php echo $this->session->userdata('image'); ?>" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php //echo $image['email']; ?>
                                       <?php //$newDate = date("M-Y", strtotime($image['created']));?>
                                        <small>Welcome <?php echo $this->session->userdata('username'); ?></small>
                                    </p>
                                </li>
                               
                                <li class="user-footer" style="margin:0 auto;">
                                    <div class="pull-left">
                                        <a href="<?= base_url();?>index.php/users/editAdmin" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-left">
                                        <a href="<?= base_url();?>index.php/users/changepassword" class="btn btn-default btn-flat">Change Pwd</a>
                                    </div>
                                    <div class="pull-left">
                                        <a href="<?= base_url();?>index.php/users/logout" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        
       