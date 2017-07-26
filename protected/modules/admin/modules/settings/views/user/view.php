<?php
$this->breadcrumbs=array(
	'User'=>array('index'),
	$model->userID,
);

$this->menu=array(
    array('label'=>'List User','url'=>array('index')),
    array('label'=>'Create User','url'=>array('create')),
    array('label'=>'Update User','url'=>array('update','id'=>$model->userID)),
    array('label'=>'Delete User','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->userID),'confirm'=>'Are you sure you want to delete this item?')),
    array('label'=>'Manage User','url'=>array('admin')),
);
?>

<h1>View User <?php echo $model->userID; ?></h1>
<hr />
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'userID',
		'username',
		'password',
		'hp',
		[
			'label' => 'Status',
			'value' => ($model->status==1 ? 'Aktif' : 'Non Aktif'),
		],
		[
			'name' => 'updated_at',
			'value' => function($data){
				return empty($data->updated_at) ? '-' : date('d M Y H:i:s',$data->updated_at);
			}
		],
		[
			'label' => 'Updated by',
			'value' => empty($model->updated_by) ? '-' : $model->updated_by,
		],
),
)); ?>
