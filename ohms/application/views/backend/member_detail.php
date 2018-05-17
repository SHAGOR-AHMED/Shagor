<div class="row">
	<div class="col-sm-12">
		<div class="widget-box">
			<div class="widget-header">
				<h4 class="widget-title">BASIC INFORMATION</h4>
			</div>

			<div class="widget-body">
				<div class="widget-main">

					<div class="form-group">
						<div class="clearfix">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="reg-no">Full Name:</label>
							<div class="col-sm-5"><?php echo $MemberDesc->first_name.' '.$MemberDesc->last_name; ?></div>
						</div>
					</div>

					<div class="form-group">
						<div class="clearfix">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="reg-no">Contact No:</label>
							<div class="col-sm-5"><?php echo $MemberDesc->mobile; ?></div>
						</div>
					</div>

					<div class="form-group">
						<div class="clearfix">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="reg-no">E-mail:</label>
							<div class="col-sm-5"><?php echo $MemberDesc->email; ?></div>
						</div>
					</div>
                    
				</div>
			</div>
		</div>
	</div>

	<div class="col-sm-12">
		<div class="widget-box">
			<div class="widget-header">
				<h4 class="widget-title">GUARDIAN INFORMATION</h4>
			</div>

			<div class="widget-body">
				<div class="widget-main">

					<div class="form-group">
						<div class="clearfix">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="reg-no">Father Name:</label>
							<div class="col-sm-5"><?php echo $MemberDesc->father_name; ?></div>
						</div>
					</div>

					<div class="form-group">
						<div class="clearfix">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="reg-no">Mother Name:</label>
							<div class="col-sm-5"><?php echo $MemberDesc->mother_name; ?></div>
						</div>
					</div>

					<div class="form-group">
						<div class="clearfix">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="reg-no">Address:</label>
							<div class="col-sm-5"><?php echo $MemberDesc->address; ?></div>
						</div>
					</div>

					<div class="form-group">
						<div class="clearfix">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="reg-no">Local Guardian Name:</label>
							<div class="col-sm-5"><?php echo $MemberDesc->gardian_name; ?></div>
						</div>
					</div>

					<div class="form-group">
						<div class="clearfix">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="reg-no">Contact No:</label>
							<div class="col-sm-5"><?php echo $MemberDesc->gardian_contact; ?></div>
						</div>
					</div>

					<div class="form-group">
						<div class="clearfix">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="reg-no">E-mail:</label>
							<div class="col-sm-5"><?php echo $MemberDesc->gardian_email; ?></div>
						</div>
					</div>

					<div class="form-group">
						<div class="clearfix">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="reg-no">Relation:</label>
							<div class="col-sm-5"><?php echo $MemberDesc->relation_with_gardian; ?></div>
						</div>
					</div>
                    
				</div>
			</div>
		</div>
	</div>

