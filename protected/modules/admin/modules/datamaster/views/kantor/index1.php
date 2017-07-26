<?php
$this->breadcrumbs=array(
	'Kantors',
);

?>

<h2>Kantor<br /><small style="font-size:14px;color:#999999">Manage</small></h2>
<hr />

<?php $this->widget('booster.widgets.TbGridView',array(
    'id'=>'kantor-grid',
    'type' => 'hover condensed striped',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'pager' => array(
        'header' => '',
        'htmlOptions' => array(
            'class' => 'pagination'
        )
    ),
    'columns'=>array(
				array(
            'header' => 'No.',
            'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
        ),    
		'kantorID',
		[
			'name' => 'kode',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->kode) ? '-' : $data->kode;
            },
		],		
		[
			'name' => 'nama_kantor',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->nama_kantor) ? '-' : $data->nama_kantor;
            },
		],			
		[
			'name' => 'nama',
            'header' => 'Nama Pengguna',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->user->nama) ? '-' : $data->user->nama;
            },
		],				
		[
			'name' => 'alamat_jalan',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
				$daerah=empty($data->kelurahan->nama) ? '' : "Kel. ".$data->kelurahan->nama."; ";
				$daerah.=empty($data->kecamatan->nama) ? '' : "Kec. ".$data->kecamatan->nama."; ";
				$daerah.=empty($data->kabupaten->nama) ? '' : "Kota/Kab. ".$data->kabupaten->nama."; ";
				$daerah.=empty($data->propinsi->nama) ? '' : "Prop. ".$data->propinsi->nama."; ";
				$daerah.=empty($data->negara->nama) ? '' : $data->negara->nama."; ";
				
				
            	return empty($data->alamat_jalan) ? '-' : $data->alamat_jalan."<br /><small style='color:#888888'>".$daerah."</small>";
            },
		],		
        array(
            'class'=>'booster.widgets.TbButtonColumn',
            'template' => '{view}',
			/*
            'buttons' => array(
                'view' => array(
                    'options'=>array("target"=>"_blank"),
                ),
            ),
			*/
        ),
    ),
)); 
?>
