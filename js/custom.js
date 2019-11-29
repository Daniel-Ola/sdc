// alert("done");

/*$(document).ready(function(){
	alert(13) ;
	//$("body" , "html").scrollTop("1000px") ;
}) ;*/

$("#loginform").submit(function(event){
	event.preventDefault() ;
	$("#signin").html("Signing in ..") ;
	$form = $(this) , 
	email = $form.find("input[name='email']").val() ,
	password = $form.find("input[name='password']").val() ,
	url = $form.attr("action") ;
	count = 0 ;
	if(email == "")
	{
		count = count + 1 ;
	}
	if(password == "")
	{
		count = count + 1 ;
	}
	if(count != 0)
	{
		alert("Error! Some fields are left empty") ;
	}
	if(count == 0)
	{
		var $login = $.post(url , {
			email: email ,
			password: password ,
			command: "login"
		}) ;

		$login.done(function(data){
			// alert(data) ;
			$("#return").html(data) ;
			$("#return").show() ;
			$("#signin").html("Sign In") ;
		}) ;
	}
}) ;

$("#bkstd").submit(function(event){
	event.preventDefault() ;
	// alert(132) ;
	// $("#presult").html("") ;
	$("#bkbtn").html("Uploading...") ;
	action = $(this).attr("action") ;
	var doing = $.ajax({
		url: action ,
		type: "POST" ,
		data: new FormData(this) ,//or data: {file:new FormData(this)}
		contentType: false ,
		cache: false ,
		processData: false ,
		// command: "upload_profileimg" ,
		success: function(data){
			// alert(data) ;
			/*if(data === "success")
			{
				$.ajax({
					url:"editprofile.php" ,
					success: function(datum){
						$("body" , "html").html(datum) ;
					}
				});*/
				$("#return").html(data) ;
				$("#return").show() ;
				$("#bkbtn").html("<i class='fa fa-plus'></i> Add") ;
			/*}
			else
			{
				$("#return").html(data) ;
				$("#return").show() ;
				$("#bkbtn").html("<i class='fa fa-plus'></i> Add") ;
			}*/
		} ,
		error: function(){
			// alert(data) ;
			$("#return").html(data) ;
			$("#return").show() ;
			$("#bkbtn").html("<i class='fa fa-plus'></i> Add") ;
		}
	}) ;
/*	doing.done(function(data){
		alert(data) ;
	}) ;*/
}) ;

/*$("#bkstd").submit(function(event){
	event.preventDefault() ;
	$("#bkbtn").html("Submitting..") ;
	form = $(this) ,
	sname = form.find("input[name='sname']").val() ,
	sid = form.find("input[name='sid']").val() ,
	ctit = form.find("input[name='ctit']").val() ,
	cstat = form.find("input[name='cstat']").val() ,
	csesn = form.find("input[name='csesn']").val() ,
	csem = form.find("input[name='csem']").val() ,
	url = form.attr("action") ;
	user_id = $("#user_id").val() ;
	// alert(user_id) ;
	count = 0 ;
	if(sname == "")
	{
		count = count+1 ;
	}
	if(sid == "")
	{
		count = count+1 ;
	}
	if(ctit == "")
	{
		count = count+1 ;
	}
	if(cstat == "")
	{
		count = count+1 ;
	}
	if(csem == "")
	{
		count = count+1 ;
	}
	if(csesn == "")
	{
		count = count+1 ;
	}
	if(count != 0)
	{
		alert("error") ;
	}
	else
	{
		var book = $.post(url , {
			sname: sname ,
			sid: sid ,
			ctit: ctit ,
			cstat: cstat ,
			csem: csem ,
			csesn: csesn ,
			user_id: user_id ,
			command: "bookstud"
		}) ;

		book.done(function(data){
			$("#return").html(data) ;
			$("#return").show() ;
			$("#bkbtn").html("<i class='fa fa-plus'></i> Add") ;
		}) ;
	}
	$("html" , "body").animate({scrollTop:"1000px"} , 500) ;
}) ;*/

/*$("#valu").keypress(function(){
	$("#autocomplete").html("Loading ...") ;
	alert(4523) ;
}) ;*/

$("#valu").keyup(function(){
	// alert(31) ;
	para = $("select[name='para']").val() ;
	valu = $(this).val() ;
	// alert(para+" "+valu) ;
	count = 0 ;
	if(para == "")
	{
		$("#parahelp").html("Select a valid search parameter") ;
		count = count + 1;
	}
	if(count == 0)
	{
		var searchcase = $.post("php/actionmanager.php" , {
			para: para ,
			valu: valu ,
			command: "searchcase"
		}) ;

		searchcase.done(function(data){
			$("#autocomplete").html(data) ;
		}) ;
	}
}) ;

