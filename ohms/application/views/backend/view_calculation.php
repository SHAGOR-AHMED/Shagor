
<div class="row">
	<div class="col-xs-12">
		<div class="table-header">
			<i class="fa fa-list"></i>
			Total Calculation
		</div>
		<div>
			<table id="sample-table-2" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>SN</th>
						<th>Member Name</th>
						<th>Paid Date</th>
						<th>Total Payable</th>
						<th>Total Paid</th>
						<th>Have/Give</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>

				<tbody>
					<?php
						if(!empty($all_amount)){
							$count=1;
							foreach ($all_amount as $val) {  ?>
								<tr>
									<td class="center"><?= $count++; ?></td>
									<td><?= $val->first_name.' '.$val->last_name; ?></td>
									<td><?= $val->payment_date; ?></td>
									<td>BDT <?= $val->total_payment; ?></td>
									<td>BDT <?= $val->amount; ?></td>
									<td>
										<?php
											$Rst = $val->total_payment - $val->amount;
											if($val->total_payment > $val->amount){
												echo "BDT ".$Rst." Due";
											}elseif ($val->total_payment < $val->amount) {
												echo "BDT ".$Rst." will have";
											}
										?>
									</td>
									<td>
										<?php
											if($val->total_payment > $val->amount){
												echo "<p style='color:#ff0000;font-weight:bold;'>"."NOT FULL PAID"."</p>";

											}else if($val->total_payment <= $val->amount){
												echo "<p style='color:green;font-weight:bold;'>"."PAID"."</p>";
											}
										?>
									</td>
									<td>View Details</td>
								</tr>

					<?php
							}
						}
					?>
				</tbody>
			</table>
		</div>
	</div><!-- /.col -->
</div><!-- /.row -->