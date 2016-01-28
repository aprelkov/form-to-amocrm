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
		#Если код ответа не равен 200 или 204 - возвращаем сообщение об ошибке
		if($code!=200 && $code!=204)
			throw new Exception(isset($errors[$code]) ? $errors[$code] : 'Undescribed error',$code);
	}
	catch(Exception $E)
	{
		die('Ошибка: '.$E->getMessage().PHP_EOL.'Код ошибки: '.$E->getCode());
	}
}

$data=array(
	'name'=>isset($_POST['name']) ? $_POST['name'] : 'name',
	'phone'=>isset($_POST['phone']) ? $_POST['phone'] : 'phone',
	'email'=>isset($_POST['email']) ? $_POST['email'] : 'email',
	'add_field_1'=>isset($_POST['add_field_1']) ? $_POST['add_field_1'] : ''
);

#Если не указано имя или e-mail контакта - уведомляем
if(empty($data['name']))
	die('Не заполнено имя контакта');
if(empty($data['email']))
	die('Не заполнен E-mail контакта');
?>
