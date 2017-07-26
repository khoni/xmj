<?php
$this->breadcrumbs=array(
	'Kelurahans',
);

?>

<h2>Kelurahan<br /><small style="font-size:14px;color:#999999">Manage</small></h2>
<hr />

<?php echo CHtml::link('Create',array('create'),array('class'=>'btn btn-sm blue-madison')); ?> 

<?php $this->widget('booster.widgets.TbGridView',array(
    'id'=>'kelurahan-grid',
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
			'name' => 'nama_negara',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->kecamatan->kabupaten->propinsi->negara->nama) ? '-' : $data->kecamatan->kabupaten->propinsi->negara->nama;
            },
		],		
		[
			'name' => 'nama_propinsi',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->kecamatan->kabupaten->propinsi->nama) ? '-' : $data->kecamatan->kabupaten->propinsi->nama;
            },
		],		
		[
			'name' => 'nama_kabupaten',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->kecamatan->kabupaten->nama) ? '-' : $data->kecamatan->kabupaten->nama;
            },
		],		
		[
			'name' => 'nama_kecamatan',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->kecamatan->nama) ? '-' : $data->kecamatan->nama;
            },
		],		

		[
			'name' => 'nama',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
				$kdpos=empty($data->kodepos) ? '-' : $data->kodepos;
            	return empty($data->nama) ? '-' : $data->nama."<br /><small>Kodepos : ".$kdpos."</small>";
            },
		],		
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
