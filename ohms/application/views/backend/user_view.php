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
				User List
				<span class="add-new-record">
					<i class="fa fa-plus"></i>
					<a class="white" href="<?php echo base_url('user/create'); ?>">
						Add New Record
					</a>
				</span>
			</div>
			<div>
				<table id="sample-table-2" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>SN</th>
							<th>User Name</th>
							<th>Full Name</th>
							<th>Email</th>
							<th>Contact</th>
							<th>Photo</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody>
						<?php 
							if(!empty($users)){					
								$count = 0;
								foreach($users as $user){
						?>
								<tr>
									<td class="center"><?php echo $count+1; ?></td>
									<td><?php echo $user->user_name; ?></td>
									<td><?php echo $user->first_name.' '.$user->last_name; ?></td>
									<td><?php echo $user->email; ?></td>
									<td><?php echo $user->contact; ?></td>
									<td>
										<?php if($user->photo == ""){?>
												<img height="50" width="60" src="<?= base_url('');?>assets/backend/img/unknown.png" title="<?php echo $user->photo;?>" />
										<?php }else { ?>
												<a href="uploads/<?php echo $user->photo ;?>" target="_blank">
												<img height="50" width="60" src="<?= base_url($user->photo);?>"
												 title="<?php echo $user->photo;?>" />
												 </a>
										<?php } ?>
									</td>
									<td class="center">
										<a class="blue" data-rel="tooltip" data-placement="bottom" title="Change Password" href="<?php echo base_url('user/change_password/'.$user->id); ?>">
											<i class="ace-icon fa fa-key bigger-120"></i>
										</a>
										<a class="green" data-rel="tooltip" data-placement="bottom" title="Edit" href="<?php echo base_url('user/edit/'.$user->id); ?>">
											<i class="ace-icon fa fa-pencil bigger-120"></i>
										</a>
										<a class="red delete" data-rel="tooltip" data-placement="bottom" title="Delete" href="<?php echo base_url('user/DeleteUser/'.$user->id); ?>">
											<i class="ace-icon fa fa-trash-o bigger-120"></i>
										</a>
									</td>
								</tr>
						<?php 
									$count++;
								}//foreach
							}else{
								echo '<tr>';
									echo '<td colspan="8">'.'No Data Found'.'</td>';
								echo '</tr>';
							}
						?>

					</tbody>
				</table>
			</div>
		</div><!-- /.col -->
	</div><!-- /.row -->