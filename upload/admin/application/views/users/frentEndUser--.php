<?php
//session_start();
//if(isset($_SESSION['id'])){
$this->load->view("layout/header");

?>

<!--Menu Close-->

<!--Detail Strip-->
<!--<div id="detail_strip_p">
<div id="detail_strip">
<div class="detail_strip">

<p>User Details</p>

</div>
</div>
</div>-->
<!--Detail Strip-->

<!--Container-->
<div id="container">
<div class="content">

<?php
$this->load->view("layout/left_content");
?>
        
        
<div class="left_content right">
 <div class="user_panel">

  
<div class="detail_container ">
    <div class="head_cont">
    <h2 class="userIcon_grd">
    <table width="99%"><tr><td width="85%">Frent-End Users</td> 
    <td><!--<a href="#" class="button"><img src="images/add_new.png" alt="add new" /></a>--></td>
    </tr>
    </table>
    </h2>
    </div>    
    <!--<fieldset class="field_profile">
                    <legend>Search</legend>
                    <table width="98%" cellpadding="0" cellspacing="2" class="tab_regis">
                          <tr>
                        <td align="right" width="14%"><strong> Product Name:</strong></td>
                        <td width="18%">
                        <select class="drp">
                    <option>Select</option>
                    <option>Bicasule</option>
                    <option>Combiflame</option>
                    </select>
                    </td>
                        <td align="right" width="10%"><strong>Batch No.:</strong></td>
                        <td width="18%">
                        <select class="drp">
                    <option>Select</option>
                    <option>Bicasule</option>
                    <option>Combiflame</option>
                    </select>
                    </td>
                        <td>
                        <button class="button_all"><strong>Show</strong></button> 
                    <button class="button_all"><strong>Reset</strong></button>
                       
                        </td>
                      </tr>
                        </table>
                  </fieldset>-->
    
    <div class="grid_container">
   <!-- <h4>
     <table width="100%" cellpadding="0" cellspacing="0">
    <tr>
    <td width="6%"  align="center"><img src="images/view_product.png" alt="products" /></td>
    <td class="bord_right" width="89%">View Product Series &amp; Code</td>
    <td><a href="#"><img src="images/print.png" alt="print" /></a></td>
    </tr>
    </table>
    </h4>-->
    
    <div class="printed_pro">
     <?php echo form_open('users/frentUser', array('name' => 'searchForm','id'=>'searchForm')); ?>	
    <table width="100%" cellspacing="0" cellpadding="0">
    <tr>
    <td width="8%" align="right" valign="middle">Search :</td>
    <td width="25%" class="grd_pad"><input type="text" name="search" class="rec_searchInput" Placeholder="Type to filter..." value="<?php echo set_value('search',$this->input->post('search'));?>"/></td>
    <td width="56%" align="right">Show Entries :</td>
    <td class="grd_pad">
    <select onchange="pagingJS('')" class="my-dropdown" name="dropdown" id="dropdown">
    <?php if($_REQUEST['dropdown']==""){ ?>
    <option value="2">2</option>
    <option value="5"  selected="selected">5</option>
    <option value="10" >10</option>
    <option value="20" >20</option>
    <?php } else{ ?>
    <option value="2" <?php if($_REQUEST['dropdown']==2){ ?> selected="selected" <?php } ?>>2</option>
    <option value="5" <?php if($_REQUEST['dropdown']==5){ ?> selected="selected" <?php } ?>>5</option>
    <option value="10"<?php if($_REQUEST['dropdown']==10){ ?> selected="selected" <?php } ?>>10</option>
    <option value="20"<?php if($_REQUEST['dropdown']==20){ ?> selected="selected" <?php } ?>>20</option>
    <?php } ?>
    </select>
    
    <input type="hidden" name="pageNo" id="pageNo"  />
    <input type="hidden" name="page" id="page" value="<?php echo $this->input->post('page'); ?>" />
    <input type="hidden" name="id" id="id"  />
    <input type="hidden" name="del" id="del"  />
    </td>
    </tr>
    </table>
     <?php echo form_close();?>
    </div>
    
    <table width="100%" cellpadding="0" cellspacing="0" class="grid" id="table-1">
    <tr >
    <td class="tr_haed" width="5%" align="justify"><strong>Sr.no</strong></td>
  	<td class="tr_haed" width="17%" align="justify"><strong>Name</strong></td>
    <td class="tr_haed bord_left"><strong>Email</strong></td>
    <td class="tr_haed bord_left"><strong>Join Date</strong></td>
    <td class="tr_haed bord_left"><strong>User Type</strong></td>
    <td class="tr_haed bord_left" align="center"><strong>Action</strong></td>
    </tr>
    <?php
	  $i=$no;
	  if($results){
	  foreach($results as $result){
	  $i++; 
	  ?>
    <tr>
    <td class="tr_line1" align="justify"><?php  echo  $i; ?></td>
    <td class="tr_line1" align="justify"><?php echo $result->name; ?></td>
    <td class="tr_line1"><?php echo $result->email; ?></td>
    <td class="tr_line1"><?php echo date ("j M Y - h:i a",strtotime($result->join_date));?></td>
    <td class="tr_line1"><?php echo $result->user_type; ?></td>
    <td class="tr_line1 " align="center">
     
      <div  class="setting">
      <ul>
       <li><a href="#" onclick="profile(<?php echo $result->id; ?>)" class="button" title="View"><img src="<?= base_url();?>assets/images/magni.png" alt="preview" /></a>
     <?php if($result->status==1){ ?>
      <li><a href="#" onclick="active(<?php echo $result->id; ?>)" title="Publish" ><img src="<?= base_url();?>assets/images/check_act.png" alt="check_act" /></a></li>
      <?php }else { ?>
      <li><a href="#" onclick="active(<?php echo $result->id; ?>)" title="un-publish" ><img src="<?= base_url();?>assets/images/check_gr.png" alt="check_act" /></a></li>
      <?php } ?>
      <li><a href="#"  onclick="detete1(<?php echo $result->id; ?>)" title="Delete"><img src="<?= base_url();?>assets/images/delete.png" alt="Delete" /></a></li>
     
            
      </ul> 
      </div>
      </td>
    </tr>
    <?php } }else{?>
    <tr>
    <td colspan="6" align="center" style="padding-top:5px;"><span style="color:#666;"><strong>Data Not Found</strong></span></td>
    </tr>
    <?php } ?>
    
    </table>
    
    </div>
   
   
    
    </div>
  <div class="pageIndex" style="cursor:default !important;">
  <?php echo $links; ?>
      <!--<a href="#" class="active">1</a>
      <a href="#">2</a>
      <a href="#">3</a>
      <a href="#">4</a>
      <a href="#">5</a>
      <a href="#">&gt;&gt;</a>-->
  </div>
