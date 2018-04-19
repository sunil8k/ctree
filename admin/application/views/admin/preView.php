<table width="100%" cellspacing="0" class="tab_regis">
<tr>
<td width="10%" align="center" valign="top">
	<img src="http://localhost<?php echo  base_url().($results[0]['image']?$results[0]['image']:'../userAvatar/avatar.png'); ?>" width="120"  />
    <p><?php echo  ucwords($results[0]['first_name']." ".$results[0]['last_name']); ?></p>
</td>
<td valign="top" >
<div class="comment_scroll" style="margin-left:10px;">
<table width="98%" cellpadding="0" cellspacing="0" class="tab_regis">
<tr>
<td align="left"><strong>Frist Name :</strong></td>                                                                                             
<td>
<span><?php echo  $results[0]['first_name']; ?></span>
</td>
</tr> 
<tr>
<td align="left"><strong>Last Name :</strong></td>                                                                                             
<td>
<span><?php echo  $results[0]['last_name']; ?></span>
</td>
</tr>
<tr>
<td align="left"><strong>Username :</strong></td>                                                                                             
<td>
<span><?php echo  $results[0]['username']; ?></span>
</td>
</tr>
<tr>
<td align="left"><strong>Mobile :</strong></td>                                                                                             
<td>
<span><?php echo  $results[0]['mobile']; ?></span>
</td>
</tr>
<tr>
<td align="left"><strong>Gender :</strong></td>                                                                                             
<td>
<span><?php echo  $results[0]['gender']; ?></span>
</td>
</tr>
<tr>
<td align="left"><strong>E-mail Id :</strong></td>                                                                                             
<td>
<span><?php  echo  $results[0]['email'];  ?></span>
</td>
</tr>
<tr>
<td align="left"><strong>Join-Date :</strong></td>                                                                                             
<td>
<span><?php echo  $results[0]['create_date']; ?></span>
</td>
</tr>
 </table>
 </div>
 </td>
 </tr>
                  
</table> 
</li></ul>
<style type="text/css">
	table td {
		height:35px;
	}
</style>

