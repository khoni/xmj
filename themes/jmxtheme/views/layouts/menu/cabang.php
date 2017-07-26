<?php
$menu=array(
	array(
		'label' => '<i class="glyphicon glyphicon-home"></i> Home',
		'url' => array('/profile/user/index'),
	),
	array(
		'label' => '<i class="icon-plus"></i> Proses <span class="arrow"></span>',
		'url' => array('#'),	
		'itemOptions' => array(
			'class' => ''
		),
		'submenuOptions' => array(
			'class' => 'sub-menu',
		),
		'items' => array(
			array(
				'label' => '<i class="glyphicon glyphicon-list-alt"> </i> Transaksi Connote',
				'url' => array('/cabang/connote/deposit/index'),
			),
			array(
				'label' => '<i class="glyphicon glyphicon-list-alt"> </i> Manifest',
				'url' => array('/cabang/connote/deposit/index'),
			),
			array(
				'label' => '<i class="glyphicon glyphicon-list-alt"> </i> Packing List',
				'url' => array('/cabang/connote/deposit/index'),
			),
			array(
				'label' => '<i class="glyphicon glyphicon-list-alt"> </i> Pre Alert',
				'url' => array('/cabang/connote/deposit/index'),
			),
		),
	),

	array(
		'label' => '<i class="icon-plus"></i> Report <span class="arrow"></span>',
		'url' => array('#'),	
		'itemOptions' => array(
			'class' => ''
		),
		'submenuOptions' => array(
			'class' => 'sub-menu',
		),
		'items' => array(
			array(
				'label' => '<i class="glyphicon glyphicon-list-alt"> </i> Keuangan',
				'url' => array('/cabang/connote/deposit/index'),
			),
		),
	),

	array(
		'label' => '<i class="icon-plus"></i> Connote<span class="arrow"></span>',
		'url' => array('#'),	
		'itemOptions' => array(
			'class' => ''
		),
		'submenuOptions' => array(
			'class' => 'sub-menu',
		),
		'items' => array(
			array(
				'label' => '<i class="glyphicon glyphicon-list-alt"> </i> Deposit',
				'url' => array('/cabang/connote/deposit/index'),
			),
			array(
				'label' => '<i class="glyphicon glyphicon-list-alt"> </i> Pembagian',
				'url' => array('/cabang/connote/pembagian/index'),
			),
			array(
				'label' => '<i class="glyphicon glyphicon-list-alt"> </i> Stok',
				'url' => array('/cabang/connote/stok/index'),
			),
		),
	),

	array(
		'label' => '<i class="icon-plus"></i> Settings<span class="arrow"></span>',
		'url' => array('#'),	
		'itemOptions' => array(
			'class' => ''
		),
		'submenuOptions' => array(
			'class' => 'sub-menu',
		),
		'items' => array(
			array(
				'label' => '<i class="glyphicon glyphicon-list-alt"> </i> User',
				'url' => array('/cabang/settings/user/index'),
			),
		),
	),

	array(
		'label' => '<i class="icon-plus"></i> Master<span class="arrow"></span>',
		'url' => array('#'),	
		'itemOptions' => array(
			'class' => ''
		),
		'submenuOptions' => array(
			'class' => 'sub-menu',
		),
		'items' => array(
			array(
				'label' => '<i class="glyphicon glyphicon-list-alt"> </i> Sub Agen',
				'url' => array('/cabang/datamaster/sub_agen/index'),
			),
			array(
				'label' => '<i class="glyphicon glyphicon-list-alt"> </i> Agen',
				'url' => array('/cabang/datamaster/agen/index'),
			),
			array(
				'label' => '<i class="glyphicon glyphicon-list-alt"> </i> Gerai',
				'url' => array('/cabang/datamaster/gerai/index'),
			),
			array(
				'label' => '<i class="glyphicon glyphicon-list-alt"> </i> Coorporate',
				'url' => array('/cabang/datamaster/korporasi/index'),
			),
			array(
				'label' => '<i class="glyphicon glyphicon-list-alt"> </i> Mitra',
				'url' => array('/cabang/datamaster/mitra/index'),
			),
			array(
				'label' => '<i class="glyphicon glyphicon-list-alt"> </i> Bank',
				'url' => array('/cabang/datamaster/bank/index'),
			),
			array(
				'label' => '<i class="glyphicon glyphicon-list-alt"> </i> Harga',
				'url' => array('/cabang/datamaster/harga/index'),
			),
		),
	),

);
?>