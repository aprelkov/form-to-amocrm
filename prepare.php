<?php
function CheckCurlResponse($code)
{
	$code=(int)$code;
	$errors=array(
		301=>'Moved permanently',
		400=>'Bad request',
		401=>'Unauthorized',
		403=>'Forbidden',
		404=>'Not found',
		500=>'Internal server error',
		502=>'Bad gateway',
		503=>'Service unavailable'
	);
	try
	{
		# If the response code is not equal to 200 or 204 - returns an error message
		if($code!=200 && $code!=204)
			throw new Exception(isset($errors[$code]) ? $errors[$code] : 'Undescribed error',$code);
	}
	catch(Exception $E)
	{
		die('Error: '.$E->getMessage().PHP_EOL.'Error code: '.$E->getCode());
	}
}

$data=array(
	'name'=>isset($_POST['name']) ? $_POST['name'] : '',
	'phone'=>isset($_POST['phone']) ? $_POST['phone'] : '',
	'email'=>isset($_POST['email']) ? $_POST['email'] : '',
	'add_field_1'=>isset($_POST['add_field_1']) ? $_POST['add_field_1'] : ''
);

# If no name or e-mail contact - notify
if(empty($data['name']))
	die('Not filled contact name');
if(empty($data['email']))
	die('Not filled contact email');
?>
