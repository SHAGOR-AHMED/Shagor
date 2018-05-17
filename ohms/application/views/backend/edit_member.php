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

<div class="row">
	<div class="col-xs-12">
		<div class="widget-box">
			<div class="widget-header widget-header-blue widget-header-flat">
				<i class="fa fa-refresh"></i>&nbsp;								
				<h4 class="widget-title lighter">
					Add New Member
				</h4>
			</div>
			<div class="widget-body">
				<div class="widget-main">
					<div class="step-content pos-rel" id="step-container">
						<div class="step-pane active" id="step1">
							<form name="student" class="form-horizontal" id="validation-form" action="<?php echo base_url('user/Update_Member'); ?>" method="post" enctype="multipart/form-data" >
								<div class="row">
									<div class="col-sm-6">
										<div class="widget-box">
											<div class="widget-header">
												<h4 class="widget-title">Basic Information</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<label for="first-name">First Name</label>
													<div class="row">
														<div class="col-xs-8 col-sm-11">
															<div class="input-group">
																<input type="text" name="first_name" id="first-name" required="required" value="<?= $Member_List->first_name;?>" />&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
															</div>
														</div>
													</div>

													<label for="last-name">Last Name</label>
													<div class="row">
														<div class="col-xs-8 col-sm-11">
															<div class="input-group">
																<input type="text" name="last_name" id="last-name" required="required" value="<?= $Member_List->last_name;?>" />&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
															</div>
															<div class="help-block"><?php echo form_error('last_name'); ?></div>
														</div>
													</div>

													<label for="last-name">User Name</label>
													<div class="row">
														<div class="col-xs-8 col-sm-11">
															<div class="input-group">
																<input type="text" name="user_name" id="user-name" required="required" value="<?= $Member_List->user_name;?>" />&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
															</div>
															<div class="help-block"><?php echo form_error('user_name'); ?></div>
														</div>
													</div>

													<label for="mobile">Mobile</label>
													<div class="row">
														<div class="col-xs-8 col-sm-11">
															<div class="input-group">
																<input type="number" name="mobile" id="mobile" required="required" value="<?= $Member_List->mobile;?>" />&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
															</div>
															<div class="help-block"><?php echo form_error('mobile'); ?></div>
														</div>
													</div>
													
													<label for="email">Email</label>
													<div class="row">
														<div class="col-xs-8 col-sm-11">
															<div class="input-group">
																<input type="email" name="email" id="email" required="required" value="<?= $Member_List->email;?>" />
															</div>
															<div class="help-block" id="email-exists"><?php echo form_error('email'); ?></div>
														</div>
													</div>
													
													<label for="address">Permanent Address</label>
													<div class="row">
														<div class="col-xs-8 col-sm-11">
															<div class="input-group">
																<textarea name="address" cols="25" rows="5" required="required" id="address"><?= $Member_List->address;?></textarea>&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
															</div>
															<div class="help-block"><?php echo form_error('address'); ?></div>
														</div>
													</div>

													<div class="row">
														<div class="col-xs-8 col-sm-11">
															<div class="input-group">
																<img src="<?= base_url($Member_List->photo);?>" class="img-responsive" value="<?= $Member_List->photo; ?>" height="100px" width="120px">
															</div>
															<div class="help-block"></div>
														</div>
													</div>
													
													<label for="student-photo">Photo</label>
													<div class="row">
														<div class="col-xs-8 col-sm-11">
															<div class="input-group">
																<input type="file" name="photo" id="photo" value="" />
															</div>
															<div class="help-block"></div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									
									<div class="col-sm-6">
										<div class="widget-box">
											<div class="widget-header">
												<h4 class="widget-title">Guardian Information</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<label for="father-name">Father Name</label>
													<div class="row">
														<div class="col-xs-8 col-sm-11">
															<div class="input-group">
																<input type="text" name="father_name" id="father-name" required="required" value="<?= $Member_List->father_name;?>" />&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
															</div>
															<div class="help-block"><?php echo form_error('father_name'); ?></div>
														</div>
													</div>
													
													<label for="mother-name">Mother Name</label>
													<div class="row">
														<div class="col-xs-8 col-sm-11">
															<div class="input-group">
																<input type="text" name="mother_name" id="mother-name" required="required" value="<?= $Member_List->mother_name;?>" />&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
															</div>
															<div class="help-block"><?php echo form_error('mother_name'); ?></div>
														</div>
													</div>
													
													<label for="gardian-name">Guardian Name</label>
													<div class="row">
														<div class="col-xs-8 col-sm-11">
															<div class="input-group">
																<input type="text" name="gardian_name" id="gardian-name" value="<?= $Member_List->gardian_name;?>" />
															</div>
															<div class="help-block"><?php echo form_error('gardian_name'); ?></div>
														</div>
													</div>
													
													<label for="gardian-contact">Guardian Contact</label>
													<div class="row">
														<div class="col-xs-8 col-sm-11">
															<div class="input-group">
																<input type="number" name="gardian_contact" required="required" id="gardian-contact" value="<?= $Member_List->gardian_contact;?>" />&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
															</div>
															<div class="help-block"><?php echo form_error('gardian_contact'); ?></div>
														</div>
													</div>
													
													<label for="gardian-email">Guardian Email</label>
													<div class="row">
														<div class="col-xs-8 col-sm-11">
															<div class="input-group">
																<input type="email" name="gardian_email" id="gardian-email" value="<?= $Member_List->gardian_email;?>" />
															</div>
															<div class="help-block"><?php echo form_error('gardian_email'); ?></div>
														</div>
													</div>
													
													<label for="relation-with-gardian">Relation with Guardian</label>
													<div class="row">
														<div class="col-xs-8 col-sm-11">
															<div class="input-group">
																<textarea name="relation_with_gardian" required="required" cols="25" rows="5" id="relation-with-gardian"><?= $Member_List->relation_with_gardian;?></textarea>&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
															</div>
															<div class="help-block"><?php echo form_error('relation_with_gardian'); ?></div>
														</div>
													</div>

													<input type="text" name="mem_id" value="<?= $Member_List->mem_id;?>" />
													
												</div>
											</div>
										</div>	
									</div>
									<div class="form-group">
										<div class="col-md-offset-1 col-md-9">
											<button class="btn btn-sm btn-info" type="submit">
												<i class="ace-icon fa fa-check"></i>
												Update Member
											</button>
											&nbsp; &nbsp;
											<button class="btn btn-sm cancel" type="button">
												<i class="ace-icon fa fa-times"></i>
												Cancle
											</button>
										</div>
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