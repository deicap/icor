<?php

	$_default_lang = 'lt';
	
	$_url = isset($_SERVER['REDIRECT_URL']) ? trim($_SERVER['REDIRECT_URL'], '/ ') : '/';

	if ($_url == '/') {
		
		$ip_info = ip_info();

		if (isset($ip_info['country_code']) && $ip_info['country_code'] == 'LT') {

			header("HTTP/1.1 301 Moved Permanently"); 
			header("Location: /lt");
			exit();
						
		} else if (isset($ip_info['country_code']) && $ip_info['country_code'] == 'RU') {
			
			header("HTTP/1.1 301 Moved Permanently"); 
			header("Location: /ru");
			exit();
			
		} else {
			
			header("HTTP/1.1 301 Moved Permanently"); 
			header("Location: /en");
			exit();
			
		}
	
		
	} else if (preg_match('/\//i', $_url)) {
		
		$_exploded_url = explode('/', $_url);

		$_lang = $_exploded_url[0];
		$_url = $_exploded_url[1];
		
	} else {
		
		$_lang = $_url;
		$_url = '/';
		
	}
	
	$_pages = array(
	
		'lt' => array(
		
			'/' => array(
				'meta_title' => 'Icor Pradinis puslapis'
			),
			
			'test' => array(
				'meta_title' => 'Icor Test page'
			)
			
		),
		
		'en' => array(
		
			'/' => array(
				'meta_title' => 'Icor Homepage'
			)
			
		),
		
		'ru' => array(
		
			'/' => array(
				'meta_title' => 'Icor rusiškai'
			)
			
		),
		
	);
	
	
	if (!isset($_pages[$_lang][$_url])) {

		header('HTTP/1.0 404 Not Found');
		exit('404 Page not found');

	} else {

		$_page_meta = $_pages[$_lang][$_url];
		
	}
	
	
	
	
	
	
	


function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
    $output = NULL;
    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
        $ip = $_SERVER["REMOTE_ADDR"];
        if ($deep_detect) {
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    }
    $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
    $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
    $continents = array(
        "AF" => "Africa",
        "AN" => "Antarctica",
        "AS" => "Asia",
        "EU" => "Europe",
        "OC" => "Australia (Oceania)",
        "NA" => "North America",
        "SA" => "South America"
    );
    if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
        $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
        if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
            switch ($purpose) {
                case "location":
                    $output = array(
                        "city"           => @$ipdat->geoplugin_city,
                        "state"          => @$ipdat->geoplugin_regionName,
                        "country"        => @$ipdat->geoplugin_countryName,
                        "country_code"   => @$ipdat->geoplugin_countryCode,
                        "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                        "continent_code" => @$ipdat->geoplugin_continentCode
                    );
                    break;
                case "address":
                    $address = array($ipdat->geoplugin_countryName);
                    if (@strlen($ipdat->geoplugin_regionName) >= 1)
                        $address[] = $ipdat->geoplugin_regionName;
                    if (@strlen($ipdat->geoplugin_city) >= 1)
                        $address[] = $ipdat->geoplugin_city;
                    $output = implode(", ", array_reverse($address));
                    break;
                case "city":
                    $output = @$ipdat->geoplugin_city;
                    break;
                case "state":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "region":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "country":
                    $output = @$ipdat->geoplugin_countryName;
                    break;
                case "countrycode":
                    $output = @$ipdat->geoplugin_countryCode;
                    break;
            }
        }
    }
    return $output;
}

	
	
	
	
	
	
?>