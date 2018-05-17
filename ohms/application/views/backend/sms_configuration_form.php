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
					SMS API CONFIGURATION
				</h4>
			</div>
			<div class="widget-body">
				<div class="widget-main">
					<div class="step-content pos-rel" id="step-container">
						<div class="step-pane active" id="step1">
							<form name="sms_gate" class="form-horizontal" action="<?php echo base_url('Sms/save_configuration'); ?>" method="post" >
								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="sms-gateway">SMS Gateway</label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<input type="text" name="sms_gateway" id="sms-gateway" class="col-xs-12 col-sm-4" value="<?php echo $smsConf->sms_gateway; ?>" required="required" />
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="sms-user-name">SMS User Name</label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<input type="text" name="sms_user_name" id="sms-user-name" class="col-xs-12 col-sm-4" value="<?php echo $smsConf->sms_user_name; ?>" required="required" />
										</div>
									</div>
								</div>
							
								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="sms-port">SMS Post</label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<input type="text" name="sms_port" id="sms-port" class="col-xs-12 col-sm-4" value="<?php echo $smsConf->sms_port; ?>" required="required" />
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-offset-1 col-md-9">
										<button class="btn btn-sm btn-info" type="submit">
											<i class="ace-icon fa fa-check"></i>
											Save
										</button>
										&nbsp; &nbsp;
										<button class="btn btn-sm cancel" type="button">
											<i class="ace-icon fa fa-times"></i>
											Cancle
										</button>
									</div>
								</div>
								<input type="hidden" name="id" id="sms_conf_id" value="<?php echo $smsConf->id; ?>"  />
							</form>
						</div>
					</div>	
				</div><!-- /.widget-main -->
			</div><!-- /.widget-body -->
		</div><!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->