</div>

<div class="popupContent">
<a class="popupClose"></a>
<div class="service_head_p">User Detail</div>		
<div id="example-one">
<ul class="nav">
</ul>

<div align="center" class="list-wrap" style="min-width:400px; min-height:150px;"  id="datad">
 

</div>
</div> 

</div>
<div class="backgroundPopup"></div>			


                        
                        
<!--<script type="text/javascript" src="<?= base_url();?>assets/jquery-1.11.0.min.js"></script>-->
<script type='text/javascript' language='javascript'>
function profile(id)
{
	$('#datad').html('<img src="<?= base_url();?>assets/images/ajax-loader2.gif"/>');

		    $.ajax({
                        url: '<?= base_url();?>index.php/users/view?id='+id,
                         type:'POST',
                       //	dataType: 'json',
                          error: function(){
                          $('#datad').html('<p>goodbye world</p>');
                          },

                         success: function(results11){

                        //alert(results);
                       $('#datad').html(results11);

                          } // End of success function of ajax form
                          }); // End of ajax call

}
</script>
<script type='text/javascript' language='javascript'>
function record(str)
{
	alert(str);
   var value =	document.getElementById("dropdown").value;
	/*try {
		document.getElementById("noPage").value = str;
	}
	catch(e) {
		
	}*/
	document.searchForm.submit();
		 alert(value);  
}
</script>



</div>   
</div>
</div>

<!--Container Close-->

<!--footer starts-->
<?php
$this->load->view("layout/footer");
//}else{
//redirect('login/index'); 

//}
?>