$("#adstaf").submit(function(event){
	event.preventDefault() ;
	$("#adstafbtn").html("Adding...") ;
	form = $(this) ,
	sname = form.find("input[name='sname']").val() ,
	smail = form.find("input[name='smail']").val() ,
	stafftype = form.find("select[name='stafftype']").val() ,
	password = form.find("input[name='password']").val() ,
	url = form.attr("action") ;
	user_id = $("#user_id").val() ;
	// alert(user_id) ;
	count = 0 ;
	if(sname == "")
	{
		count = count+1 ;
	}
	if(smail == "")
	{
		count = count+1 ;
	}
	if(stafftype == "")
	{
		count = count+1 ;
	}
	if(password == "")
	{
		count = count+1 ;
	}
	if(count != 0)
	{
		alert("Error! Some fields are left empty") ;
	}
	else
	{
		var adstaff = $.post(url , {
			sname: sname ,
			smail: smail ,
			stafftype: stafftype ,
			password: password ,
			user_id: user_id ,
			command: "add_staff"
		}) ;

		adstaff.done(function(data){
			$("#return").html(data) ;
			$("#return").show() ;
		$("#adstafbtn").html("<i class='fa fa-plus'></i> Add") ;
		}) ;
	}
	   $("html" , "body").animate({scrollTop:"1000px"} , 500) ;
}) ;

$("#changepwrd").submit(function(event){
    event.preventDefault() ;
    $("#changebtn").html("Setting..") ;
    form = $(this) ,
    cpwrd = form.find("input[name='cpwrd']").val() ,
    npwrd = form.find("input[name='npwrd']").val() ,
    cnpwrd = form.find("input[name='cnpwrd']").val() ,
    url = form.attr("action") ;
    user_id = $("#user_id").val() ;
    // alert(npwrd+" "+user_id) ;
    if(npwrd == cnpwrd)
    {
        // alert("same") ;
        var changepwrd = $.post(url , {
            cpwrd: cpwrd ,
            npwrd: npwrd ,
            user_id: user_id ,
            command: "change_pwrd"
        }) ;

        changepwrd.done(function(data){
            // alert(data) ;
            $("#return").html(data) ;
            $("#return").show() ;
    		$("#changebtn").html("<i class='fa fa-plus'></i> Add") ;
        }) ;
       $("html","body").animate({scrollTop:"1000px"} , 500) ;
    }   
    else
    {
        // alert("nay") ;
    }
}) ;


// alert(243) ;
$("#appcase").submit(function(event){
	event.preventDefault() ;
	// alert(13) ;
	url = $(this).attr("action") ;
	$("#appbtn").html("Processing..") ;
	case_id = $("#case_id").val() ;
	p = $("#p_id").val() ;
	var approve = $.post(url , {
		case_id: case_id ,
		command: "approve"
	}) ;

	approve.done(function(data){
		$("#return").html(data) ;
		$("#return").show() ;
		$("#appbtn").html("<i class='fa fa-plus'></i> Approve") ;
		window.location = "punishstat.php?p="+p ;
	}) ;
	$("html" , "body").animate({scrollTop:"100px"} , 500) ;
}) ;

$("#editbtn").click(function(event){
	event.preventDefault() ;
	$(this).html("Updating ...") ;
	role = $("#srole").val() ;
	user_id = $("#sid").val() ;
/*	alert(role) ;
	alert(user_id) ;*/
	count = 0 ;
	if(role == "")
	{
		alert("Please Select a valid role for this staff") ;
		count = count+1 ;
	}
	if(count == 0)
	{
		// alert(13) ;
		var rolechng = $.post("php/actionmanager.php" , {
			role: role ,
			user_id: user_id ,
			command: "change_role"
		}) ;

		rolechng.done(function(data){
			// alert(data) ;
			$("#return").show() ;
			$("#return").html(data) ;
			$("#editbtn").html("<i class='fa fa-plus'></i> Update") ;
		}) ;
	}
}) ;

$("#delstaff").click(function(event){
	event.preventDefault() ;
	$(this).html("Deleting ...") ;
	user_id = $("#sid").val() ;
/*	alert(role) ;
	alert(user_id) ;*/
	count = 0 ;
	if(count == 0)
	{
		// alert(13) ;
		var rolechng = $.post("php/actionmanager.php" , {
			user_id: user_id ,
			command: "del_role"
		}) ;

		rolechng.done(function(data){
			// alert(data) ;
			$("#return").show() ;
			$("#return").html(data) ;
			$("#delstaff").html("<i class='fa fa-trash'></i> Delete") ;
		}) ;
	}
}) ;





