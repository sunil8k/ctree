<div class="insurance-content-wrap">
    <h3>My Account</h3>
    <ul style="list-style:none;">
        <li><a href="<?= base_url();?>index.php/agent/index?id=<?php echo $profiles->id;?>" >My Profile</a></li>
        <li><a href="<?= base_url();?>index.php/agent/queries?id=<?php echo $profiles->id;?>" >Inbox</a></li>
        <li><a href="<?= base_url();?>index.php/agent/myBid">My Bids</a></li>
        <li><a href="<?= base_url();?>index.php/agent/myContact">My Contacts</a></li>
        <li><a href="<?= base_url();?>index.php/agent/getNotifications">Notifications</a></li>
        <?php if($this->session->userdata('type')=='provider') { ?>
        <li><a href="#">My Report Panel</a></li>
        <li><a href="<?= base_url();?>index.php/agent/users">Users</a></li>
        <li><a href="<?= base_url();?>index.php/agent/myPlans">My Plan</a></li>
        <li><a href="<?= base_url();?>index.php/agent/myBanner">My Banner</a></li>
        <li><a href="<?= base_url();?>index.php/agent/myVideo">My Video</a></li>
        <?php } ?>
        <li><a href="<?= base_url();?>index.php/agent/myTerritories">Territories</a></li>
        <li><a href="<?= base_url();?>index.php/agent/changePassword">Change Password</a></li>
        <li><a href="<?= base_url();?>index.php/customer/logout">Logout</a></li>
    </ul>
   
</div>