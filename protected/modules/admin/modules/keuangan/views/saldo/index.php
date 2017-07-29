<?php
$this->breadcrumbs=array(
	'Saldos',
);

?>

<h2>Saldo<br /><small style="font-size:14px;color:#999999">Manage</small></h2>
<hr />

<?php echo CHtml::link('Create',array('create'),array('class'=>'btn btn-sm blue-madison')); ?> 

<?php $this->widget('booster.widgets.TbGridView',array(
    'id'=>'saldo-grid',
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
			'name' => 'kantorID',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->kantorID) ? '-' : $data->kantorID;
            },
		],		
		
		[
			'name' => 'jenis_pencatatanID',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->jenis_pencatatanID) ? '-' : $data->jenis_pencatatanID;
            },
		],		
		
		[
			'name' => 'keterangan',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->keterangan) ? '-' : $data->keterangan;
            },
		],		
		
		[
			'name' => 'tanggal',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->tanggal) ? '-' : $data->tanggal;
            },
		],		
		
		[
			'name' => 'rp_debet',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->rp_debet) ? '-' : $data->rp_debet;
            },
		],		

		[
			'name' => 'rp_kredit',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->rp_kredit) ? '-' : $data->rp_kredit;
            },
		],		
		
		[
			'name' => 'rp_saldo',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->rp_saldo) ? '-' : $data->rp_saldo;
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
