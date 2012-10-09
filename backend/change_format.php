<?php
function change_format($date)
{

$month = array(
"Jan" 	=> "01",
"Feb" 	=> "02",
"Mar"	=> "03",
"Apr"	=> "04",
"May"	=> "05",
"Jun" 	=> "06",
"Jul"	=> "07",
"Aug"	=> "08",
"Sep"	=> "09",
"Oct" 	=> "10",
"Nov"	=> "11",
"Dec"	=> "12",
);

list($day,$mon,$year)=explode("-", $date);
$new_date=$year."-".$month[$mon]."-".$day;
return $new_date;
}

function change_format2($date)
{

$month = array(
"01" 	=> "Jan",
"02" 	=> "Feb",
"03"	=> "Mar",
"04"	=> "Apr",
"05"	=> "May",
"06" 	=> "Jun",
"07"	=> "Jul",
"08"	=> "Aug",
"09"	=> "Sep",
"10" 	=> "Oct",
"11"	=> "Nov",
"12"	=> "Dec",
);

list($year,$mon,$day)=explode("-", $date);
$new_date=$day."-".$month[$mon]."-".$year;
return $new_date;
}
?>