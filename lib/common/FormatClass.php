<?php
/**
 * @author Mohammad Skafi webmaster@hackspirit.com
 * @link www.hackspirit.com
 * @copyright 2009 dowgroup
 *
 */

define ( "DECEMBER", "&#1603;&#1575;&#1606;&#1608;&#1606; &#1575;&#1604;&#1571;&#1608;&#1604;" );
define ( "JANUARY", "&#1603;&#1575;&#1606;&#1608;&#1606; &#1575;&#1604;&#1579;&#1575;&#1606;&#1610;" );
define ( "FEBRUARY", "&#1588;&#1576;&#1575;&#1591;" );
define ( "MARCH", "&#1570;&#1584;&#1575;&#1585;" );
define ( "APRIL", "&#1606;&#1610;&#1587;&#1575;&#1606;" );
define ( "MAY", "&#1571;&#1610;&#1575;&#1585;" );
define ( "JUNE", "&#1581;&#1586;&#1610;&#1585;&#1575;&#1606;" );
define ( "JULY", "&#1578;&#1605;&#1608;&#1586;" );
define ( "AUGUST", "&#1570;&#1576;" );
define ( "SEPTEMBER", "&#1571;&#1610;&#1604;&#1608;&#1604;" );
define ( "OCTOBER", "&#1578;&#1588;&#1585;&#1610;&#1606;&nbsp;&#1575;&#1604;&#1571;&#1608;&#1604;" );
define ( "NOVEMBER", "&#1578;&#1588;&#1585;&#1610;&#1606; &#1575;&#1604;&#1579;&#1575;&#1606;&#1610;" );

define ( "MONDAY", "&#1575;&#1604;&#1573;&#1616;&#1579;&#1618;&#1606;&#1614;&#1610;&#1618;&#1606;&#1618;" );
define ( "TUESDAY", "&#1575;&#1604;&#1579;&#1617;&#1615;&#1604;&#1575;&#1614;&#1579;&#1614;&#1575;&#1569;&#1618;" );
define ( "WEDNESDAY", "&#1575;&#1604;&#1571;&#1614;&#1585;&#1618;&#1576;&#1616;&#1593;&#1614;&#1575;&#1569;&#1618;" );
define ( "THURSDAY", "&#1575;&#1604;&#1618;&#1582;&#1614;&#1605;&#1616;&#1610;&#1618;&#1587;&#1618;" );
define ( "FRIDAY", "&#1575;&#1604;&#1618;&#1580;&#1615;&#1605;&#1618;&#1593;&#1614;&#1577;" );
define ( "SATURDAY", "&#1575;&#1604;&#1587;&#1617;&#1614;&#1576;&#1618;&#1578;&#1618;" );
define ( "SUNDAY", "&#1575;&#1604;&#1571;&#1614;&#1581;&#1614;&#1583;&#1618;" );

class FormatClass {
	
	private $arabicDescChars = 380;
	private $otherDescChars = 215;
	
	private $arabicHomeTitleChars = 250;
	private $otherHomeTitleChars = 80;
	
	function __construct() {
	
	}
	
	function getDayInArabic($day) {
		
		switch ($day) {
			case "Monday" :
				return MONDAY;
			case "Tuesday" :
				return TUESDAY;
			case "Wednesday" :
				return WEDNESDAY;
			case "Thursday" :
				return THURSDAY;
			case "Friday" :
				return FRIDAY;
			case "Saturday" :
				return SATURDAY;
			case "Sunday" :
				return SUNDAY;
		}
	}
	function formatFromToDates($from, $to) {
		//2009-03-17 
		$ar1 = split ( "-", $from );
		$year1 = $ar1 [0];
		$month1 = $ar1 [1];
		$day1 = $ar1 [2];
		
		$ar2 = split ( "-", $to );
		$year2 = $ar2 [0];
		$month2 = $ar2 [1];
		$day2 = $ar2 [2];
		
		$mName1 = $this->getMonthName ( $month1 );
		$mName2 = $this->getMonthName ( $month2 );
		
		if ($month1 == $month2 && $year1 == $year2) {
			return $day1 . " - " . $day2 . " " . $mName1 . " " . $year1;
		} else {
			return $day1 . " " . $mName1 . " " . $year1 . " - " . $day2 . " " . $mName2 . " " . $year2;
		}
	
	}
	
