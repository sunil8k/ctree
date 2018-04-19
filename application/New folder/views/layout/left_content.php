
<aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                        <?php  $image = $this->users_model->profileImage(); ?>
                            <img src="<?= base_url();?><?php echo $image['image']; ?>" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, <?php echo $this->session->userdata('username'); ?></p>
                             <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    
       
                    
                    <ul class="sidebar-menu">
                        <li class="<?php if($this->uri->segment(1)=='welcome' && ($this->uri->segment(1)=="" || $this->uri->segment(1)=="index")){ ?>active<?php } ?>">
                            <a href="<?= base_url();?>index.php/welcome/index">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
<?php if($this->session->userdata('userType')=='admin'){?>
                       
                        <li class="treeview <?php if($this->uri->segment(1)=='user'){?> active<?php  } ?>">
                            <a href="#">
                                <i class="fa fa-fw fa-sitemap"></i>
                                 <span>Users</span>
                            </a>
                            <ul class="treeview-menu" style="display:block !important;">
                            	 <li class="">
                                    <a href="<?= base_url();?>index.php/users">
                                        <i class="fa fa-angle-double-right"></i>
                                         <span>User List</span>
                                    </a>
                                </li>
                            	
                            </ul>
                        </li> 
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-fw fa-sitemap"></i>
                                 <span>Category</span>
                            </a>
                            <ul class="treeview-menu" style="display:block !important;">
                            	 <li class="">
                                    <a href="<?= base_url();?>index.php/category">
                                        <i class="fa fa-angle-double-right"></i>
                                         <span>Category</span>
                                    </a>
                                </li>
                            	
                            </ul>
                        </li>
        
        <?php } ?>              
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>