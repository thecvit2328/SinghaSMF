<?php
//require_once('class.inputfilter.php');
//$InputFilter = new InputFilter();
//
//$Html = '
//<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
//<html xmlns="http://www.w3.org/1999/xhtml">
//<head>
//<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
//<title>Untitled Document</title>
//</head>
//
//<body>
//<form id="frmTest" name="frmTest" method="post" action="">
//'.(($_POST['bSubmit'] != '')?'Input = '.htmlspecialchars($_POST['txtTest']).'<br>Input Filter = '.$InputFilter->clean_script($_POST['txtTest']).'<br><br>':'').'
//  <label>
//  <input name="txtTest" type="text" id="txtTest" size="50" />
//  </label>
//  <label>
//  <input type="submit" name="bSubmit" id="bSubmit" value="Submit" />
//  </label>
//</form>
//</body>
//</html>
//';
// 
//echo $Html;
/***** preg_replace('@<[\/\!]*?[^<>]*?>@si', '', ''); // Filter HTML Only*/ 
class InputFilter {
	function InputFilter(){}
	function clean_script($document){
		$search = array ('@<script[^>]*?>.*?</script>@si', 	// Strip out javascript
				/*'@<[\/\!]*?[^<>]*?>@si',*/          	// Strip out HTML tags
			    '@([\r\n])[\s]+@',                		// Strip out white space
				'@&(quot|#34);@i',                		// Replace HTML entities
				'@&(amp|#38);@i',
				'@&(lt|#60);@i',
				'@&(gt|#62);@i',
				'@&(nbsp|#160);@i',
                         			'@&(iexcl|#161);@i',
                         			'@&(cent|#162);@i',
                         			'@&(pound|#163);@i',
                         			'@&(copy|#169);@i',
                         			'@&#(\d+);@e');                    		// evaluate as php

		$replace = array ('',
                          			//'',
                          			'\1',
                         			'"',
                          			'&',
                          			'<',
                          			'>',
                          			' ',
                          			chr(161),
                          			chr(162),
                          			chr(163),
                          			chr(169),
                         			'chr(\1)');

		$text = preg_replace($search, $replace, $document);
		return $text;
	}
}
class InputFilter2 {
	function InputFilter2(){}
	function clean_script2($document){
		$search = array ('@<script[^>]*?>.*?</script>@si', 	// Strip out javascript
				'@<[\/\!]*?[^<>]*?>@si',          	// Strip out HTML tags
			   '@([\r\n])[\s]+@',				// Strip out white space
				'@&(quot|#34);@i',                		// Replace HTML entities
				'@&(amp|#38);@i',
				'@&(lt|#60);@i',
				'@&(gt|#62);@i',
				'@&(nbsp|#160);@i',
                         			'@&(iexcl|#161);@i',
                         			'@&(cent|#162);@i',
                         			'@&(pound|#163);@i',
                         			'@&(copy|#169);@i',
                         			'@&#(\d+);@e');                    		// evaluate as php

		$replace = array ('',
                          			'',
                          			'\1',
                         			'"',
                          			'&',
                          			'<',
                          			'>',
                          			' ',
                          			chr(161),
                          			chr(162),
                          			chr(163),
                          			chr(169),
                         			'chr(\1)');

		$text = preg_replace($search, $replace, $document);
		return $text;
	}
}

?>