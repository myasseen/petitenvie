jQuery(document).ready( function($) {
	$(".clsAcrVote").click( function(){

if($("#txtSubscribe").val() == "")
{
	
document.getElementById("elabel").innerHTML="Please Enter Your Email ID";
}
else if(!(($("#txtSubscribe").val().indexOf("@")>0) && ($("#txtSubscribe").val().indexOf(".")>0)) || /[^a-zA-Z0-9.@_-]/.test($("#txtSubscribe").val()))
{
	document.getElementById("elabel").innerHTML="This is not a valid Email ID";
}
else
{
	document.getElementById("elabel").innerHTML="";
		$.post(
			subsAjax.ajaxurl,
            {
	         action: 'save_subs_in_DB'
	        },
			function(data)
			{				
				alert(data);
			}
		);
}
		return false;
	
	});
	
});