	function formatDate($date, $spliter = "-") {
		//2009-03-17 
		$ar = split ( $spliter, $date );
		$year = $ar [0];
		$month = $ar [1];
		$day = $ar [2];
		$mName = FormatClass::getMonthName ( $month );
		//17 may, 2009
		return $day . " " . $mName . ", " . $year;
	}
	function returnMonthInArabic($num) {
		
		switch ($num) {
			case 1 :
				return JANUARY;
			case 2 :
				return FEBRUARY;
			case 3 :
				return MARCH;
			case 4 :
				return APRIL;
			case 5 :
				return MAY;
			case 6 :
				return JUNE;
			case 7 :
				return JULY;
			case 8 :
				return AUGUST;
			case 9 :
				return SEPTEMBER;
			case 10 :
				return OCTOBER;
			case 11 :
				return NOVEMBER;
			case 12 :
				return DECEMBER;
		}
	}
	function getMonthName($nb, $full = "") {
		switch ($nb) {
			
			case 1 :
				$name = "Jan";
				$fullName = "January";
				break;
			case 2 :
				$name = "Feb";
				$fullName = "February";
				break;
			case 3 :
				$name = "Mar";
				$fullName = "March";
				break;
			case 4 :
				$name = "Apr";
				$fullName = "April";
				break;
			case 5 :
				$name = "May";
				$fullName = "May";
				break;
			case 6 :
				$name = "June";
				$fullName = "June";
				break;
			case 7 :
				$name = "July";
				$fullName = "July";
				break;
			case 8 :
				$name = "Aug";
				$fullName = "August";
				break;
			case 9 :
				$name = "Sep";
				$fullName = "September";
				break;
			case 10 :
				$name = "Oct";
				$fullName = "October";
				break;
			case 11 :
				$name = "Nov";
				$fullName = "November";
				break;
			case 12 :
				$name = "Dec";
				$fullName = "December";
				break;
		
		}
		if ($full != "") {
			return $fullName;
		} else {
			return $name;
		}
	
	}
	function getDaysDifference($endDate, $beginDate) {
		//2009-06-30
		//explode the date by "-" and storing to array
		$date_parts1 = explode ( "-", $beginDate );
		$date_parts2 = explode ( "-", $endDate );
		//gregoriantojd() Converts a Gregorian date to Julian Day Count
		$start_date = gregoriantojd ( $date_parts1 [1], $date_parts1 [2], $date_parts1 [0] );
		$end_date = gregoriantojd ( $date_parts2 [1], $date_parts2 [2], $date_parts2 [0] );
		//echo $end_date."  ".$start_date;
		return $end_date - $start_date;
	}
	/*
	 * Test function 
	 */
	function calculateExpiryDate() {
		$maxDays = 26;
		$postDate = '2009-07-12';
		$postDate = explode ( "-", $postDate );
		$gregorianPostDate = gregoriantojd ( $postDate [1], $postDate [2], $postDate [0] );
		$expiryDays = $gregorianPostDate + $maxDays;
		$expiryDate = jdtogregorian ( $expiryDays );
		echo $expiryDate;
	}
	function formatPrice($nb) {
		$currency = " LL ";
		//printf ( $currency . "%01.2f", $nb );
		return $currency . round ( $nb, 2 );
	
	}
	function addCurrency($nb, $currency) {
		return $currency . $nb;
	
	}
	
	function stripTest($string, $length, $addPoints, $removeTags = true) {
		if ($addPoints) {
			$append = '...';
		} else {
			$append = '';
		}
		
		$string = str_replace ( '&nbsp;', ' ', $string );
		$string = trim ( $string );
		if ($removeTags) {
			$string = strip_tags ( $string );
		}
		return strlen ( $string ) > $length ? substr ( $string, 0, strpos ( $string, ' ', $length ) ) . $append : $string;
	}
	
	// new strip 
	

