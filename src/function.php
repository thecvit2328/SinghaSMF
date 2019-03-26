<?php 

function str_mod($valid){
	return strtolower(str_replace(array(" ","/","&","?","\"","'","%","#"),array("-","-","-","","","","",""),$valid));
}

function str_share($valid){
	return strtolower(str_replace(array("'"),array(""),$valid));
}

function pre($varUse){
	echo "<pre>";
	print_r($varUse);
	echo "</pre>";
}

function DateThai($strDate,$typDate)
{
		$strYear = date("Y",strtotime($strDate))+543;
		$strYearEng = date("Y",strtotime($strDate));
		$strMonth= date("n",strtotime($strDate));
		$strMonthTxt= date("M",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
		
		switch($typDate){
			case ("datetime"):
				return "$strDay $strMonthThai $strYear - $strHour:$strMinute";
			break;
			case ("datetimeeng"):
				return "$strDay $strMonthTxt $strYearEng - $strHour:$strMinute";
			break;
			case ("date"):
				return "$strDay $strMonthThai $strYear";
			break;
			case ("time"):
				return "$strHour:$strMinute";
			break;
			case ("homepage"):
				return "{$strDay}.{$strMonth}.{$strYear}";
			break;
			case ("datetime_number"):
				return "{$strDay}.{$strMonth}.{$strYear} - $strHour:$strMinute";
			break;
			case ("date_number"):
				return "{$strDay}/{$strMonth}/{$strYear}";
			break;
			case ("date_th"):
				return "{$strDay} {$strMonthThai} {$strYear}";
			break;
			case ("date_en"):
				return "{$strDay} {$strMonthTxt} {$strYear}";
			break;
		}
}

function ipCheck() {
		if (getenv('HTTP_CLIENT_IP')) {
			$ip = getenv('HTTP_CLIENT_IP');
		}
		elseif (getenv('HTTP_X_FORWARDED_FOR')) {
			$ip = getenv('HTTP_X_FORWARDED_FOR');
		}
		elseif (getenv('HTTP_X_FORWARDED')) {
			$ip = getenv('HTTP_X_FORWARDED');
		}
		elseif (getenv('HTTP_FORWARDED_FOR')) {
			$ip = getenv('HTTP_FORWARDED_FOR');
		}
		elseif (getenv('HTTP_FORWARDED')) {
			$ip = getenv('HTTP_FORWARDED');
		}
		else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		return $ip;
}

function unchkhtmlspecialchars( $string )
{
	$string = str_replace ( '&amp;','&',  $string );
	$string = str_replace ( '&#039;','\'',  $string );
	$string = str_replace ( '&quot;', '"', $string );
	$string = str_replace ( '&lt;','<',  $string );
	$string = str_replace ( '&gt;', '>',  $string );
	return $string;
}

function chkhtmlspecialchars( $string )
{
	$string = str_replace ( '&','&amp;',  $string );
	$string = str_replace ( '\'','&#039;',  $string );
	$string = str_replace ( '"', '&quot;', $string );
	$string = str_replace ( '<','&lt;',  $string );
	$string = str_replace ( '>', '&gt;',  $string );
	return $string;
}

//******************************
function alertgo($word,$url){
	exit("<script>
			alert('$word');
		  	window.location='$url';
		  </script>");
}
//******************************
function goonly($url){
	exit("<script>
		  	window.location='$url';
		  </script>");
}
//******************************
function alert($word){
	exit("<script>
			alert('$word');
		  </script>");
}

function active_menu($link_chk,$link_active){
	return ($link_chk==$link_active)?"_active":"";
}



/**
 *
 * @convert seconds to hours minutes and seconds
 *
 * @param int $seconds The number of seconds
 *
 * @return string
 * http://www.phpro.org/examples/Convert-Seconds-To-Hours-Minutes-Seconds-Words.html
 */
function secondsToWords($seconds)
{
    /*** return value ***/
    $ret = "";

    /*** get the hours ***/
    $hours = intval(intval($seconds) / 3600);
    if($hours > 0)
    {
        $ret .= "$hours ชั่วโมง ";
    }
    /*** get the minutes ***/
    $minutes = bcmod((intval($seconds) / 60),60);
//    if($hours > 0 || $minutes > 0)
//    {
        $ret .= "$minutes นาที ";
//    }
  
    /*** get the seconds ***/
    $seconds = bcmod(intval($seconds),60);
    $ret .= "$seconds วินาที";

    return $ret;
}

function Datediff($datefrom,$dateto,$value){
	
	
         $startDate = strtotime($datefrom);
         $lastDate = strtotime($dateto);
       
        $differnce = $startDate - $lastDate;

        $differnce = ($value=="Seconds")?($differnce):$differnce; 
        $differnce = ($value=="Minutes")?(floor($differnce/60)):$differnce; 
        $differnce = ($value=="Hours")?(floor($differnce/3600)):$differnce; 
        $differnce = ($value=="Year")?(floor($differnce/31536000)):$differnce; 
        $differnce = ($value=="Month")?(floor($differnce/2628000)):$differnce; 
        $differnce = ($value=="Days")?(floor($differnce/86400)):$differnce; 

        return $differnce;
}

function generateCode($length=6, $strength=0) {
	$vowels = 'aeuy';
	$consonants = 'bdghjmnpqrstvz';
	if ($strength & 1) {
		$consonants .= 'BDGHJLMNPQRSTVWXZ';
	}
	if ($strength & 2) {
		$vowels .= "AEUY";
	}
	if ($strength & 4) {
		$consonants .= '23456789';
	}
	if ($strength & 8) {
		$consonants .= '@#$%';
	}
 
	$password = '';
	$alt = time() % 2;
	for ($i = 0; $i < $length; $i++) {
		if ($alt == 1) {
			$password .= $consonants[(rand() % strlen($consonants))];
			$alt = 0;
		} else {
			$password .= $vowels[(rand() % strlen($vowels))];
			$alt = 1;
		}
	}
	return $password;
}


#Function Cut Word 
function cutStr($str, $maxChars='', $holder=''){

    if (strlen($str) > $maxChars ){
			$str = iconv_substr($str, 0, $maxChars,"UTF-8") . $holder;
	} 
	return $str;
} 

function autofill_zero($str, $maxChars=6){
	return sprintf("%0{$maxChars}d", $str);
} 


function isToday($date) //check if it's today
{
  $date = date("l, F d",strtotime($date));
  if($date == date("l, F d"))
  return true;
  else
  return false; 
}

 

function isYesterday($date) //check if it's yesterday
{
  $date = date("l, F d",strtotime($date));
  if($date == date("l, F d")-1)
  return true;
  else
  return false; 
}


// CHECK TIME AGO
//ex. time_passed(strtotime('July 23 2009'));
//http://css-tricks.com/snippets/php/time-ago-function/
function time_passed($time)
{
   $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
   $lengths = array("60","60","24","7","4.35","12","10");

   $now = time();

       $difference     = $now - $time;
       $tense         = "ago";

   for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
       $difference /= $lengths[$j];
   }

   $difference = round($difference);

   if($difference != 1) {
       $periods[$j].= "s";
   }

   return "$difference $periods[$j] ago ";
}


 /*  /////////////  nutt  ///////////////    */
function Sys_encodeURL($variable) { 
//-- ฟังก์ชั่นการเข้ารหัส ตัวแปรแบบ GET ผ่าน URL

		$key = "xitgmLwmp";
		$index = 0;
		$temp="";
		$variable = str_replace("=","Eq",$variable);
		for($i=0; $i < strlen($variable); $i++)
		{
				$temp .= $variable{$i}.$key{$index};	
				$index++;
				if($index >= strlen($key)) $index = 0;
		}
		$variable = strrev($temp);
		$variable = base64_encode($variable);
		$variable = utf8_encode($variable);
		$variable = urlencode($variable);
		$variable = str_rot13($variable);

		$variable = str_replace("%","oSo",$variable);
		return "ref=".$variable;

}


function Sys_decodeURL($enVariable) { 
//-- ฟังก์ชั่นการถอดรหัส ตัวแปรแบบ GET ผ่าน URL
// การใช้งาน decodeURL($_SERVER["QUERY_STRING"]);
		$key = "xitgmLwmp";

		$ex = explode("ref=",$enVariable);
		$enVariable = $ex[1];
		$enVariable = str_replace("oSo","%",$enVariable);

		$enVariable = str_rot13($enVariable);
		$enVariable = urldecode($enVariable);
		$enVariable = utf8_decode($enVariable);
		$enVariable = base64_decode($enVariable);
		$enVariable = strrev($enVariable);

		$current = 0;
		$temp="";
		for($i=0; $i < strlen($enVariable); $i++)
		{
				if($current%2==0)
				{
					$temp .= $enVariable{$i};	
				}
				$current++;
		}
		$temp = str_replace("Eq","=",$temp);

		parse_str($temp, $variable); 
		foreach($variable as $key=>$value)
		{
				$_REQUEST[$key]=$value;
				global $$key; 
				$$key=$value;
		}
}



?>