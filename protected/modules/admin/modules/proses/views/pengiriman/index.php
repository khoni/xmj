<?php
$this->breadcrumbs=array(
	'Pengirimen',
);

?>

<h2>Pengiriman<br /><small style="font-size:14px;color:#999999">Manage</small></h2>
<hr />

<?php echo CHtml::link('Create',array('create'),array('class'=>'btn btn-sm blue-madison')); ?> 

<?php $this->widget('booster.widgets.TbGridView',array(
    'id'=>'pengiriman-grid',
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
			'name' => 'nomer_connote',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->connote->nomer) ? '-' : $data->connote->nomer."<br /><small style='font-size:11px; color:#aaaaaa;'>".$data->connote->kantor->fullnama."</h6>";
            },
		],		
		
		[
			'name' => 'origin_kantorID',
			'type' => 'raw',
			'filter' => false,
			'value' => function($data){
            	return empty($data->originKantor->fullnama) ? '-' : $data->originKantor->fullnama;
            },
		],		
		
		[
			'name' => 'destination_kantorID',
			'type' => 'raw',
			'filter' => false,
			'value' => function($data){
            	return empty($data->destinationKantor->fullnama) ? '-' : $data->destinationKantor->fullnama;
            },
		],		
		
		[
			'name' => 'pengiriman_viaID',
			'type' => 'raw',
			'filter' => false,
			'value' => function($data){
            	return empty($data->pengirimanVia->nama) ? '-' : $data->pengirimanVia->nama;
            },
		],		
		
		[
			'name' => 'jenis_serviceID',
			'type' => 'raw',
			'filter' => false,
			'value' => function($data){
            	return empty($data->jenisService->nama) ? '-' : $data->jenisService->nama;
            },
		],		

		[
			'name' => 'jenis_barangID',
			'type' => 'raw',
			'filter' => false,
			'value' => function($data){
            	return empty($data->jenisBarang->nama) ? '-' : $data->jenisBarang->nama;
            },
		],		
		
				/*
		[
			'name' => 'instruksi',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->instruksi) ? '-' : $data->instruksi;
            },
		],		
		
		[
			'name' => 'deskripsi',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->deskripsi) ? '-' : $data->deskripsi;
            },
		],		
		
		[
			'name' => 'is_cash',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->is_cash) ? '-' : $data->is_cash;
            },
		],		
		
		[
			'name' => 'is_member',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->is_member) ? '-' : $data->is_member;
            },
		],		
		
		[
			'name' => 'pengirim_no_identitas',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->pengirim_no_identitas) ? '-' : $data->pengirim_no_identitas;
            },
		],		
		
		[
			'name' => 'pengirim_nama',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->pengirim_nama) ? '-' : $data->pengirim_nama;
            },
		],		
		
		[
			'name' => 'pengirim_alamat',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->pengirim_alamat) ? '-' : $data->pengirim_alamat;
            },
		],		
		
		[
			'name' => 'pengirim_telepon',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->pengirim_telepon) ? '-' : $data->pengirim_telepon;
            },
		],		
		
		[
			'name' => 'penerima_nama',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->penerima_nama) ? '-' : $data->penerima_nama;
            },
		],		
		
		[
			'name' => 'penerima_telepon',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->penerima_telepon) ? '-' : $data->penerima_telepon;
            },
		],		
		
		[
			'name' => 'penerima_negaraID',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->penerima_negaraID) ? '-' : $data->penerima_negaraID;
            },
		],		
		
		[
			'name' => 'penerima_propinsiID',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->penerima_propinsiID) ? '-' : $data->penerima_propinsiID;
            },
		],		
		
		[
			'name' => 'penerima_kabupatenID',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->penerima_kabupatenID) ? '-' : $data->penerima_kabupatenID;
            },
		],		
		
		[
			'name' => 'penerima_kecamatanID',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->penerima_kecamatanID) ? '-' : $data->penerima_kecamatanID;
            },
		],		
		
		[
			'name' => 'penerima_kelurahanID',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->penerima_kelurahanID) ? '-' : $data->penerima_kelurahanID;
            },
		],		
		
		[
			'name' => 'penerima_alamat',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->penerima_alamat) ? '-' : $data->penerima_alamat;
            },
		],		
		
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
