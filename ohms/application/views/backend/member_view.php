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

<!-- PAGE CONTENT BEGINS -->
	<div class="row">
		<div class="col-xs-12">
			<div class="table-header">
				<i class="fa fa-list"></i>
				All Member List
				<span class="add-new-record">
					<i class="fa fa-plus"></i>
					<a class="white" href="<?php echo base_url('user/create_member'); ?>">
						Add New Record
					</a>
				</span>
			</div>
			<div>
				<table id="sample-table-2" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>SN</th>
							<th>Full Name</th>
							<th>Mobile</th>
							<th>Email</th>
							<th>Photo</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody>
						<?php 
							if(!empty($members)){					
								$count = 0;
								foreach($members as $member){
						?>
								<tr>
									<td class="center"><?php echo $count+1; ?></td>
									<td><?php echo $member->first_name.' '.$member->last_name; ?></td>
									<td><?php echo $member->mobile; ?></td>
									<td><?php echo $member->email; ?></td>
									<td>
										<?php if($member->photo == ""){?>
												<img height="50" width="60" src="<?= base_url('');?>assets/backend/img/unknown.png" title="<?php echo $member->photo;?>" />
										<?php }else { ?>
												<a href="<?php echo $member->photo ;?>" target="_blank">
												<img height="50" width="60" src="<?= base_url($member->photo);?>"
												 title="<?php echo $member->photo;?>" />
												 </a>
										<?php } ?>
									</td>
									<td class="center">
										<!-- <a class="blue" data-rel="tooltip" data-placement="bottom" title="Change Password" href="<?php echo base_url()."member/password_change/".$member->id; ?>">
											<i class="ace-icon fa fa-key bigger-120"></i>
										</a> -->

										<!-- <button  class="btn btn-primary btn-xs"  data-panel-id="<?php echo  $member->mem_id; ?>" onclick="selectid2(this)">
                                            <i class="ace-icon fa fa-file bigger-100"></i>
                                        </button> -->

										<a class="blue student_details" title="Details" data-panel-id="<?php echo  $member->mem_id; ?>" onclick="selectid2(this)" href="#" >
											<i class="ace-icon fa fa-file bigger-120"></i>
										</a>|
                                        <a class="green" data-rel="tooltip" data-placement="bottom" title="Edit" href="<?php echo base_url('User/Edit_Member/'.$member->mem_id)?>">
											<i class="ace-icon fa fa-pencil bigger-120"></i>
										</a>|
										<a class="red delete" data-rel="tooltip" data-placement="bottom" title="Delete" href="<?php echo base_url('User/DeleteMember/'.$member->mem_id)?>">
											<i class="ace-icon fa fa-trash-o bigger-120"></i>
										</a>
									</td>
								</tr>
						<?php 
									$count++;
								}//foreach
							}else{
								echo '<tr>';
									echo '<td colspan="8">'.'No Data Found'.'</td>';
								echo '</tr>';
							}
						?>

					</tbody>
				</table>
			</div>
		</div><!-- /.col -->
	</div><!-- /.row -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('STUDENT_DETAILS')?></h3>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
	 <script>

		//$(function(){
		//	$(".student_details").click(function(){
		//		$("#myModalLabel").html("Member Details");
		//		var $mem_id = $(this).attr('mem_id');
		//		alert($mem_id);
		//		$.ajax({
		//			type: 'POST',
		//			url: '<?php //echo base_url(); ?>//User/ViewMemberDetails/'+ mem_id,
		//			data: {
		//				'mem_id': $mem_id
		//			}
		//		}).done(function(response){
		//			//alert(response);
		//			$(".modal-body").html(response);
		//		});
		//		$("#myModal").modal();
		//	});
        //
		//});

        // var modal = document.getElementById('myModal');


        function selectid2(x){

        	$("#myModalLabel").html("Member Details");

            btn = $(x).data('panel-id');

            $.ajax({
                type:'POST',
                url:'<?php echo base_url("User/ViewMemberDetails")?>',
                data:{id:btn},
                cache: false,
                success:function(data) {

                    $('.modal-body').html(data);

                }
            });
            $("#myModal").modal();
        }
	</script>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h3 class="modal-title" id="myModalLabel"></h3>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>