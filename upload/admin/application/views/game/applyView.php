<table width="100%" cellspacing="0" class="tab_regis">
<tr>
<td width="32%" align="center" valign="top">
<img src="<?php if($agencys[0]->logo){ echo FRONT_BASE_URL.$agencys[0]->logo; }else{ echo base_url("assets/img/avatar2.png"); }?> " width="170px"  class="post_border"/>
<a target="_blank" href="<?php if($results[0]->doc){ echo FRONT_BASE_URL.$results[0]->doc; }else{ echo base_url("assets/img/avatar2.png"); }?>">Resume</a>
</td>
<td valign="top" >
<div class="comment_scroll">
    <table width="98%" cellpadding="0" cellspacing="0" class="tab_regis">
        <tr>
            <td align="left"><strong>Agency :</strong></td>                                                                                             
            <td>
                <p>
                <?php echo  $agencys[0]->agency; ?>
                </p>
            </td>
        </tr>
        
        <tr>
            <td align="left"><strong>Job Title :</strong></td>                                                                                             
            <td>
                <p>
                	<?php echo  $agencys[0]->title; ?>
                </p>
            </td>
        </tr>
        
        <tr>
            <td align="left"><strong>Applied Name :</strong></td>                                                                                             
            <td>
                <p>
                    <?php echo  $results[0]->first_name." ".$results[0]->last_name;?>
                </p>
            </td>
        </tr>
        
        <tr>
            <td align="left"><strong>E-mail Id :</strong></td>                                                                                             
            <td>
                <p>
                	<?php  echo  $results[0]->email;  ?>
                </p>
            </td>
        </tr>
        
        <tr>
            <td align="left"><strong>Contact Number :</strong></td>                                                                                             
            <td>
                <p>
                    <?php echo  $results[0]->mobile;?>
                </p>
            </td>
        </tr>
               
        <tr>
            <td align="left"><strong>Portfolio :</strong></td>                                                                                             
            <td align="right">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <p>
                    <?php echo  $results[0]->detail; ?>
                </p>
            </td>
        </tr> 
        </table>
        </div>
        </td>
        </tr>
      
    </table> 
</li></ul>

