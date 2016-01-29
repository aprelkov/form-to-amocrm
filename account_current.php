<?php
$link='https://'.$subdomain.'.amocrm.ru/private/api/v2/json/accounts/current'; #$subdomain already announced above
$curl=curl_init(); # Save the cURL session handle
# Set the necessary options for cURL session
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
curl_setopt($curl,CURLOPT_URL,$link);
curl_setopt($curl,CURLOPT_HEADER,false);
curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
 
$out=curl_exec($curl); # Initiate a request to the API and stores the response to Variable
$code=curl_getinfo($curl,CURLINFO_HTTP_CODE);
curl_close($curl);
CheckCurlResponse($code);
/**
 * Obtain data in JSON-format, therefore, to obtain the data being read,
 * we have to translate the answer into a format understood by PHP
 */
$Response=json_decode($out,true);
$account=$Response['response']['account'];
?>
