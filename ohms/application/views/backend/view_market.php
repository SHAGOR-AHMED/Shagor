<?php 
	if(!empty($message)){
?>
	<div class="alert alert-block alert-success">
		<button type="button" class="close" data-dismiss="alert">
			<i class="ace-icon fa fa-times"></i>
		</button>
		<i class="ace-icon fa fa-check green"></i>
		<?php echo $message; ?>
	</div>

<?php } ?>

<!-- PAGE CONTENT BEGINS -->
	<div class="row">
		<div class="col-xs-12">
			<div class="table-header">
				<i class="fa fa-list"></i>
				All Market Cost List
				<span class="add-new-record">
					
				</span>
			</div>
			<div>
				<table id="sample-table-2" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>SN</th>
							<th>Member Name</th>
							<th>Date</th>
							<th>Total Market Cost</th>
						</tr>
					</thead>

					<tbody>
						<?php
							$count=1;
							foreach($market_cost as $market){ ?>
							<tr>
								<td class="center"><?= $count++; ?></td>
								<td><?= $market->first_name.' '.$market->last_name;?></td>
								<td><?= $market->market_date;?></td>
								<td><?= $market->market_cost;?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div><!-- /.col -->
	</div><!-- /.row -->