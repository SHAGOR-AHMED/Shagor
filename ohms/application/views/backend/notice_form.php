<div class="row">
	<div class="col-xs-12">
		<div class="widget-box">
			<div class="widget-header widget-header-blue widget-header-flat">
				<i class="fa fa-refresh"></i>&nbsp;								
				<h4 class="widget-title lighter">
					<?php 
						if(!empty($notice->id)){						
							echo $this->lang->line('NOTICE_UPDATE');
						}else{
							echo $this->lang->line('NOTICE_CREATE');
						}
					?>
				</h4>
			</div>
			<div class="widget-body">
				<div class="widget-main">
					<div class="step-content pos-rel" id="step-container">
						<div class="step-pane active" id="step1">
							<form name="notice" class="form-horizontal" id="notice-submit" action="<?php echo base_url().'notice_mng/ajax_save'; ?>" method="post" >
								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="title"><?php echo $this->lang->line('TITLE'); ?></label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<input type="text" name="title" id="title" class="col-xs-12 col-sm-4" required="required" value="<?php echo set_value('title', $notice->title); ?>" />&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
										</div>
										<div class="help-block" id="title-exists"><?php echo form_error('title'); ?></div>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="notice-name"><?php echo $this->lang->line('LBL_DETAIL'); ?></label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<textarea name="detail" id="detail" class="col-xs-12 col-sm-4"  ><?php echo set_value('detail', $notice->detail); ?></textarea>&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
											
										</div>
										<div class="help-block" id="notice-exists"><?php echo form_error('detail'); ?></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="notice-name"><?php echo $this->lang->line('FROM_DATE'); ?></label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<input type="date" name="from_date" id="from_date" class="col-xs-12 col-sm-4" required="required" value="<?php echo set_value('from_date', $notice->from_date); ?>" />&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
											
										</div>
										<div class="help-block" id="notice-exists"><?php echo form_error('from_date'); ?></div>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="notice-name"><?php echo $this->lang->line('TO_DATE'); ?></label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<input type="date" name="to_date" id="to_date" class="col-xs-12 col-sm-4" required="required" value="<?php echo set_value('to_date', $notice->to_date); ?>" />&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
											
										</div>
										<div class="help-block" id="notice-exists"><?php echo form_error('to_date'); ?></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="publish_date"><?php echo $this->lang->line('publish_date'); ?></label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<input type="date" name="publish_date" id="publish_date" class="col-xs-12 col-sm-4" required="required" value="<?php echo set_value('publish_date', $notice->publish_date); ?>" />&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
										</div>
										<div class="help-block" id="title-exists"><?php echo form_error('publish_date'); ?></div>
									</div>
								</div>
								
								
								
								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="status"><?php echo $this->lang->line('LBL_STATUS'); ?></label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<?php echo form_dropdown('status_id', $status_id, set_value('status_id', $notice->status_id), 'id="status_id" required="required"');?>&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
										</div>
										<div class="help-block"><?php //echo form_error('status'); ?></div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-offset-1 col-md-9">
										<button class="btn btn-sm btn-info" type="submit">
											<i class="ace-icon fa fa-check"></i>
											<?php echo $this->lang->line('SAVE');?>
										</button>
										&nbsp; &nbsp;
										<button class="cancel btn btn-sm" type="button">
											<i class="ace-icon fa fa-times"></i>
											<?php echo $this->lang->line('CANCEL');?>
										</button>
									</div>
								</div>
								<input type="hidden" name="id" id="notice_id" value="<?php echo set_value('id', $notice->id); ?>"  />
							</form>
						</div>
					</div>	
				</div><!-- /.widget-main -->
			</div><!-- /.widget-body -->
		</div><!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->