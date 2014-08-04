<?php

return array(

    'feedback_mail' => 'vkharseev@gmail.com',
    'feedback_name' => 'Владимир Харсеев',

	'driver' => 'smtp',
	'host' => 'smtp.gmail.com',
	'port' => 587,
	'from' => array('address' => 'uspensky.pk@gmail.com', 'name' => 'Успенский ПК'),
	'encryption' => 'tls',
	'username' => 'uspensky.pk@gmail.com',
	'password' => 'hf5msdfl34',
	'sendmail' => '/usr/sbin/sendmail -bs',
	'pretend' => false,
);