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
				All Members Meal List
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
							<th>Breakfast</th>
							<th>Lunch</th>
							<th>Dinner</th>
							<th>Total Meal</th>
						</tr>
					</thead>

					<tbody>
						<?php
							$count=1;
							foreach($all_meal as $meal){ ?>
							<tr>
								<td class="center"><?= $count++; ?></td>
								<td><?= $meal->first_name.' '.$meal->last_name;?></td>
								<td><?= $meal->date;?></td>
								<td><?= $meal->morning;?></td>
								<td><?= $meal->lunch;?></td>
								<td><?= $meal->dinner;?></td>
								<td><?= $meal->total;?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div><!-- /.col -->
	</div><!-- /.row -->