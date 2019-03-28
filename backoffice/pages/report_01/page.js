/*JavaScript Document*/
$(document).ready(function(e) {
	$( ".datepicker" ).datepicker({ dateFormat: "yy-mm-dd",changeMonth: true ,changeYear:true});
	// Numeric only control handler
	$('.numericonly').bind('keypress', function (e) {
        return !(e.which != 8 && e.which != 0 &&
                (e.which < 48 || e.which > 57) && e.which != 46);
    });
	
});


/*************************************** Content Management ****************************************/

function alert_msg(){
	$(window).scrollTop(50);
	$('#msgbox').slideDown(500).delay(10000).slideUp(500);
}

$(document).delegate('#bt_save_as', 'click', function(event) {
	var formData = $( "#frm_data" ).serializeArray()
	formData.push({ "name": "action", "value": "data_save_as" }); 
	// console.log($.param(formData));

	if(confirm("คุณต้องการแก้ไขข้อมูล ใช่หรือไม่ ?")) {
		$.post('pages/' + opPage + '/action.php', formData , function(response) {
			// console.log(response);
			// alert_msg();
			// alert(response)
			alert('ระบบดำเนินการแก้ไขเรียบร้อยแล้วค่ะ!')
			window.location.reload();
		});
	}
});
/*************************************** Content Management ****************************************/



