<table width="100%" cellspacing="0" class="tab_regis">
    <tr>
        <td width="50%" align="center" valign="top">
            <div class="comment_scroll" style="padding:10px;">
                <table width="98%" cellpadding="0" cellspacing="0" class="tab_regis">
                    <tr><td colspan="2"><h4>Lead Customer</h4></td></tr>
                    <tr><td colspan="2"><hr></td></tr>
                    <tr>
                        <td align="left"><strong>Customer</strong></td>                   
                        <td><span><?php echo $lead->customer_name;?></span></td>
                    </tr>
                    <tr>
                        <td align="left"><strong>CustomerID </strong></td>                   
                        <td><span><?php echo $lead->customer_id;?></span></td>
                    </tr>
                    <tr><td colspan="2"><hr></td></tr>
                    <tr><td colspan="2"><h4>Contact Details</h4></td></tr>
                    <tr><td colspan="2"><hr></td></tr>
                    <tr>
                        <td align="left"><strong>Contact Name</strong></td>                   
                        <td><span><?php echo $lead->first_name.' '.$lead->last_name;?></span></td>
                    </tr>
                    <tr>
                        <td align="left"><strong>Email </strong></td>                   
                        <td><span><?php echo $lead->email;?></span></td>
                    </tr>
                    <tr>
                        <td align="left"><strong>Contact No. </strong></td>                   
                        <td><span><?php echo $lead->mobile;?></span></td>
                    </tr>
                    <tr>
                        <td align="left"><strong>Address </strong></td>                   
                        <td><span><?php echo $lead->address;?></span></td>
                    </tr>
                    <tr>
                        <td align="left"><strong>City </strong></td>                   
                        <td><span><?php echo $lead->city;?></span></td>
                    </tr>
                    <tr>
                        <td align="left"><strong>State </strong></td>                   
                        <td><span><?php echo $lead->state;?></span></td>
                    </tr>
                    <tr>
                        <td align="left"><strong>Country </strong></td>                   
                        <td><span><?php echo $lead->country;?></span></td>
                    </tr>
                </table>
            </div>
        </td>
        <td valign="top" >
            <div class="comment_scroll" style="padding:10px;">
                <table width="98%" cellpadding="0" cellspacing="0" class="tab_regis">
                    <tr><td colspan="2"><h4>Lead Detail</h4></td></tr>
                    <tr><td colspan="2"><hr></td></tr>
                    <tr>
                        <td align="left"><strong>LeadID </strong></td>                                                                                             
                        <td><span><?php echo  $lead->lead_id; ?></span></td>
                    </tr>
                    <tr>
                        <td align="left"><strong>SKU </strong></td>                                                                                             
                        <td><span><?php echo  $lead->sku; ?></span></td>
                    </tr>
                    <tr>
                        <td align="left"><strong>Section </strong></td>                                                                                             
                        <td><span><?php echo  $lead->section; ?></span></td>
                    </tr>
                    <?php foreach($details as $detail) {?>
                    <tr>
                        <td align="left"><strong><?php echo ucwords($detail->lead_key);?> </strong></td>                                                                                             
                        <td><span><?php echo $detail->lead_value;?></span></td>
                    </tr>
                	<?php }?>
                    <tr>
                        <td align="left"><strong>Created on </strong></td>                                                                                             
                        <td><span><?php echo  $lead->created; ?></span></td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>  
    <tr><td colspan="2"><hr></td></tr>      
</table> 

