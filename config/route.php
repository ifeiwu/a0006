<?php
return array(

	'/' => array(
		'method' => 'GET',
		'controller' => 'Home',
		'action' => 'index'
	),
	
	// 流量统计
	'/stats' => array(
		'method' => 'POST',
		'controller' => 'Stats',
		'action' => 'index'
	),
);
