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
							<form name="student" class="form-horizontal" id="validation-form" action="<?php echo base_url('user/save_member'); ?>" method="post" enctype="multipart/form-data" >
								<div class="row">
									<div class="col-sm-6">
										<div class="widget-box">
											<div class="widget-header">
												<h4 class="widget-title">BASIC_INFORMATION</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													
													<label for="first-name">FIRST_NAME</label>
													<div class="row">
														<div class="col-xs-8 col-sm-11">
															<div class="input-group">
																<input type="text" name="first_name" id="first-name" required="required" value="" />&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
															</div>
															<div class="help-block"><?php echo form_error('first_name'); ?></div>
														</div>
													</div>

													<label for="last-name">LAST_NAME</label>
													<div class="row">
														<div class="col-xs-8 col-sm-11">
															<div class="input-group">
																<input type="text" name="last_name" id="last-name" required="required" value="" />&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
															</div>
															<div class="help-block"><?php echo form_error('last_name'); ?></div>
														</div>
													</div>
													
													<label for="mobile">MOBILE</label>
													<div class="row">
														<div class="col-xs-8 col-sm-11">
															<div class="input-group">
																<input type="number" name="mobile" id="mobile" required="required" value="" />&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
															</div>
															<div class="help-block"><?php echo form_error('mobile'); ?></div>
														</div>
													</div>
													
													<label for="email">EMAIL</label>
													<div class="row">
														<div class="col-xs-8 col-sm-11">
															<div class="input-group">
																<input type="email" name="email" id="email" required="required" value="" />
															</div>
															<div class="help-block" id="email-exists"><?php echo form_error('email'); ?></div>
														</div>
													</div>
													
													<label for="password">Password</label>
													<div class="row">
														<div class="col-xs-8 col-sm-11">
															<div class="input-group">
																<input type="password" name="password" id="password" value="" />
															</div>
															<div class="help-block"><?php echo form_error('password'); ?></div>
														</div>
													</div>

													<label for="password">Confirm Password</label>
													<div class="row">
														<div class="col-xs-8 col-sm-11">
															<div class="input-group">
																<input type="password" name="confirm_password" id="confirm_password" value="" />
															</div>
															<div class="help-block"><?php echo form_error('confirm_password'); ?></div>
														</div>
													</div>
													
													<label for="address">PERMANENT_ADDRESS</label>
													<div class="row">
														<div class="col-xs-8 col-sm-11">
															<div class="input-group">
																<textarea name="address" cols="25" rows="5" required="required" id="address"></textarea>&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
															</div>
															<div class="help-block"><?php echo form_error('address'); ?></div>
														</div>
													</div>
													
													<label for="student-photo">PHOTO</label>
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
												<h4 class="widget-title">GUARDIAN_INFORMATION</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<label for="father-name">FATHER_NAME</label>
													<div class="row">
														<div class="col-xs-8 col-sm-11">
															<div class="input-group">
																<input type="text" name="father_name" id="father-name" required="required" value="" />&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
															</div>
															<div class="help-block"><?php echo form_error('father_name'); ?></div>
														</div>
													</div>
													
													<label for="mother-name">MOTHER_NAME</label>
													<div class="row">
														<div class="col-xs-8 col-sm-11">
															<div class="input-group">
																<input type="text" name="mother_name" id="mother-name" required="required" value="" />&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
															</div>
															<div class="help-block"><?php echo form_error('mother_name'); ?></div>
														</div>
													</div>
													
													<label for="gardian-name">GARDIAN_NAME</label>
													<div class="row">
														<div class="col-xs-8 col-sm-11">
															<div class="input-group">
																<input type="text" name="gardian_name" id="gardian-name" value="" />
															</div>
															<div class="help-block"><?php echo form_error('gardian_name'); ?></div>
														</div>
													</div>
													
													<label for="gardian-contact">GARDIAN_CONTACT</label>
													<div class="row">
														<div class="col-xs-8 col-sm-11">
															<div class="input-group">
																<input type="number" name="gardian_contact" required="required" id="gardian-contact" value="" />&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
															</div>
															<div class="help-block"><?php echo form_error('gardian_contact'); ?></div>
														</div>
													</div>
													
													<label for="gardian-email">GARDIAN_EMAIL</label>
													<div class="row">
														<div class="col-xs-8 col-sm-11">
															<div class="input-group">
																<input type="email" name="gardian_email" id="gardian-email" value="" />
															</div>
															<div class="help-block"><?php echo form_error('gardian_email'); ?></div>
														</div>
													</div>
													
													<label for="relation-with-gardian">RELATION_WITH_GARDIAN</label>
													<div class="row">
														<div class="col-xs-8 col-sm-11">
															<div class="input-group">
																<textarea name="relation_with_gardian" required="required" cols="25" rows="5" id="relation-with-gardian"></textarea>&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
															</div>
															<div class="help-block"><?php echo form_error('relation_with_gardian'); ?></div>
														</div>
													</div>
													
													
												</div>
											</div>
										</div>	
									</div>
									<div class="form-group">
										<div class="col-md-offset-1 col-md-9">
											<button class="btn btn-sm btn-info" type="submit">
												<i class="ace-icon fa fa-check"></i>
												SAVE
											</button>
											&nbsp; &nbsp;
											<button class="btn btn-sm cancel" type="button">
												<i class="ace-icon fa fa-times"></i>
												CANCLE
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