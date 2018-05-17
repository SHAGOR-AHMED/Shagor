<?php
//$this->load->view('sms_preview');
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

<div class="row">
	<div class="col-xs-12">
		<div class="widget-box">
			<div class="widget-header widget-header-blue widget-header-flat">
				<i class="fa fa-refresh"></i>&nbsp;								
				<h4 class="widget-title lighter">
					Group SMS
				</h4>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<div class="step-content pos-rel" id="step-container">
						<div class="step-pane active" id="step1">
							<form name="group_sms" class="form-horizontal" id="group-sms-submit" action="<?php echo base_url('Sms/save_group_sms'); ?>" method="post">
								
								<div class="modal fade" id="group-sms-preview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
										  <div class="modal-header">
											<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
											<h3 class="modal-title" id="myModalLabel">Group SMS</h3>
										  </div>
										  <div class="modal-body">
												<div class="form-group">
													<div class="clearfix">
														<label class="control-label col-xs-12 col-sm-4 no-padding-right" for="receipent-type-name">Receipent Type</label>
														<div class="all-padding col-xs-12 col-sm-6" id="receipent-type-name"></div>
													</div>
												</div>

												<div class="form-group">
													<div class="clearfix">
														<label class="control-label col-xs-12 col-sm-4 no-padding-right" for="total-sms">Total SMS</label>
														<div class="all-padding col-xs-12 col-sm-6" id="total-sms"></div>
													</div>
												</div>

												<div class="form-group">
													<div class="clearfix">
														<label class="control-label col-xs-12 col-sm-4 no-padding-right" for="group-sms-message">Message</label>
														<div class="all-padding col-xs-12 col-sm-6" id="group-sms-message"></div>
													</div>
												</div>
											</div>
										  
											<div class="modal-footer">
												<button class="btn btn-sm btn-info" type="submit">Send</button>
												<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
								
								
								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="registration-no">Receipent Type</label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<select class="col-xs-12 col-sm-4" name="receipent_type" id="receipent_type">
												<option value="-1">Select Receipent Type</option>
												<option value="1">All Students</option>
												<option value="2">All Students Guardian</option>
											</select>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="message">Message</label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<textarea name="message" cols="25" rows="5" required="required" id="txt_message"></textarea>&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
										</div>
										<p id="remaining">Remaining Charecter"</p>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-offset-1 col-md-9">
										<button class="btn btn-sm btn-info" type="submit">
											<i class="ace-icon fa fa-check"></i>Send
										</button>
										&nbsp; &nbsp;
										<button class="btn btn-warning btn-sm" id="preview-sms" type="button">Preview
										</button>
										&nbsp; &nbsp;
										<button class="btn btn-sm cancel" type="button">
											<i class="ace-icon fa fa-times"></i>Cancle
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(function(){
		$( "#preview-sms" ).click(function() {
			var receipent_text = $("#receipent_type option:selected").text();
			//var message_text = $("#group-sms-message").text();
			var receipent_id = $("#receipent_type").val();
			var message = $("#txt_message").val();
			if(receipent_id == '' || receipent_id == 0){
				alert('Please Select your receipent type!');
				return false;
			}
			$("#receipent-type-name").html(receipent_text);
			
			if(message == ''){
				alert('Please insert your message!');
				return false;
			}
			$("#group-sms-message").html(message);
			
			$.ajax({
				url: "<?php echo base_url(); ?>Sms/preview_group_sms/",
				data: {
					receipent_id:receipent_id
				},
				type: "POST"
			}).done(function(data){
				$("#total-sms").html(data);
			});//ajax
			
			$("#group-sms-preview").modal();
		});
		
		$("#txt_message").keyup(function() {
			this.value = this.value.substr(0,160);	
			$("#remaining").html("(Remaining: "+(160-this.value.length)+" character)");
		});
	});
</script>