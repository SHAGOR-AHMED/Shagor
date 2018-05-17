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
			All Notices List
			<span class="add-new-record">
				<i class="fa fa-plus"></i>
				<a class="white" href="<?php echo base_url('Notice/AddNotices'); ?>">
					Add New Record
				</a>
			</span>
		</div>
		<div>
			<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>SN</th>
						<th>Date</th>
						<th>Purpose</th>
						<th>Notice</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>

				<tbody>
					<?php
						$count=1;
						foreach($all_notices as $notices){ ?>
						<tr>
							<td class="center"><?= $count++; ?></td>
							<td><?= $notices->created_date;?></td>
							<td><?= $notices->purpose_notice;?></td>
							<td><?= $notices->notices;?></td>
							<td>
								<?php
									if($notices->status == 1){
										echo "Active";
									}elseif ($notices->status == 0) {
										echo "Inactive";
									}
								?>
							</td>
							<td>
								<a class="green" data-rel="tooltip" data-placement="bottom" title="Edit" href="<?php echo base_url('Notice/edit_notice/'.$notices->notice_id); ?>">
									<i class="ace-icon fa fa-pencil bigger-120"></i>
									</a>|
								<?php
									if($notices->status == 1){ ?>
										
										<a class="red" data-rel="tooltip" data-placement="bottom" title="Inactive" href="<?php echo base_url('Notice/Inactive_notice/'.$notices->notice_id); ?>" onclick="return confirm('Are you sure.?');">
											<i class="ace-icon fa fa-lock bigger-120"></i>
										</a>

								<?php }elseif ($notices->status == 0) { ?>

										<a class="red" data-rel="tooltip" data-placement="bottom" title="Active" href="<?php echo base_url('Notice/Active_notice/'.$notices->notice_id); ?>" onclick="return confirm('Are you sure.?');">
											<i class="ace-icon fa fa-unlock bigger-120"></i>
										</a>
										
								<?php } ?>
								
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div><!-- /.col -->
</div><!-- /.row -->