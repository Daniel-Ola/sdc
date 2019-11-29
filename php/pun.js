// alert(4523) ;



		// $("#duration").() ;
//punishment selection
var punishment = 0 ;
alert(punishment) ;
$("#ptype").change(function(){
	// alert("done") ;
	type = $(this).val() ;
		// $("#duration").show() ;
	// var punishment = type ;
	if(type == 0)
	{
		$("#duration").hide() ;
		punishment = type ;
	}
	if(type == 1)
	{
		$("#duration").hide() ;
		punishment = type ;
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
		punishment = type+duration ;
		// alert(punishment) ;
	}) ;


	$("#pstd").submit(function(event){
		event.preventDefault() ;
		alert(punishment) ;
		if(punishment == 0)
		{
			var confirm = window.confirm("You are not assigning any punishment are you sure to continue?") ;
		}
		if(confirm != false)
		{
			$("#asspun").html("Submitting..") ;
			form = $(this) ,
			// sname = form.find("input[name='sname']").val() ,
			case_id = form.find("input[name='case_id']").val() ,
			// ctit = form.find("input[name='ctit']").val() ,
			pstat = form.find("textarea[name='pstat']").val() ,
			url = form.attr("action") ;
			user_id = $("#user_id").val() ;
			// alert(user_id) ;
			count = 0 ;
			if(case_id == "")
			{
				count = count+1 ;
			}
			if(pstat == "")
			{
				count = count+1 ;
			}
			if(count != 0)
			{
				alert("error") ;
			}
			else
			{
				var punish = $.post(url , {
					case_id: case_id ,
					pstat: punishment ,
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
		}
	}) ;
}) ;