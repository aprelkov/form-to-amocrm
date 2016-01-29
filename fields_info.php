<?php

$lead_number=time();
$lead_name='New Lead from Website #'.$lead_number;

$need=array_flip(array('POSITION','PHONE','EMAIL' ));
if(isset($account['custom_fields'],$account['custom_fields']['contacts']))
	do
	{
		foreach($account['custom_fields']['contacts'] as $field)
			if(is_array($field) && isset($field['id']))
			{
				if(isset($field['code']) && isset($need[$field['code']]))
					$fields[$field['code']]=(int)$field['id'];

				$diff=array_diff_key($need,$fields);
				if(empty($diff))
					break 2;
			}
			if(isset($diff))
				die('In amoCRM missing the following fields: '.join(', ',$diff));
			else
				die('Unable to get additional fields');
		}
	while(false);
else
	die('Unable to get additional fields');

$custom_fields=isset($fields) ? $fields : false;

?>
