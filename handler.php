<?php
error_reporting(-1);
header('Content-Type: text/html; charset=utf-8');
$root=__DIR__.DIRECTORY_SEPARATOR;

require $root.'prepare.php'; #Здесь будут производиться подготовительные действия, объявления функций и т.д.
require $root.'auth.php'; #Здесь будет происходить авторизация пользователя
require $root.'account_current.php'; #Здесь мы будем получать информацию об аккаунте
require $root.'fields_info.php'; #Получим информацию о полях
require $root.'contacts_list.php'; #Проверяем, существует ли уже контакт с таким email
require $root.'lead_add.php'; #Здесь будет происходить добавление сделки
require $root.'contact_add.php'; #Здесь будет происходить добавление контакта
?>
