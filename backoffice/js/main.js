function chk_form(){
		$("label.help-inline").remove();
		$(".control-group").removeClass('error');
		$(":input.req").each(function(){
			if($(this).val()==""){
				var $controls	=	$(this).parent(".controls");
				$controls.parent(".control-group").addClass('error');
				$(this).after("<label class=help-inline> * Required</label>");
			}
		});
		if($(":input.req").next().is(".help-inline")==false){
			return true;
		}else{
			return false;
		}
}

function validVal(event, keyRE) {
	if (	( typeof(event.keyCode) != 'undefined' && event.keyCode > 0 && String.fromCharCode(event.keyCode).search(keyRE) != (-1) ) || 
		( typeof(event.charCode) != 'undefined' && event.charCode > 0 && String.fromCharCode(event.charCode).search(keyRE) != (-1) ) ||
		( typeof(event.charCode) != 'undefined' && event.charCode != event.keyCode && typeof(event.keyCode) != 'undefined' && event.keyCode.toString().search(/^(8|9|13|45|46|35|36|37|39)$/) != (-1) ) ||
		( typeof(event.charCode) != 'undefined' && event.charCode == event.keyCode && typeof(event.keyCode) != 'undefined' && event.keyCode.toString().search(/^(8|9|13)$/) != (-1) ) ) {
		return true;
	} else {
		return false;
	}
}

$(document).delegate('.logout', 'click', function(event) {
	window.location = 'pages/login/action.php?action=signout';
});