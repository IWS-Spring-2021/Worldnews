<?php
	// define API_KEY constant to store your API Key
	// please get your API Key by registering yours at: 
	// https://developer.accuweather.com/
	//jgxAwAYiOV1kTM2wPkWavN8FJOAHA9o2
	define('API_KEY','C4Bu2a7Mh31FAjTIMB3NO7nKRdtnDAng');
	// If the API Key doesn't work because it has reach its limit of 50 requests,
	// Delete the old key and create a new one.

	$apikey = API_KEY;

	$get_ip = json_decode(file_get_contents("https://api.ipify.org?format=json"), true);
	$user_ip = $get_ip['ip'];
	// echo '<p>' . $user_ip . '</p>';





	$location = json_decode(file_get_contents("http://dataservice.accuweather.com/locations/v1/cities/ipaddress?apikey={$apikey}&q={$user_ip}"), true);

	$loc_key = $location['Key'];
	
	$weather = json_decode(file_get_contents("http://dataservice.accuweather.com/currentconditions/v1/{$loc_key}?apikey={$apikey}"), true);


	$city = $location['EnglishName'];
	$country = $location['Country']['EnglishName'];
	$dt = $weather[0]['LocalObservationDateTime'];
	$temp = $weather[0]['Temperature']['Metric']['Value'];
	$img = $weather[0]['WeatherIcon'];
		if($img<10) {
			$img = "0{$img}";
		}

	echo '<h6><i class="fas fa-search-location"></i>&nbsp;&nbsp;';
	echo $city . ', ' . $country . '&nbsp;&nbsp;&nbsp;&nbsp;';
	echo '<i class="far fa-calendar-alt"></i></i>&nbsp;&nbsp;' . substr($dt,0,10);

	echo "</h6>&nbsp;&nbsp;&nbsp;&nbsp;<h6>Temperature: {$temp}&#8451;</h6>";
	echo "<img src='https://developer.accuweather.com/sites/default/files/{$img}-s.png'>";

?>