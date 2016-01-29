<?php

if(empty($contact['id'])) {    # If such Сontact doesn't exist in amoCRM, then we create a new Contact
$contact=array(
	'name'=>$data['name'],      
	'linked_leads_id'=>array($lead_id),
	'custom_fields'=>array(
		array(
			'id'=>$custom_fields['EMAIL'],
			'values'=>array(
				array(
					'value'=>$data['email'],
					'enum'=>'WORK'
				)
			)
		)
	)
);

if(!empty($data['phone']))
	$contact['custom_fields'][]=array(
		'id'=>$custom_fields['PHONE'],
		'values'=>array(
			array(
				'value'=>$data['phone'],
				'enum'=>'OTHER'
			)
		)
        );


$set['request']['contacts']['add'][] = $contact;

# Create a link for request
$link='https://'.$subdomain.'.amocrm.ru/private/api/v2/json/contacts/set';

$curl=curl_init(); # Save the cURL session handle
# Set the necessary options for cURL session
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
curl_setopt($curl,CURLOPT_URL,$link);
curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'POST');
curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($set));
curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
curl_setopt($curl,CURLOPT_HEADER,false);
curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);

$out=curl_exec($curl); # Initiate a request to the API and stores the response to variable
$code=curl_getinfo($curl,CURLINFO_HTTP_CODE);
CheckCurlResponse($code);

/**
 * Obtain data in JSON-format, therefore, to obtain the data being read,
 * we have to translate the answer into a format understood by PHP
 */
$Response=json_decode($out,true);
$Response=$Response['response']['contacts']['add'];

echo 'New order successfully added.';

$output='Added contacts IDs:'.PHP_EOL;

foreach($Response as $v)
	if(is_array($v))
		$output.=$v['id'].PHP_EOL;
return $output;
}

else {    # If such Contact already exists in amoCRM, we attach new Lead to it
    $contact=array(
		'id' => $contact['id'],
		'linked_leads_id' => array($lead_id),
		'last_modified' => time(),
		'name' => $data['name']
		);
    
    $set['request']['contacts']['update'][] = $contact;
    
# Create a link for request
$link='https://'.$subdomain.'.amocrm.ru/private/api/v2/json/contacts/set';
$curl=curl_init(); # Save the cURL session handle
# Set the necessary options for cURL session
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
curl_setopt($curl,CURLOPT_URL,$link);
curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'POST');
curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($set));
curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
curl_setopt($curl,CURLOPT_HEADER,false);
curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
 
$out=curl_exec($curl); # Initiate a request to the API and stores the response to variable
$code=curl_getinfo($curl,CURLINFO_HTTP_CODE);
$Response=json_decode($out,true);
$Response2=$Response['response']['contacts']['update'];

echo 'Such Сontact already exists in the CRM. <br> New Lead is added to it.';
}

?>
