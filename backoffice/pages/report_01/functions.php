<?php
	require_once('../src/class.pagination.php');
	require_once('../src/class.inputfilter.php');
	$InputFilter = new InputFilter();
	echo "<script> 
			var opPage	= '{$getop[0]}';
			var opFile	= '{$getop[1]}';
			var ip_address	= '{$ADMIN_ID}';
		  </script>"; // Set opURL 
		  

?>
