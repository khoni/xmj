<?php
$this->breadcrumbs=array(
	'Manifests',
);

?>

<h2>Manifest<br /><small style="font-size:14px;color:#999999">Manage</small></h2>
<hr />

<?php echo CHtml::link('Create',array('create'),array('class'=>'btn btn-sm blue-madison')); ?> 

<?php $this->widget('booster.widgets.TbGridView',array(
    'id'=>'manifest-grid',
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
			'name' => 'packingID',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->packingID) ? '-' : $data->packingID;
            },
		],		
		
		[
			'name' => 'to_kantorID',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->to_kantorID) ? '-' : $data->to_kantorID;
            },
		],		
		
		[
			'name' => 'berat_manifest_kg',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->berat_manifest_kg) ? '-' : $data->berat_manifest_kg;
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
