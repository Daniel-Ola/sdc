// alert(4523) ;



		// $("#duration").() ;
//punishment selection
$("#ptype").change(function(){
	type = $(this).val() ;
			p = $("#inputpunish").val(type) ;
		// $("#duration").show() ;
	alert(type) ;
	var punishment = type ;
	if(type == 0)
	{
		$("#duration").hide() ;
		punishment = type ;
		/*p = $("#inputpunish").val(punishment) ;
		$("#foot").show() ;*/
	}
	if(type == 5)
	{
		$("#duration").hide() ;
		punishment = type ;
		p = $("#inputpunish").val(punishment) ;
		$("#foot").show() ;
		/*alert(punishment) ;
		alert(p) ;
		$("#inputpunish").show() ;*/
	}
	if(type == 1)
	{
		$("#duration").hide() ;
		punishment = type ;
		p = $("#inputpunish").val(punishment) ;
		$("#foot").show() ;
		/*alert(punishment) ;
		alert(p) ;
		$("#inputpunish").show() ;*/
	}
	if(type == 2)
	{
		// duration = $("#councelling").val() ;
		// alert("councelling") ;
		$("#councelling").show() ;
		$("#suspension").hide() ;
		$("#rustication").hide() ;
		$("#duration").show() ;
	}
	if(type == 3)
	{
		// duration = $("#suspension").val() ;
		// alert("suspension") ;
		$("#councelling").hide() ;
		$("#suspension").show() ;
		$("#rustication").hide() ;
		$("#duration").show() ;
	}
	if(type == 4)
	{
		// duration = $("#rustication").val() ;
		// alert("rustication") ;
		$("#councelling").hide() ;
		$("#suspension").hide() ;
		$("#rustication").show() ;
		$("#duration").show() ;
	}

	$(".duration").change(function(){
		var duration = $(this).val() ;
		if(duration != 0)
		{
			punishment = type+duration ;
			p = $("#inputpunish").val(punishment) ;
			$("#foot").show() ;
		}
		if(duration == 0)
		{
			$("#foot").hide() ;
		}
	}) ;

	$("#pstd").submit(function(event){
		event.preventDefault() ;
		$("#asspun").html("Submitting..") ;
		form = $(this) ,
		case_id = form.find("input[name='case_id']").val() ,
		pstat = form.find("input[name='pstat']").val() ,
		url = form.attr("action") ;
		user_id = $("#user_id").val() ;
		count = 0 ;
		if(case_id == "")
		{
			count = count+1 ;
		}
		if(pstat == 0)
		{
			count = count+1 ;
		}
		/*if(pstat.length != 2)
		{
			count = count + 1 ;
		}*/
		// alert(count) ;
		if(count != 0)
		{
			alert("Error! Some fields are left empty") ;
		}
		if(count == 0)
		{
			// alert("in"+pstat) ;
			var punish = $.post(url , {
				case_id: case_id ,
				pstat: pstat ,
				user_id: user_id ,
				command: "punish"
			}) ;

			punish.done(function(data){
				$("#return").html(data) ;
				$("#return").show() ;
				$("#asspun").html("<i class='fa fa-plus'></i> Assign") ;
			}) ;
		}
		$("html" , "body").animate({scrollTop:"2000px"} , 500) ;
	}) ;
}) ;