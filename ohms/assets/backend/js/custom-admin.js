$(document).ready(function () {

	$(".cancel").click(function(){
   		history.go(-1);
  	});
	

	$('#contact').keyup( function(e){
		if ($(this).val().length > 11) { 
			alert("Mobile no must be 11 digits!");
			$(this).val('');
			return false;
			//$(this).val($(this).val().substr(0, max_chars));
		}
	});
	
	$('#mobile').keyup( function(e){
		if ($(this).val().length > 13) { 
			alert("Mobile no must be 13 digits!");
			$(this).val('');
			return false;
			//$(this).val($(this).val().substr(0, max_chars));
		}
	});
	
	$('#gardian-contact').keyup( function(e){
		if ($(this).val().length > 11) { 
			alert("Mobile no must be 11 digits!");
			$(this).val('');
			return false;
			//$(this).val($(this).val().substr(0, max_chars));
		}
	});
	
	$(".delete").click(function(){
   		return confirm("Are you sure you want to delete this item?")
  	});
	
	//Only Number Support
	$(".only-number").change(function (e) {
		this.value = Math.abs(parseFloat(this.value));
	});
	
	// Check Exists And then Submit Value by Ajax in User Group Form
	$("#user-group-name" ).blur(function(){
		var id = $("#group_id").val();
		$.ajax({
			url:"http://localhost/school_management/user_group/ajax_save",
			data:{
				user_group_name:this.value,
				submit:'0',
				id:id
			},
			type: "POST"
		}).done(function(data){
			if(data=='1'){
				$("#user-group-exists").html("user group name already exists!");
			}else{
				$("#user-group-exists").html("");
			}
		});

	});
	
	
	$( "#user-group-submit" ).submit(function(event){
		//alert('test');
		event.preventDefault(); 
		var user_group_name = $("#user-group-name").val();
		var id = $("#group_id").val();
		if(user_group_name == ''){
			$("#user-group-exists").html("Please fill out this field!");
			return false;
		}
		$.ajax({
			url:"http://localhost/school_management/user_group/ajax_save",
			data:{
				user_group_name:user_group_name,
				submit:'1',
				id:id
			},
			type: "POST"
		}).done(function(data){
			if(data=='1'){
				$("#user-group-exists").html("user group name already exists!");
			}else if(data=='2'){
				window.location.assign('http://localhost/school_management/user_group/');
			}
		});

	});
	// Check Exists And then Submit Value by Ajax in User Group Form
	
	// Check Exists And then Submit Value by Ajax in User Form
	$("#user-name" ).blur(function(){
		var id = $("#user_id").val();
		var user_name = $("#user-name").val();
		$.ajax({
			url:"http://localhost/school_management/user/ajax_save",
			data:{
				user_name:user_name,
				submit:'0',
				id:id
			},
			type: "POST"
		}).done(function(data){
			if(data=='1'){
				$("#user-exists").html("user name already exists!");
				$("#user-name").focus();
			}else{
				$("#user-exists").html("");
			}
		});

	});
	
	$("#email" ).blur(function(){
		var id = $("#user_id").val();
		var email = $("#email").val();
		$.ajax({
			url:"http://localhost/school_management/user/ajax_save",
			data:{
				email:email,
				submit:'0',
				id:id
			},
			type: "POST"
		}).done(function(data){
			if(data=='3'){
				$("#email-exists").html("Email already exists!");
				$("#email").focus();
			}else{
				$("#email-exists").html("");
			}
		});

	});

	// Check Exists And then Submit Value by Ajax in User Form
	
	// Check Exists And then Submit Value by Ajax in Class Form
	$("#class-name" ).blur(function(){
		var id = $("#class_id").val();
		var status_id = $("#status_id").val();
		$.ajax({
			url:"http://localhost/school_management/class_mng/ajax_save",
			data:{
				class_name:this.value,
				submit:'0',
				status_id:status_id,
				id:id
			},
			type: "POST"
		}).done(function(data){
			if(data=='1'){
				$("#class-exists").html("class name already exists!");
			}else{
				$("#class-exists").html("");
			}
		});

	});
	
	
	$( "#class-submit" ).submit(function(event){
	
		event.preventDefault(); 
		var class_name = $("#class-name").val();
		var id = $("#class_id").val();
		var sectionCheck = $('#section-checkbox').is(':checked');
		var section_flag = (sectionCheck == true) ? '1' : '0';
		var groupCheck = $('#group-checkbox').is(':checked');
		var group_flag = (groupCheck == true) ? '1' : '0';
		var courseCheck = $('#course-checkbox').is(':checked');
		var course_flag = (courseCheck == true) ? '1' : '0';
		var status_id = $("#status_id").val();
		if(class_name == ''){
			$("#class-exists").html("Please fill out this field!");
			return false;
		}
		$.ajax({
			url:"http://localhost/school_management/class_mng/ajax_save",
			data:{
				class_name:class_name,
				submit:'1',
				section_flag:section_flag,
				group_flag:group_flag,
				course_flag:course_flag,
				status_id:status_id,
				id:id
			},
			type: "POST"
		}).done(function(data){
			if(data=='1'){
				$("#class-exists").html("class name already exists!");
			}else if(data=='2'){
				window.location.assign('http://localhost/school_management/class_mng/');
			}
		});
		
		
	});
	// Check Exists And then Submit Value by Ajax in Class Form
	
	// Check Exists And then Submit Value by Ajax in Section Form
	$( "#section-submit" ).submit(function(event){
		
		event.preventDefault(); 
		var section_name = $("#section-name").val();
		var id = $("#section_id").val();
		if(section_name == ''){
			$("#already-exists").html("Please fill out this field!");
			return false;
		}
		$.ajax({
			url:"http://localhost/school_management/section_mng/ajax_exists",
			data:{
				section_name:section_name,
				submit:'1',
				id:id
			},
			type: "POST"
		}).done(function(data){
			if(data=='1'){
				$("#already-exists").html("Section name already exists!");
			}else if(data=='2'){
				window.location.assign('http://localhost/school_management/section_mng/');
			}
		});
		
		
	});
	// Check Exists And then Submit Value by Ajax in Section Form
	
	// Check Exists And then Submit Value by Ajax in Session Form
	$("#year" ).blur(function(){
		var id = $("#session_id").val();
		var year = $("#year").val();
		var status_id = $("#status_id").val();
		$.ajax({
			url:"http://localhost/school_management/session_mng/ajax_save",
			data:{
				year:year,
				submit:'0',
				status_id:status_id,
				id:id
			},
			type: "POST"
		}).done(function(data){
			if(data=='1'){
				$("#year-exists").html("year name already exists!");
			}else{
				$("#year-exists").html("");
			}
		});

	});
	
	$("#session-name" ).blur(function(){
		var id = $("#session_id").val();
		var session_name = $("#session-name").val();
		var status_id = $("#status_id").val();
		$.ajax({
			url:"http://localhost/school_management/session_mng/ajax_save",
			data:{
				session_name:session_name,
				submit:'0',
				status_id:status_id,
				id:id
			},
			type: "POST"
		}).done(function(data){
			if(data=='3'){
				$("#session-exists").html("session name already exists!");
			}else{
				$("#session-exists").html("");
			}
		});

	});
	
	
	$( "#session-submit" ).submit(function(event){
	
		event.preventDefault(); 
		var id = $("#session_id").val();
		var year = $("#year").val();
		var session_name = $("#session-name").val();
		var status_id = $("#status_id").val();
		if(year == '' && session_name == ''){
			$("#year-exists").html("Please fill out this field!");
			$("#session-exists").html("Please fill out this field!");
			return false;
		}else if(year == '' && session_name != ''){
			$("#year-exists").html("Please fill out this field!");
			$("#session-exists").html("");
			return false;
		}else if(year != '' && session_name == ''){
			$("#year-exists").html("");
			$("#session-exists").html("Please fill out this field!");
			return false;
		}
		$.ajax({
			url:"http://localhost/school_management/session_mng/ajax_save",
			data:{
				year:year,
				session_name:session_name,
				submit:'1',
				status_id:status_id,
				id:id
			},
			type: "POST"
		}).done(function(data){
			if(data=='1'){
				$("#session-exists").html("session name already exists!");
			}else if(data=='2'){
				window.location.assign("http://localhost/school_management/session_mng/");
			}
		});
		
	});
	// Check Exists And then Submit Value by Ajax in Session Form
	
	// Check Exists And then Submit Value by Ajax in Group Form
	$("#group-name" ).blur(function(){
		var id = $("#group_id").val();
		var group_name = $("#group-name").val();
		var status_id = $("#status_id").val();
		$.ajax({
			url:"http://localhost/school_management/group_mng/ajax_save",
			data:{
				group_name:group_name,
				submit:'0',
				status_id:status_id,
				id:id
			},
			type: "POST"
		}).done(function(data){
			if(data=='1'){
				$("#group-exists").html("group name already exists!");
			}else{
				$("#group-exists").html("");
			}
		});

	});
	
	
	$( "#group-submit" ).submit(function(event){
	
		event.preventDefault(); 
		var group_name = $("#group-name").val();
		var group_info = $("#group-info").val();
		var id = $("#group_id").val();
		var status_id = $("#status_id").val();
		if(group_name == ''){
			$("#group-exists").html("Please fill out this field!");
			return false;
		}
		$.ajax({
			url:"http://localhost/school_management/group_mng/ajax_save",
			data:{
				group_name:group_name,
				group_info:group_info,
				submit:'1',
				status_id:status_id,
				id:id
			},
			type: "POST"
		}).done(function(data){
			if(data=='1'){
				$("#group-exists").html("group name already exists!");
			}else if(data=='2'){
				window.location.assign('http://localhost/school_management/group_mng/');
			}
		});
		
		
	});
	// Check Exists And then Submit Value by Ajax in Group Form
	
	
	//Function class wise section
	$("#all-section").hide();
	$("#sec_class_id").change(function(){
        var class_id=$("#sec_class_id").val();
		$("#loader_container").show();
        $("#loader_container").html();
		
		$.ajax({
			url: "assign_section/display_section",
			data: {
				class_id:class_id
			},
			type: "POST"
        }).done(function(data){
				if(data == ''){
					$("#all-section").hide();
				}else{
					$("#loader_container").hide();
					$("#all-section").show();
					$("#section_id").html(data);
				}
		});//ajax

      return false;

    });//Function class wise section
	
	//Function class wise group
	$("#all-group").hide();
	$("#class_id").change(function(){
        var class_id=$("#class_id").val();
		$("#loader_container").show();
        $("#loader_container").html();
		$.ajax({
			url: "assign_group/display_group",
			data: {
				class_id:class_id
			},
			type: "POST"
        }).done(function(data){
				if(data == ''){
					$("#all-group").hide();
				}else{
					$("#loader_container").hide();
					$("#all-group").show();
					$("#group_id").html(data);
				}
		});//ajax

      return false;

    });//Function class wise group
	
	//Function class wise course
	$("#all-group").hide();
	$("#course_class_id").change(function(){
        var class_id=$("#course_class_id").val();
		$("#loader_container").show();
        $("#loader_container").html();
		$.ajax({
			url: "assign_course/display_group",
			data: {
				class_id:class_id
			},
			type: "POST"
        }).done(function(data){
				if(data == ''){
					$("#all-group").hide();
				}else{
					$("#loader_container").hide();
					$("#all-group").show();
					$("#group_id").html(data);
				}
		});//ajax

      return false;

    });//Function class wise group
	
	//Function class wise section
	$("#enrolled-class").change(function(){
        var class_id=$("#enrolled-class").val();
		$("#loader_container").show();
        $("#loader_container").html();
		$.ajax({
			url: "http://localhost/school_management/student/display_section_group",
			data: {
				class_id:class_id
			},
			type: "POST"
        }).done(function(data){
			$("#loader_container").hide();
			$("#all-section-group").html(data);
		});//ajax

      return false;

    });//Function class wise section
	
	// Check Exists And then Submit Value by Ajax in student Form
	$("#reg-no" ).blur(function(){
		var id = $("#student_id").val();
		var reg_no = $("#reg-no").val();
		$.ajax({
			url:"http://localhost/school_management/student/ajax_check_exists",
			data:{
				reg_no:reg_no,
				submit:'0',
				id:id
			},
			type: "POST"
		}).done(function(data){
			if(data=='1'){
				$("#reg-exists").html("Registration no already exists!");
				$("#reg-no").focus();
			}else{
				$("#reg-exists").html("");
			}
		});

	});
	
	$("#email" ).blur(function(){
		var id = $("#student_id").val();
		var email = $("#email").val();
		$.ajax({
			url:"http://localhost/school_management/student/ajax_check_exists",
			data:{
				email:email,
				submit:'0',
				id:id
			},
			type: "POST"
		}).done(function(data){
			if(data=='2'){
				$("#email-exists").html("Email already exists!");
				$("#email").focus();
			}else{
				$("#email-exists").html("");
			}
		});

	});
	
	$("#user-name" ).blur(function(){
		var id = $("#student_id").val();
		var user_name = $("#user-name").val();
		$.ajax({
			url:"http://localhost/school_management/student/ajax_check_exists",
			data:{
				user_name:user_name,
				submit:'0',
				id:id
			},
			type: "POST"
		}).done(function(data){
			if(data=='3'){
				$("#user-exists").html("user name already exists!");
				$("#user-name").focus();
			}else{
				$("#user-exists").html("");
			}
		});

	});
	// Check Exists And then Submit Value by Ajax in student Form
	
	//Function class wise section and group for group-sms
	$("#sms_class_id").change(function(){
        var receipent_type=$("#receipent_type").val();
		if(receipent_type == '' || receipent_type == 0){
			alert('Please Select your receipent type!');
			$("#sms_class_id").val('0');
			return false;
		}
		
        var class_id=$("#sms_class_id").val();
		$("#loader_container").show();
        $("#loader_container").html();
		$.ajax({
			url: "http://localhost/school_management/group_sms/display_section_group",
			data: {
				class_id:class_id
			},
			type: "POST"
        }).done(function(data){
			$("#loader_container").hide();
			$("#sms-section-group").html(data);
		});//ajax

      return false;

    });//Function class wise section and group for group-sms
	
	//file upload 
	$('#id-input-file-2').ace_file_input({
		no_file:'No File ...',
		btn_choose:'Choose',
		btn_change:'Change',
		droppable:false,
		onchange:null,
		thumbnail:false //| true | large
		//whitelist:'gif|png|jpg|jpeg'
		//blacklist:'exe|php'
		//onchange:''
		//
	});
	//file upload
	
	$( "#opener" ).click(function() {
      $( "#dialog" ).dialog( "open" );
    });
	
	
  
});

function insertSection(sectionId){
	var sectionCheck = $('#section_'+sectionId).is(':checked');
	var sectionResult = (sectionCheck == true) ? '1' : '0';
	// $("#checkbox_loader").show();
    // $("#checkbox_loader").html();
	var class_id = $('#sec_class_id').val();
	//send ajax
	$.ajax({
		url: "assign_section/insertSection/"+class_id+"/"+sectionId+"/"+sectionResult,
		cache: false,
		method: 'POST',
		dataType: '',
		success: function(response) {
			//$("#checkbox_loader").hide();
		}//success
	});
}

function insertGroup(groupId){
	var groupCheck = $('#group_'+groupId).is(':checked');
	var groupResult = (groupCheck == true) ? '1' : '0';
	var class_id = $('#class_id').val();
	//send ajax
	$.ajax({
		url: "assign_group/insertGroup/"+class_id+"/"+groupId+"/"+groupResult,
		cache: false,
		method: 'POST',
		dataType: '',
		success: function(response) {
		}//success
	});
}


