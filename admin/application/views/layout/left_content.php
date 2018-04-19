<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <!-- Sidebar user panel -->
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
            <?php  //$image = $this->users_model->profileImage(); ?>
                <img src="<?= base_url();?><?php echo $this->session->userdata('image'); ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <a href="<?= base_url();?>index.php/users/editAdmin"><i class="fa fa-circle text-success"></i><?php echo $this->session->userdata('username'); ?></a>
                 
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="<?php if($this->uri->segment(1)=='welcome' && ($this->uri->segment(1)=="" || $this->uri->segment(1)=="index")){ ?>active<?php } ?>">
                <a href="<?= base_url();?>index.php/welcome/index">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
<?php //if($this->session->userdata('type')=='admin'){?>
            <li class="<?php if($this->uri->segment(1)=='users'){?> active<?php  } ?>">
                <a href="<?= base_url();?>index.php/users">
                    <i class="fa fa-fw fa-user"></i>
                     <span>Customers</span>
                </a>
            </li> 
            <li class="<?php if($this->uri->segment(1)=='admin'){?> active<?php  } ?>">
                <a href="<?= base_url();?>index.php/admin">
                    <i class="fa fa-fw fa-user"></i>
                     <span>Backend Users</span>
                </a>
            </li> 
            <li class="<?php if($this->uri->segment(1)=='agent'){?> active<?php  } ?>">
                <a href="<?= base_url();?>index.php/agent">
                    <i class="fa fa-fw fa-user"></i>
                     <span>Agent Users</span>
                </a>
            </li> 
            <li class="<?php if($this->uri->segment(1)=='category'){?> active<?php  } ?>">
                <a href="<?= base_url();?>index.php/category">
                    <i class="fa fa-fw fa-sitemap"></i>
                     <span>Category</span>
                </a>
            </li>
            <li class="<?php if($this->uri->segment(1)=='section'){?> active<?php  } ?>">
                <a href="<?= base_url();?>index.php/section">
                    <i class="fa fa-fw fa-sitemap"></i>
                     <span>Section</span>
                </a>
            </li>
            <li class="treeview  <?php if($this->uri->segment(1)=='leads' or $this->uri->segment(1)=='bid'){?> active<?php  } ?>">
                <a href="<?= base_url();?>index.php/leads">
                    <i class="fa fa-fw fa-video-camera"></i>
                     <span>Orders</span>
                </a>
                <ul class="treeview-menu" style="display:none;">
                     <li class="<?php if($this->uri->segment(1)=='leads'){?> active<?php  } ?>">
                        <a href="<?= base_url();?>index.php/leads">
                            <i class="fa fa-angle-double-right"></i>
                             <span>All Leads</span>
                        </a>
                    </li>
                    <li class="<?php if($this->uri->segment(1)=='bid'){?> active<?php  } ?>">
                        <a href="<?= base_url();?>index.php/bid/successBid">
                            <i class="fa fa-angle-double-right"></i>
                             <span>Success Bids</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview  <?php if($this->uri->segment(1)=='transaction' or $this->uri->segment(2)=='index'){?> active<?php  } ?>">
                <a href="<?= base_url();?>index.php/leads">
                    <i class="fa fa-fw fa-video-camera"></i>
                     <span>Transaction</span>
                </a>
                <ul class="treeview-menu" style="display:none;">
                     <li class="<?php if($this->uri->segment(2)=='pending'){?> active<?php  } ?>">
                        <a href="<?= base_url();?>index.php/transaction/pending">
                            <i class="fa fa-angle-double-right"></i>
                             <span>Pending</span>
                        </a>
                    </li>
                    <li class="<?php if($this->uri->segment(2)=='success'){?> active<?php  } ?>">
                        <a href="<?= base_url();?>index.php/transaction/success">
                            <i class="fa fa-angle-double-right"></i>
                             <span>Success</span>
                        </a>
                    </li>
                </ul>
            </li>
			
            <li class="<?php if($this->uri->segment(1)=='page'){?> active<?php  } ?>">
                <a href="<?= base_url();?>index.php/page">
                    <i class="fa fa-fw fa-sitemap"></i>
                     <span>Pages</span>
                </a>
            </li>            
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>