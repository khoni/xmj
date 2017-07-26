<?php
$this->breadcrumbs=array(
	'User'=>array('index'),
	'Manage',
);
 ?>
<h1>Manage User</h1>
<hr />

<?php $this->widget('booster.widgets.TbGridView',array(
    'id'=>'user-grid',
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
			'name' => 'roleID',
			'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => '$data->roleNama',
		],
		[
			'name' => 'nama',
			'type' => 'raw',
			'value' => '"$data->nama<br /><small style=\"color:#999999;\"><i>User ID : $data->userID<br />$data->username</i></small>"',
		],
		'hp',
		[
			'header' => '&nbsp;',
			'type' => 'raw',
			'value' => function($data){
				return CHtml::link('Reset Password',array('reset_pass','id'=>$data->userID),array('onclick'=>'confirm("Yakin Reset Password ['.$data->nama.'] ?")'));
			}
		],
        array(
            'class' => 'booster.widgets.TbButtonColumn',
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
