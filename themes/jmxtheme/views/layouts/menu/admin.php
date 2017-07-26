	<?php
$menu=array(
	array(
		'label' => '<i class="glyphicon glyphicon-home"></i> Home',
		'url' => array('/profile/user/index'),
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
				'url' => array('/admin/settings/user/index'),
			),
			array(
				'label' => '<i class="glyphicon glyphicon-list-alt"> </i> Wilayah Kerja',
				'url' => array('/admin/settings/wilayah_kerja/index'),
			),
			array(
				'label' => '<i class="glyphicon glyphicon-list-alt"> </i> Biaya Pusat',
				'url' => array('/admin/settings/biaya_pusat/index'),
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
				'label' => '<i class="glyphicon glyphicon-list-alt"> </i> Semua Kantor',
				'url' => array('/admin/datamaster/kantor/index'),
			),
			array(
				'label' => '<i class="glyphicon glyphicon-list-alt"> </i> Cabang',
				'url' => array('/admin/datamaster/cabang/index'),
			),
			array(
				'label' => '<i class="glyphicon glyphicon-list-alt"> </i> Sub Agen',
				'url' => array('/admin/datamaster/agen_sub/index'),
			),
			array(
				'label' => '<i class="glyphicon glyphicon-list-alt"> </i> Agen',
				'url' => array('/admin/datamaster/agen/index'),
			),
			array(
				'label' => '<i class="glyphicon glyphicon-list-alt"> </i> Propinsi',
				'url' => array('/admin/datamaster/propinsi/index'),
			),
			array(
				'label' => '<i class="glyphicon glyphicon-list-alt"> </i> Kota/Kabupaten',
				'url' => array('/admin/datamaster/kabupaten/index'),
			),
			array(
				'label' => '<i class="glyphicon glyphicon-list-alt"> </i> Kecamatan',
				'url' => array('/admin/datamaster/kecamatan/index'),
			),
			array(
				'label' => '<i class="glyphicon glyphicon-list-alt"> </i> kelurahan',
				'url' => array('/admin/datamaster/kelurahan/index'),
			),
			array(
				'label' => '<i class="glyphicon glyphicon-list-alt"> </i> Jenis Service',
				'url' => array('/admin/datamaster/jenis_service/index'),
			),
			array(
				'label' => '<i class="glyphicon glyphicon-list-alt"> </i> Jenis Barang',
				'url' => array('/admin/datamaster/jenis_barang/index'),
			),
			array(
				'label' => '<i class="glyphicon glyphicon-list-alt"> </i> Pengaturan Harga',
				'url' => array('/admin/datamaster/harga/index'),
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
				'label' => '<i class="glyphicon glyphicon-list-alt"> </i> Generate',
				'url' => array('/admin/transaksi/harga/index'),
			),
		),
	),

	array(
		'label' => '<i class="icon-plus"></i> Transaksi<span class="arrow"></span>',
		'url' => array('#'),	
		'itemOptions' => array(
			'class' => ''
		),
		'submenuOptions' => array(
			'class' => 'sub-menu',
		),
		'items' => array(
			array(
				'label' => '<i class="glyphicon glyphicon-list-alt"> </i> Pengaturan Harga',
				'url' => array('/admin/transaksi/harga/index'),
			),
		),
	),

);
?>