jQuery(document).ready( function($) {
	
	$("#btnSubscribe").click( function(){
		var currentobj = $(this);
		var wpnl_div = currentobj.parents(".clsDIV_subscribe_parent");
        var EmailID = wpnl_div.children("#txtSubscribe").val();
        var isAllWell=true;
		var error="";
//Validation of the Email Id of the visitor
if($("#txtSubscribe").val() == "email@domain.com")
{
	error="Please Enter Your Email ID";
	isAllWell=false;
}

else if(!(($("#txtSubscribe").val().indexOf("@")>0) && ($("#txtSubscribe").val().indexOf(".")>0)) || /[^a-zA-Z0-9.@_-]/.test($("#txtSubscribe").val())) 
{	
	error="This is not a valid Email ID";
	isAllWell=false;
}
else
{
	sub=$("#txtSubscribe").val().substring(($("#txtSubscribe").val().indexOf("@"))+1);
	if(sub.indexOf(".")<=0) 
	{
	error="This is not a valid Email ID";
	isAllWell=false;
	}
}

if(!isAllWell)
{
	$('#elabel').text(error);
}
//This part is executed if the Email Id is correct
else
{
	currentobj.siblings(".loadingimage").css("visibility", "visible");
	currentobj.siblings(".loadingimage").css("display", "inline-block");
	$.post(
			subsAjax.ajaxurl,
            {
	         action: 'save_subs_in_DB',
	         emailid: EmailID,
	         wpnl_nonce: subsAjax.subs_nonce
	        },
			function(data)
			{
	        	$('#elabel').text('Thanks For Subscibing our newsletter');	        					
				wpnl_div.hide();
				//To Display the Sign Up part once again when the Email Id is submitted
				setTimeout(function(){$("#divNewsLetter").hide(function()
				{
					$(".social-bookmarks").show();
					$('#elabel').text('');
					$("#txtSubscribe").val('email@domain.com');
					$("#txtSubscribe").focus(function(){
					var currentobj = $(this);
					if(currentobj.val()=='email@domain.com')currentobj.val('');
					});
					$("#txtSubscribe").blur(function(){
					var currentobj = $(this);
					if(currentobj.val()=='')currentobj.val('email@domain.com');		
					});
					$("#btnCancelSubscription").click(function(){
					$("#divNewsLetter").hide('slow',function(){
	        		$(".social-bookmarks").show();
					});
					})
					wpnl_div.show();
					$(".loadingimage").css("visibility", "hidden");
					$(".loadingimage").css("display", "none");
				});},2000);
				
			}
		);
}
	
return false;
	
});

	$("#txtSubscribe").focus(function(){
		var currentobj = $(this);
		if(currentobj.val()=='email@domain.com')currentobj.val('');
	});
	$("#txtSubscribe").blur(function(){
		var currentobj = $(this);
		if(currentobj.val()=='')currentobj.val('email@domain.com');		
	});
	$("#btnCancelSubscription").click(function(){
		$("#divNewsLetter").hide('slow',function(){
	        $(".social-bookmarks").show();
		});
	})
	
});