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
<?php 
	}
?>

<div class="row">
	<div class="col-xs-12">
		<div class="widget-box">
			<div class="widget-header widget-header-blue widget-header-flat">
				<i class="fa fa-refresh"></i>&nbsp;								
				<h4 class="widget-title lighter">
					Specific SMS
				</h4>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<div class="step-content pos-rel" id="step-container">
						<div class="step-pane active" id="step1">
							<form name="sms" class="form-horizontal" id="sms-submit" action="<?php //echo base_url('Sms/send_sms'); ?>">
								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="registration-no">Member Name</label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<select class="col-xs-12 col-sm-4" name="member_id" id="member_id" onchange="get_mobile_no(this.value)">
												<?php getMembers(); ?>
											</select>
											&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="mobile">Mobile</label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<input type="number" name="mobile" id="mobileno" class="col-xs-12 col-sm-4"  value="" />
											&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
										</div>
										<div class="help-block" id="mobile-required"><?php echo form_error('mobile'); ?></div>
										<p id="output"></p>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="message">Message</label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<textarea name="message" cols="25" rows="5" required="required" id="txt_message"></textarea>&nbsp;&nbsp;<span class="fa fa-asterisk red"></span>
										</div>
										<p id="remaining">Remaining Charecter</p>
										<div class="help-block" id="message-required"><?php echo form_error('message'); ?></div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-offset-1 col-md-9">
										<button class="btn btn-sm btn-info" type="submit">
											<i class="ace-icon fa fa-check"></i>
											Send
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
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

    function get_mobile_no(val) {
        $(document).ready(function () {

            $.ajax({
                url: "<?php echo base_url(); ?>Sms/display_mobile_no/" + val,

                success: function (data, res) {

                    if (res == "success") {
                        $("#mobileno").css("display", "");

                        document.getElementById("mobileno").value = data;

                        document.getElementById("output").innerHTML = "";

                    } else {
                        $("#mobileno").css("display", "none");
                        document.getElementById("output").innerHTML = res;
                    }

                }

            });

        });

    }

</script>

<script>

	$(function(){
		
		$( "#sms-submit" ).submit(function(event){
			event.preventDefault(); 
			var reg_no = $("#registration-no").val();
			var mobile = $("#mobile").val();
			var message = $("#txt_message").val();
			
			if(mobile == ''){
				$("#mobile-required").html("Please fill out this field!");
				return false;
			}else if(txt_message == ''){
				$("#message-required").html("Please fill out this field!");
				return false;
			}
			$.ajax({
				url:"<?php echo base_url();?>Sms/send_sms",
				data:{
					reg_no:reg_no,
					mobile:mobile,
					submit:'1',
					message:message
				},
				type: "POST"
			}).done(function(data){
				if(data=='1'){
					window.location.assign("<?php echo base_url();?>Sms/index");
				}
			});
			
		});

		$("#txt_message").keyup(function() {
			this.value = this.value.substr(0,160);	
			$("#remaining").html("(Remaining: "+(160-this.value.length)+" character)");
		});
	});
</script>