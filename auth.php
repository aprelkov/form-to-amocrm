<?php
# An array of parameters that must be passed by the POST method to the API
$user=array(
	'USER_LOGIN'=>'name@mail.com', # Your login (email)
	'USER_HASH'=>'14dab230a28790072d8a9c266134470' # Hash to access the API (see profile)
);

$subdomain='subdomain'; # Your account (subdomain)
# Create a link for request
$link='https://'.$subdomain.'.amocrm.ru/private/api/auth.php?type=json';
$curl=curl_init(); # Save the cURL session handle
# Set the necessary options for cURL session
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
curl_setopt($curl,CURLOPT_URL,$link);
curl_setopt($curl,CURLOPT_POST,true);
curl_setopt($curl,CURLOPT_POSTFIELDS,http_build_query($user));
curl_setopt($curl,CURLOPT_HEADER,false);
curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);

$out=curl_exec($curl); # Initiate a request to the API and stores the response to variable
$code=curl_getinfo($curl,CURLINFO_HTTP_CODE); # Obtain the HTTP-server response code
curl_close($curl); # Close cURL session
CheckCurlResponse($code);
/**
 * Obtain data in JSON-format, therefore, to obtain the data being read,
 * we have to translate the answer into a format understood by PHP
 */
$Response=json_decode($out,true);
$Response=$Response['response'];
if(isset($Response['auth'])) # Flag of authorization is available in the property "auth"
	return 'Authorization successful';
return 'Authorization failed';
?>
