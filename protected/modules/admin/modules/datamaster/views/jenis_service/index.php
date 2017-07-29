<?php
$this->breadcrumbs=array(
	'Jenis Services',
);

?>

<h2>Jenis Service<br /><small style="font-size:14px;color:#999999">Manage</small></h2>
<hr />

<?php echo CHtml::link('Create',array('create'),array('class'=>'btn btn-sm blue-madison')); ?> 

<?php $this->widget('booster.widgets.TbGridView',array(
    'id'=>'jenis-service-grid',
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
		'jenis_serviceID',
		'nama',
		'keterangan',
		'file_gambar',
		[
			'header' => '<h6 style="color:#999999">updated</h6>',
			'type' => 'raw',
			'value' => function($data){
				$by=empty($data->updated_by) ? '' : $data->updated_by."<br />";
            	$at=empty($data->updated_at) ? '' : date('d M Y H:i:s',$data->updated_at)."<br />";
				return "<h6 style='color:#999999'>$by $at</h6>";
            },
		],		
		array(
            'class'=>'booster.widgets.TbButtonColumn',
            'template' => '{view} {update}',
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
