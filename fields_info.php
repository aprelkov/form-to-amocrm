<?php

$lead_number=time();
$lead_name='Заявка с сайта №'.$lead_number;

$need=array_flip(array('POSITION','PHONE','EMAIL','CITY' ));
if(isset($account['custom_fields'],$account['custom_fields']['contacts']))
	do
	{
		foreach($account['custom_fields']['contacts'] as $field)
			if(is_array($field) && isset($field['id']))
			{
				if(isset($field['code']) && isset($need[$field['code']]))
					$fields[$field['code']]=(int)$field['id'];
				#SCOPE - нестандартное поле, поэтому обрабатываем его отдельно
				elseif(isset($field['name']) && $field['name']=='Город')
					$fields['CITY']=$field;

				$diff=array_diff_key($need,$fields);
				if(empty($diff))
					break 2;
			}
			if(isset($diff))
				die('В amoCRM отсутствуют следующие поля'.': '.join(', ',$diff));
			else
				die('Невозможно получить дополнительные поля');
		}
	while(false);
else
	die('Невозможно получить дополнительные поля');

$custom_fields=isset($fields) ? $fields : false;

?>
