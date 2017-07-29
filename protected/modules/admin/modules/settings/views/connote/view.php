<?php
$this->breadcrumbs=array(
	'Connotes'=>array('index'),
	'detail',
);

?>

<h2>Connote<br /><small style="font-size:14px;color:#999999">Manage</small></h2>
<hr />


<?php $this->widget('booster.widgets.TbGridView',array(
    'id'=>'connote-grid',
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
		'connoteID',
		[
			'name' => 'kantorID',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->kantor->fullnama) ? '-' : $data->kantor->fullnama;
            },
		],		
		
		[
			'name' => 'nomer',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->nomer) ? '-' : $data->nomer;
            },
		],		
		
		[
			'name' => 'connote_statusID ',
			'type' => 'raw',
			'filter' => false,
			'value' => function($data){
				$tr=empty($data->pengirimanID) ? '-' : $data->pengirimanID;
            	//return ($data->status==1) ? CHtml::link('Terpakai di '.$tr,array('viewtr','id'=>$tr)) : 'Belum Terpakai';
				return (empty($data->connoteStatus->nama) ? ' - ' : $data->connoteStatus->nama) . " " . $tr;
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
