<table class="table table-bordered leaveListTable">
		<thead>
			<tr>
				<th class="center" width="8%">
				  Pur No
				</th>
				<th>Item Name</th>
				<th>Item Quantity</th>
				<th>Current stock</th>
				<th>Purchase Date</th>
				<th width="10%">Action</th>
			</tr>
		</thead>

		<tbody>
		
		<?php 
		   
			 $i = 1;
			 foreach ($allPurchaseInfo as $v){
		 ?>
			<tr style="background-color:#F9F9F9">
				<td class="center">
				   #PUR00<?php echo $v->pur_no; ?>
				</td>

				<td><?php echo $v->item_name; ?></td>
				<td class="hidden-480"><?php echo $v->item_quantity; ?></td>
				<td class="hidden-480"><?php echo $v->current_stock; ?></td>
				<td><?php echo $v->pur_date; ?></td>
				<td>
					<div class="hidden-sm hidden-xs btn-group">
					<button class="btn btn-xs btn-info green2" data-id="<?php echo $v->id ?>"  data-rel="tooltip" title="Edit" data-placement="bottom">
						<i class="ace-icon fa fa-pencil bigger-120"></i>															</button>

					<button class="btn btn-xs btn-danger red" data-id="<?php echo $v->id ?>" data-rel="tooltip" title="Delete" data-placement="bottom" >
						<i class="ace-icon fa fa-trash-o bigger-120"></i>															</button>
					
				</div>
				</td>
			</tr>
		 <?php  }  ?>	
		 
		 
		</tbody>
	</table>