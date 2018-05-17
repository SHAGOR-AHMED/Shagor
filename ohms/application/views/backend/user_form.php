<div class="row">
	<div class="col-xs-12">
		<div class="widget-box">
			<div class="widget-header widget-header-blue widget-header-flat">
				<i class="fa fa-refresh"></i>&nbsp;								
				<h4 class="widget-title lighter">
					<?php 
						if(!empty($user->id)){						
							echo "Update User";
						}else{
							echo "Create User";
						}
					?>
				</h4>
			</div>
			<div class="widget-body">
				<div class="widget-main">
					<div class="step-content pos-rel" id="step-container">
						<div class="step-pane active" id="step1">
							<form name="user" class="form-horizontal" id="user-submit" action="<?php echo base_url('user/save_user'); ?>" method="post" enctype="multipart/form-data" autocomplete="off">

								<!-- <div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="group_id">Group Name</label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<select class="col-xs-12 col-sm-4" name="grp">
												<option value="0">select group</option>
												<option value="1">Super Admin</option>
												<option value="2">Admin</option>
											</select>
											&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
										</div>
										<div class="help-block"><?php echo form_error('group_id'); ?></div>
									</div>
								</div> -->
								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="first-name">First Name</label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<input type="text" name="first_name" id="first-name" class="col-xs-12 col-sm-4" required="required" value="" />&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
										</div>
										<div class="help-block"><?php echo form_error('first_name'); ?></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="last-name">Last Name</label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<input type="text" name="last_name" id="last-name" class="col-xs-12 col-sm-4" required="required" value="" />&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
										</div>
										<div class="help-block"><?php echo form_error('last_name'); ?></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="user-name">User Name</label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<input type="text" name="user_name" id="user-name" autocomplete="off" class="col-xs-12 col-sm-4" required="required" value="" />&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
										</div>
										<div class="help-block" id="user-exists"><?php echo form_error('user_name'); ?></div>
									</div>
								</div>
										
								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">Password</label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<input type="password" name="password" id="password" class="col-xs-12 col-sm-4" value="" />&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
										</div>
										<div class="help-block"><?php echo form_error('password'); ?></div>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="confirm-password">Confirm password</label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<input type="password" name="confirm_password" id="confirm-password" class="col-xs-12 col-sm-4" value="" />&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
										</div>
										<div class="help-block"><?php echo form_error('confirm_password'); ?></div>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Email</label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<input type="email" name="email" id="email" class="col-xs-12 col-sm-4" required="required" value="" />&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
										</div>
										<div class="help-block" id="email-exists"><?php echo form_error('email'); ?></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="contact">Mobile No</label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<input type="number" name="contact" id="contact" class="col-xs-12 col-sm-4" required="required" value="" />&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
										</div>
										<div class="help-block"><?php echo form_error('contact'); ?></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="address">Address</label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<textarea name="address" cols="25" rows="5" required="required" id="address" class="col-xs-12 col-sm-4"></textarea>&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
										</div>
										<div class="help-block"><?php echo form_error('address'); ?></div>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="user-photo">Photo</label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<input type="file" name="photo" id="photo" value="" />Max File Size
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
							</form>
						</div>
					</div>	
				</div><!-- /.widget-main -->
			</div><!-- /.widget-body -->
		</div><!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->