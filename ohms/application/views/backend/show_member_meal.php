<div class="row">
	<div class="col-xs-12">
		<div class="widget-box">
			<div class="widget-header widget-header-blue widget-header-flat">
				<i class="fa fa-refresh"></i>&nbsp;								
				<h4 class="widget-title lighter">
					Show Individual Member Meal
				</h4>
			</div>
			<div class="widget-body">
				<div class="widget-main">
					<div class="step-content pos-rel" id="step-container">
						<div class="step-pane active" id="step1">
							<form name="user" class="form-horizontal" id="user-submit" action="<?php echo base_url('Meal/show_member_meal'); ?>" method="post" enctype="multipart/form-data" autocomplete="off">
								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="group_id">Member Name</label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<select class="col-xs-12 col-sm-4" name="member_id">
												<?php getMembers(); ?>
											</select>
											&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
										</div>
									</div>
								</div>
								
								<div class="form-group">
									<div class="col-md-offset-1 col-md-9">
										<button class="btn btn-sm btn-info" type="submit">
											<i class="ace-icon fa fa-check"></i>
											Search
										</button>
										&nbsp; &nbsp;
										<button class="btn btn-sm cancel" type="button">
											<i class="ace-icon fa fa-times"></i>
											Cancle
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>	
				</div><!-- /.widget-main -->
			</div><!-- /.widget-body -->
		</div><!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->

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
							<th>Total Meal</th>
							<th>Meal Rate</th>
							<th>Total Meal Cost</th>
						</tr>
					</thead>

					<tbody>
						<?php
							if(!empty($Total_Market) && !empty($Total_Meal)){

								$Tmarket = $Total_Market->market_cost;
								$Tmeal = $Total_Meal->total;
								$MealRate = $Tmarket/$Tmeal;
							}

							if(!empty($Meal)){
							$count=1;
							foreach($Meal as $val){ ?>
							<tr>
								<td class="center"><?= $count++; ?></td>
								<td><?= $val->first_name.' '.$val->last_name;?></td>
								<td><?= $val->total;?></td>
								<td><?= $MealRate;?></td>
								<td><?= $MealRate*$val->total;?></td>
							</tr>
						<?php } } ?>
					</tbody>
				</table>
			</div>
		</div><!-- /.col -->
	</div><!-- /.row -->