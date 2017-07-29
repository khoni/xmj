<?php
$this->breadcrumbs=array(
	'Deposits',
);

?>

<h2>Deposit<br /><small style="font-size:14px;color:#999999">Manage</small></h2>
<hr />

<?php echo CHtml::link('Create',array('create'),array('class'=>'btn btn-sm blue-madison')); ?> 

<?php $this->widget('booster.widgets.TbGridView',array(
    'id'=>'deposit-grid',
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
			'name' => 'tanggal_transfer',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->tanggal_transfer) ? '-' : $data->tanggal_transfer;
            },
		],		
		
		[
			'name' => 'is_transfer',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->is_transfer) ? '-' : $data->is_transfer;
            },
		],		
		
		[
			'name' => 'nama_bank_asal',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->nama_bank_asal) ? '-' : $data->nama_bank_asal;
            },
		],		
		
		[
			'name' => 'norek_bank_asal',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->norek_bank_asal) ? '-' : $data->norek_bank_asal;
            },
		],		

		[
			'name' => 'nama_bank_tujuan',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->nama_bank_tujuan) ? '-' : $data->nama_bank_tujuan;
            },
		],		
		
		[
			'name' => 'norek_bank_tujuan',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->norek_bank_tujuan) ? '-' : $data->norek_bank_tujuan;
            },
		],		
		
		[
			'name' => 'rp_jumlah',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->rp_jumlah) ? '-' : $data->rp_jumlah;
            },
		],		
		
		[
			'name' => 'verified_flag',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->verified_flag) ? '-' : $data->verified_flag;
            },
		],		
		
				/*
		[
			'name' => 'verified_time',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->verified_time) ? '-' : $data->verified_time;
            },
		],		
		
		[
			'name' => 'verified_userID',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->verified_userID) ? '-' : $data->verified_userID;
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