	function strip($string, $length, $addPoints, $removeTags = true) {
		
		if ($addPoints) {
			$append = '...';
		} else {
			$append = '';
		}
		$string = trim ( $string );
		
		if ($removeTags) {
			$string = strip_tags ( $string );
		}
		
		$newStringArray = explode ( " ", $string );
		$i = 0;
		while ( $i < $length ) {
			echo $newStringArray [$i];
			echo " ";
			$i ++;
		}
		if (count ( $newStringArray ) > $length) {
			echo $append;
		}
	}
	
	function stripFromTo($string, $from, $to) {
		$string = trim ( $string );
		$string = strip_tags ( $string );
		
		$newStringArray = explode ( " ", $string );
		
		if ($to > count($newStringArray)){
			$to=count($newStringArray);
		}
		
		for($i = $from; $i < $to; $i ++) {
			echo $newStringArray [$i];
			echo " ";
		}
	}
	
	function strip2($string, $length, $addPoints) {
		if ($addPoints) {
			$append = '...';
		} else {
			$append = '';
		}
		$string = str_replace ( '&nbsp;', ' ', $string );
		$string = trim ( $string );
		return strlen ( $string ) > $length ? substr ( $string, 0, 16 ) . $append : $string;
	}
	/**
	 * date $slashDate format '7/19/2009'
	 *
	 * @param date $slashDate
	 */
	public function formatSlashDate($slashDate) {
		$slashDate = explode ( "/", $slashDate );
		return $slashDate [2] . "-" . $slashDate [0] . "-" . $slashDate [1];
	}
	/**
	 * in case the mobile number is of 03 format 
	 * the returned mobile number should be in this format
	 * 9613716394
	 * 
	 * in the other cases it must be used as it is
	 * which mean in the following format 
	 * 96170876435
	 *
	 * @param int $mobileNumber
	 */
	public function prepareMobileNb($mobileNumber) {
		$parts = split ( "-", $mobileNumber );
		$countryCode = $parts [0];
		$extension = $parts [1];
		$phoneNumber = $parts [2];
		
		if ($extension == "03") {
			$finalFormat = $countryCode . "3" . $phoneNumber;
			return $finalFormat;
		
		} else {
			return $countryCode . $extension . $phoneNumber;
		}
	}
	
	function formatDateByLang($date, $langId) {
		if ($langId == 2) {
			$array = array ();
			$array = explode ( "-", $date );
			$arabicMonth = FormatClass::returnMonthInArabic ( $array [1] );
			return " $array[2] $arabicMonth $array[0]";
		} else {
			return FormatClass::formatDate ( $date );
		}
	}
	
	/*
	 * return current date of format 3/15/2009
	 */
	public function getTodayDate() {
		
		return date ( "Y-m-d" );
	}
	
	public function getTime() {
		return date ( "h:i a" );
	}
	
	public function prepareDisplaying($text) {
		$text = str_replace ( "\n", "<br/>", $text );
		return $text;
	}
	
	public function getCharsNb($objectLangId) {
		if ($objectLangId == LanguageController::$arabicLangId) {
			return $this->arabicDescChars;
		} else {
			return $this->otherDescChars;
		}
	}
	
	public function getHomeMainTitleNb($objectLangId) {
		if ($objectLangId == LanguageController::$arabicLangId) {
			return $this->arabicHomeTitleChars;
		} else {
			return $this->otherHomeTitleChars;
		}
	}
	
	public function countWords($str) {
		$no = count ( explode ( " ", $str ) );
		return $no;
	}
	
	public function getYear($array, $fieldName) {
		$yearArray = array ();
		foreach ( $array as $key => $value ) {
			if ($key == $fieldName) {
				$date = explode ( "-", $value );
				array_push ( $yearArray, $date [0] );
			}
		}
		return $yearArray;
	}
	
	function getMonth($date, $langId) {
		$array = array ();
		$array = explode ( "-", $date );
		if ($langId == LangController::$ar) {
			$month = FormatClass::returnMonthInArabic ( $array [1] );
		} else {
			$month = FormatClass::getMonthName ( $array [1], "full" );
		}
		
		return $month;
	}
	
