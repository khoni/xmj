<?php
$this->breadcrumbs=array(
	'Hargas',
);

?>

<h2>Harga<br /><small style="font-size:14px;color:#999999">Manage</small></h2>
<hr />

<?php echo CHtml::link('Create',array('create'),array('class'=>'btn btn-sm blue-madison')); ?> 

<?php $this->widget('booster.widgets.TbGridView',array(
    'id'=>'harga-grid',
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
			
		[
			'name' => 'nama_daerah',
			'type' => 'raw',
			'value' => function($data){
				$neg=empty($data->negara->nama) ? '' : $data->negara->nama;
				$prop=empty($data->propinsi->nama) ? '' : $data->propinsi->nama;
				$kab=empty($data->kabupaten->nama) ? '' : $data->kabupaten->nama;
				$kec=empty($data->kecamatan->nama) ? '' : $data->kecamatan->nama;
				$kel=empty($data->kelurahan->nama) ? '' : $data->kelurahan->nama;
            	return "Kel. $kel<br /><small>Kec. $kec<br />$kab, <br />$prop,<br />$neg</small>";
            },
		],		
		[
			'name' => 'origin_kantorID',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
				$ktr=empty($data->originKantor->nama_kantor) ? '-' : $data->originKantor->nama_kantor;
				$kode=empty($data->originKantor->kode) ? '-' : $data->originKantor->kode;
            	return $ktr."<br />[".$kode."]";
            },
		],		
		
		[
			'name' => 'destinasi_kantorID',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
				$ktr=empty($data->destinasiKantor->nama_kantor) ? '-' : $data->destinasiKantor->nama_kantor;
				$kode=empty($data->destinasiKantor->kode) ? '-' : $data->destinasiKantor->kode;
            	return $ktr."<br />[".$kode."]";
            },
		],		
		
		[
			'name' => 'jenis_serviceID',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->jenis_serviceID) ? '-' : $data->jenis_serviceID;
            },
		],		
		
		[
			'name' => 'hari_estimasi',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->hari_estimasi) ? '-' : $data->hari_estimasi;
            },
		],		
		
		[
			'name' => 'rp_transit_kgp',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->rp_transit_kgp) ? '-' : $data->rp_transit_kgp;
            },
		],		
		
		[
			'name' => 'rp_transit_kgs',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->rp_transit_kgs) ? '-' : $data->rp_transit_kgs;
            },
		],		
		
		[
			'name' => 'rp_transit_lainnya',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->rp_transit_lainnya) ? '-' : $data->rp_transit_lainnya;
            },
		],		
		
		[
			'name' => 'rp_bp_kgp',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->rp_bp_kgp) ? '-' : $data->rp_bp_kgp;
            },
		],		
		
		[
			'name' => 'rp_bp_kgs',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->rp_bp_kgs) ? '-' : $data->rp_bp_kgs;
            },
		],		
		
		[
			'name' => 'rp_delivery',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->rp_delivery) ? '-' : $data->rp_delivery;
            },
		],		
		/*		
		[
			'name' => 'updated_at',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->updated_at) ? '-' : $data->updated_at;
            },
		],		
		
		[
			'name' => 'updated_by',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->updated_by) ? '-' : $data->updated_by;
            },
		],		
		*/
        array(
            'class'=>'booster.widgets.TbButtonColumn',
            'template' => '{view} {update} {delete}',
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
