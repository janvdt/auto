<?php header('content-type: application/json; charset=utf-8'); 
	if( strlen($_GET["feed"]) >= 13 ) 
		{ $xml = file_get_contents(urldecode($_GET["feed"])); 
	if($xml) 
	{ $data = @simplexml_load_string($xml, "SimpleXMLElement", LIBXML_NOCDATA); $json = json_encode($data); echo isset($_GET["callback"]) ? "{$_GET["callback"]}($json)" : $json; } } ?>