	function getDayNumber($date) {
		$array = array ();
		$array = explode ( "-", $date );
		return $array [2];
	}
	//next month from current date
	function getNextMonth() {
		$nextDate = date ( "Y-m-d", strtotime ( "+1 months" ) );
		$dateArray = split ( "-", $nextDate );
		$nextMonth = FormatClass::getMonthName ( $dateArray [1], "full" );
		return $nextMonth;
	}
	//Previous month from current date
	function getPreviousMonth() {
		$date = date ( "m.d.y" );
		$month = date ( "n", strtotime ( $date ) ) - 1;
		if ($month == 0) {
			$month = 12;
		}
		$preMonth = FormatClass::getMonthName ( $month, "full" );
		return $preMonth;
	}
	
	function getCalenderMonth($month, $dir) {
		if ($dir == "next") {
			$month ++;
			if ($month == 13) {
				$month = 1;
			}
		} else {
			$month --;
			if ($month == 0) {
				$month = 12;
			}
		}
		return FormatClass::getMonthName ( $month, "full" );
	}
	
	public function getDateFromTS($str, $showDay = true, $showDate = true, $showTime = true) {
		ini_set ( "date.timezone", "Asia/Beirut" );
		if (($timestamp = strtotime ( $str )) === false) {
			return "";
		}
		if (( int ) $timestamp <= 0) {
			return "";
		}
		// Tuesday, April 19, 2011 - 10:14 PM
		//return date("l, F d, Y - h:i A", $timestamp);
		$date = "";
		if ($showDay == true) {
			$date .= date ( "l", $timestamp );
		}
		
		if ($showDate == true) {
			$date .= ",";
			$date .= date ( "F d, Y", $timestamp );
		}
		
		if ($showTime == true) {
			$date .= "";
			$date .= date ( "h:i A", $timestamp );
		}
		
		return $date;
	
	}
	
	/*function getFLVDuration($file) {
		// get contents of a file into a string
		$filePath = "public/uploads/videos/";
		$file = $filePath . $file;
		
		$handle = fopen ( $file, "r" );
		$contents = fread ( $handle, filesize ( $file ) );
		fclose ( $handle );
		
		if (strlen ( $contents ) > 3) {
			if (substr ( $contents, 0, 3 ) == "FLV") {
				$taglen = hexdec ( bin2hex ( substr ( $contents, strlen ( $contents ) - 3 ) ) );
				if (strlen ( $contents ) > $taglen) {
					$duration = hexdec ( bin2hex ( substr ( $contents, strlen ( $contents ) - $taglen, 3 ) ) );
					return $duration;
				}
			}
		}
		
		return false;
	}*/
	
	function getFLVDuration($file) {
		$filePath = "public/uploads/videos/";
		$file = $filePath . $file;
		
		$duration = false;
		
		if (file_exists ( $file )) {
			$fp = fopen ( $file, 'r' );
			if ($fp) {
				$header = fread ( $fp, 5 );
				if ($header !== false) {
					$is_flv = ($header [0] == 'F' && $header [1] == 'L' && $header [2] == 'V');
					$is_flv_video = (hexdec ( bin2hex ( $header [4] ) ) & 0x01);
					if ($is_flv && $is_flv_video) {
						if (fseek ( $fp, 0, SEEK_END ) == 0) {
							$length = ftell ( $fp );
							if ($length !== false) {
								if (fseek ( $fp, - 4, SEEK_END ) == 0) {
									$value = fread ( $fp, 4 );
									if ($value !== false) {
										$taglen = hexdec ( bin2hex ( $value ) );
										if ($length > $taglen) {
											if (fseek ( $fp, $length - $taglen, SEEK_SET ) == 0) {
												$value = fread ( $fp, 3 );
												if ($value !== false) {
													$duration = hexdec ( bin2hex ( $value ) );
												}
											}
										}
									}
								}
							}
						}
					}
				}
				fclose ( $fp );
			}
		}
		return $duration;
	}
	
	public function clean($text){
		$text = str_replace ( "%20", " ", $text );
		return $text;
	}
	
