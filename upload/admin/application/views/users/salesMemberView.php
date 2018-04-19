<?php 
ini_set('error_reporting','0');
?>

<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>Sr.no</th>
<th>Order ID</th>
<th>Product Quantity</th>
<th>kick Back</th>
<th>kick Back Status</th>
</tr>
</thead>
<tbody>
<?php 
$i=0; 
$pay=0;          
if($ids){
	//echo $ids;
	$arr = explode(',',$ids);
	foreach($arr as $order_id){
		$product_order =$this->users_model->user_detail($order_id); 
		foreach($product_order as $product){  
		$i++;
		if($product->kick_back_status != '2' && $product->kick_back_status != '0')
			$pay += $product->kick_back; 
			//print_r($product);
		 ?>  
            <tr>
				<td><?php  echo  $i; ?></td>
	            <td><?php echo $product->id; ?></td>
                <td><?php echo $product->no_of_product; ?></td>
                <td><?php echo $product->kick_back; ?></td>
                <td><?php if($product->kick_back_status==1){ ?>
                   <strong>Pending -></strong><a href="kickBackcompliteStatusPerOrder?id=<?php echo $product->id; ?>">Send</a>
                   <?php }else{ ?>
                   <strong>Complete</strong>
                   <?php } ?></td>
            </tr>
            
		<?php }
		 }?>
            <tr>
                <td colspan="7" align="center" style="padding-top:5px;"><span style="color:#666;"><strong>Total paid amount:<?php echo $pay?></strong></span></td>
            </tr>
	<?php
}else{?>
<tr>
<td colspan="7" align="center" style="padding-top:5px;"><span style="color:#666;"><strong>Data Not Found</strong></span></td>
</tr>
<?php } ?>
<?php
/*$i=0;            ****************************THis for for all product showing************************
if($ids){
//echo $ids;
$arr = explode(',',$ids);
foreach($arr as $order_id){
$product_order =$this->users_model->product_order($order_id); // From Product order table...
foreach($product_order as $product){                           // From Product order table...

$i++;

$product_detail =$this->users_model->product_detail($product->product_id); // From Product detail table...
foreach($product_detail as $row)
$productDetail = $row;

?>
<tr>
<td><?php  echo  $i; ?></td>
<td><?php echo $productDetail->name; ?></td>
<td><?php echo $product->quantity; ?></td>
<td><?php echo $product->order_id; ?></td>
<td><?php echo $product->status; ?></td>
</tr>
<?php }
}

}  else{?>
<tr>
<td colspan="7" align="center" style="padding-top:5px;"><span style="color:#666;"><strong>Data Not Found</strong></span></td>
</tr>
<?php } */?>

</tbody>
</table>                            