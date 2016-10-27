<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Vio Coding Test - OpenWeather API</title>

<style type="text/css">
.table {display: table;}
.table-row {display: table-row;}
.table-cell {display: table-cell; padding:10px;}
body {font-family:Verdana, Geneva, sans-serif;}
</style>

</head>


<?php
$city="Vancouver";
$country="Canada"; 
$url="http://api.openweathermap.org/data/2.5/forecast/daily?q=Vancouver&units=metric&cnt=5&lang=en&appid=c9d49310f8023ee2617a7634de23c2aa";
$json=file_get_contents($url);
$data=json_decode($json,true);
$data['city']['name'];
$date = new DateTime();

echo "Weather for " . $city . ", BC " . $country . "<div class='table'>";

foreach($data['list'] as $day => $value) {
	echo	
		"<div class='table-row'><div class='table-cell'>" .
		$date->format('D M d') . "</div><div class='table-cell'>" .
		"High: " . $value['temp']['max'] . "&deg C" .  "<br />Low: " . $value['temp']['min'] . "&deg C"  .
    	"<br />wind " . $value['speed'] .' m/s' .
		"<br />clouds " . $value['clouds'] . "% 
        	</div>
    	</div>";
  
	$date = new DateTime('+'. $day+1 . ' day');
	}
echo "</div>";
?>

<body>
</body>
</html>