	public function formatDay($date){
		echo date('l, F j', strtotime($date)); 
	}
	
	public function getWeather($xml_path,$country){
		/*
			<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>
			<rss version="2.0" xmlns:yweather="http://xml.weather.yahoo.com/ns/rss/1.0" xmlns:geo="http://www.w3.org/2003/01/geo/wgs84_pos#">
			<channel>
			  <title>Yahoo! Weather - Sunnyvale, CA</title>
			  <link>http://us.rd.yahoo.com/dailynews/rss/weather/Sunnyvale__CA/*http://weather.yahoo.com/forecast/USCA1116_f.html</link>
			  <description>Yahoo! Weather for Sunnyvale, CA</description>
			  <language>en-us</language>
			  <lastBuildDate>Fri, 18 Dec 2009 9:38 am PST</lastBuildDate>
			  <ttl>60</ttl>
			  <yweather:location city="Sunnyvale" region="CA"   country="United States"/>
			  <yweather:units temperature="F" distance="mi" pressure="in" speed="mph"/>
			  <yweather:wind chill="50"   direction="0"   speed="0" />
			  <yweather:atmosphere humidity="94"  visibility="3"  pressure="30.27"  rising="1" />
			  <yweather:astronomy sunrise="7:17 am"   sunset="4:52 pm"/>
			  <image>
			    <title>Yahoo! Weather</title>
			    <width>142</width>
			    <height>18</height>
			    <link>http://weather.yahoo.com</link>
			    <url>http://l.yimg.com/a/i/us/nws/th/main_142b.gif</url>
			  </image>
			  <item>
			    <title>Conditions for Sunnyvale, CA at 9:38 am PST</title>
			    <geo:lat>37.37</geo:lat>
			    <geo:long>-122.04</geo:long>
			    <link>http://us.rd.yahoo.com/dailynews/rss/weather/Sunnyvale__CA/*http://weather.yahoo.com/forecast/USCA1116_f.html</link>
			    <pubDate>Fri, 18 Dec 2009 9:38 am PST</pubDate>
			    <yweather:condition  text="Mostly Cloudy"  code="28"  temp="50"  date="Fri, 18 Dec 2009 9:38 am PST" />
			    <description><![CDATA[
			<img src="http://l.yimg.com/a/i/us/we/52/28.gif"/><br />
			<b>Current Conditions:</b><br />
			Mostly Cloudy, 50 F<BR />
			<BR /><b>Forecast:</b><BR />
			Fri - Partly Cloudy. High: 62 Low: 49<br />
			Sat - Partly Cloudy. High: 65 Low: 49<br />
			<br />
			<a href="http://us.rd.yahoo.com/dailynews/rss/weather/Sunnyvale__CA/*http://weather.yahoo.com/forecast/USCA1116_f.html">Full Forecast at Yahoo! Weather</a><BR/><BR/>
			(provided by <a href="http://www.weather.com" >The Weather Channel</a>)<br/>
			]]></description>
			    <yweather:forecast day="Fri" date="18 Dec 2009" low="49" high="62" text="Partly Cloudy" code="30" />
			    <yweather:forecast day="Sat" date="19 Dec 2009" low="49" high="65" text="Partly Cloudy" code="30" />
			    <guid isPermaLink="false">USCA1116_2009_12_18_9_38_PST</guid>
			  </item>
			</channel>
			</rss>

*/
		// code of beirut (w=56051360)
		// type of temp:u=c
		// Current Conditions: static words in the xml file.
		//$xml_path = "http://weather.yahooapis.com/forecastrss?w=56051360&u=c";
		$xmlInfo = simplexml_load_file ( $xml_path );
		
		// Mostly Cloudy, 50 F  (la virgule  utiliser dans la methode et la mem utilise de ce ligne);
		$arrayWeather=explode(',',$xmlInfo->channel->item->description) ;
		$arrayWeather=explode('<BR />',$arrayWeather[1]) ;
		$info= str_replace ( '<br/>', ' ', $arrayWeather[0] );
		return $country." ".$info;
	}
}

?>