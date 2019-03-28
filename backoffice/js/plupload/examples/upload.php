<?php
		move_uploaded_file($_FILES["file"]["tmp_name"],"uploads/1234-".$_FILES["file"]["name"]);		
		echo "1234-".$_FILES["file"]["name"];
?>