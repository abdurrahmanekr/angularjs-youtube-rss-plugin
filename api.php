<?php
	if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');
    }
 
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
 
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         
 
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
 
        exit(0);
    }
	
	if (!isset($_GET["channel_id"]))
		return;
	
	$channel_id = $_GET["channel_id"];	
	class XmlToJson {
	    public function Parse ($url) {
	        $fileContents= file_get_contents($url);
	        $fileContents = str_replace(array("\n", "\r", "\t"), '', $fileContents);
	        $fileContents = trim(str_replace('"', "'", $fileContents));
	        $simpleXml = simplexml_load_string($fileContents);
	        $json = json_encode($simpleXml);

	        return $json;
	    }
	}
	$xml = new XmlToJson();
	$result = $xml->Parse("https://www.youtube.com/feeds/videos.xml?channel_id=$channel_id");
	echo json_decode(json_encode($result));