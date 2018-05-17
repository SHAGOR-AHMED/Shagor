<?php 
	if(!empty($message)){ ?>

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
					Password Change
				</h4>
			</div>
			<div class="widget-body">
				<div class="widget-main">
					<div class="step-content pos-rel" id="step-container">
						<div class="step-pane active" id="step1">
							<form name="user" class="form-horizontal" action="<?php echo base_url('user/password_change/')?>" method="post" id="change_pass_form">
								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="old-password">Old Password</label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<input type="password" name="old_password" id="old-password" required="required" class="col-xs-12 col-sm-4" value="" />&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
										</div>
										<div class="help-block"><?php echo form_error('old_password'); ?></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="new-password">New Password</label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<input type="password" name="new_password" id="new-password" required="required" class="col-xs-12 col-sm-4" value="" />&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
										</div>
										<div class="help-block"><?php echo form_error('new_password'); ?></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="confirm-password">Confirm Password</label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<input type="password" name="confirm_password" id="confirm-password" required="required" class="col-xs-12 col-sm-4" value="" />&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
										</div>
										<div class="help-block"><?php echo form_error('confirm_password'); ?></div>
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
											CANCEL
										</button>
									</div>
								</div>
								<input type="text" name="id" id="user_id" value="<?php echo $user_id; ?>"  />
							</form>
						</div>
					</div>	
				</div><!-- /.widget-main -->
			</div><!-- /.widget-body -->
		</div><!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->

<script>
	$(function(){
		$("#change_pass_form").submit(function(){
			var new_pass = $("#new-password").val();
			var conf_pass = $("#confirm-password").val();
			if(new_pass != conf_pass){
				alert('Password & Confirm Password Does not Match');
				return false;
			}
		});
	});
</script>