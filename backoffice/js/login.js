// JavaScript Document
$(function(){
    $(".defaultText").focus(function(srcc)
    {
        if ($(this).val() == $(this)[0].title)
        {
            $(this).removeClass("defaultTextActive");
            $(this).val("");
        }
    });
    
    $(".defaultText").blur(function()
    {
        if ($(this).val() == "")
        {
            $(this).addClass("defaultTextActive");
            $(this).val($(this)[0].title);
        }
    });
    
    $(".defaultText").blur(); 

    $('#txt_username').focus();       
});

function AccessLogin(){
	var txt_username	=	$('#txt_username').val();
	var txt_password	=	$('#txt_password').val();
	$('.status').html('');
	if(txt_username == $('#txt_username').attr("placeholder") || txt_username=="" || txt_password==$('#txt_password').attr("placeholder") || txt_password==""){
		$('.status').html('<b>Warning!</b> Please enter your username and password');
	}else{
		$.ajax({
		  type: "POST",
		  url: 'pages/login/action.php',
		  data: "action=signin&" + "username=" + txt_username + "&password=" + txt_password,
		  success: function(data) { //alert(data);
			if(data == "y"){
				 window.location="index.php?op=home-index";
			}else{
				$('.status').html('<b>Error!</b> Wrong username/password, please try again');
			}//End IF
		  }//END Call Ajax
		});
	}
}

$(document).delegate('#bt-login', 'click', function(event) {
	AccessLogin();
	return false;
});

$(function(){ 
	$(window).keypress(function(e) {
    if(e.keyCode == 13) {
		AccessLogin();
		return false;
    }
	});
});

