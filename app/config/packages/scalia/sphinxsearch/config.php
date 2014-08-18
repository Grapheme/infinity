<?php

return array (
	'host'    => '127.0.0.1',
	'port'    => 3306,
    'indexes' => array (
        'channelsIndexInfinity' => array('table'=>'channels','column'=>'id'),
        'productsIndexInfinity' => array('table'=>'products','column'=>'id'),
        'productsAccessibilityIndexInfinity' => array('table'=>'products_accessories','column'=>'id'),
        'newsIndexInfinity' => array('table'=>'i18n_news','column'=>'id'),
        'pagesIndexInfinity' => array('table'=>'i18n_pages','column'=>'id')
    )
);
