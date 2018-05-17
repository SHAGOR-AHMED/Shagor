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
	<?php 
		}
	?>

<!-- PAGE CONTENT BEGINS -->
	<div class="row">
		<div class="col-xs-12">
			<div class="table-header">
				<i class="fa fa-list"></i>
				<?php echo $this->lang->line('NOTICE_LIST'); ?>
				<span class="add-new-record">
					<i class="fa fa-plus"></i>
					<a class="white" href="<?php echo base_url()."notice_mng/create"; ?>">
						<?php echo $this->lang->line('ADD_NEW_RECORD');?>
					</a>
				</span>
			</div>
			<div>
				<table id="sample-table-2" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>
								<?php echo $this->lang->line('SL_NO'); ?>
							</th>
							
							<th>
								<?php echo $this->lang->line('TITLE'); ?>
							</th>
							<th>
								<?php echo $this->lang->line('Publish_date'); ?>
							</th>
							<th>
								<?php echo $this->lang->line('DETAIL'); ?>
							</th>
							
							<th>
								<?php echo $this->lang->line('STATUS'); ?>
							</th>
							<th>
								<?php echo $this->lang->line('ACTION'); ?>
							</th>
						</tr>
					</thead>

					<tbody>
						<?php 
							if(!empty($notices)){					
								$count = 0;
								foreach($notices as $notice){
									$status = ($notice->status_id == '1') ? "Active" : "Inactive";
						?>
								<tr>
									<td class="center"><?php echo $count+1; ?></td>
									<td><?php echo $notice->title; ?></td>
									<td><?php echo $notice->publish_date; ?></td>
									<td><?php echo $notice->detail; ?></td>
									<td><?php echo $status; ?></td>
									<td class="center">
										<a class="green" href="<?php echo base_url()."notice_mng/edit/".$notice->id; ?>">
											<i class="ace-icon fa fa-pencil bigger-130"></i>
										</a>
										<a class="red delete" href="<?php echo base_url()."notice_mng/delete/".$notice->id; ?>">
											<i class="ace-icon fa fa-trash-o bigger-130"></i>
										</a>
									</td>
								</tr>
						<?php 
									$count++;
								}//foreach
							}else{
								echo '<tr>';
									echo '<td colspan="5">'.$this->lang->line("NO_DATA_FOUND").'</td>';
								echo '</tr>';
							}
						?>

					</tbody>
				</table>
			</div>
		</div><!-- /.col -->
	</div><!-- /.row -->
	<!-- PAGE CONTENT ENDS -->