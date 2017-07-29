<?php
$modul=array(
	// uncomment the following to enable the Gii tool

	'gii' => array(
		'class' => 'system.gii.GiiModule',
		'password' => 'admin',
		// If removed, Gii defaults to localhost only. Edit carefully to taste.
		//'ipFilters' => array('127.0.0.1', '::1', '139.195.122.156', '210.57.215.198', '202.67.41.51', '139.194.160.159', '139.194.166.147', '139.194.171.91', '139.194.160.206', '120.164.41.131', '139.195.122.178','210.57.215.138', '115.178.239.212'),
		'ipFilters' => array(),
		'generatorPaths' => array(
			'booster.gii'
		),
	),
	'profile',
	'admin'=>array(
		'modules'=>array(
			'datamaster',
			'settings',
			'keuangan',
			'proses',
		),	
	),
	'agen',
	'cabang',
	'korporasi',
	'kurir',
	'mitra',
	'pelanggan',
	'pusat',
	'sales',
	'subagen',
	'vupdate',
	'mobile',
);
?>