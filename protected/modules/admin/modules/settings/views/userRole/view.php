<?php
$this->breadcrumbs=array(
	'User Role'=>array('index'),
	$model->roleID,
);

$this->menu=array(
    array('label'=>'List UserRole','url'=>array('index')),
    array('label'=>'Create UserRole','url'=>array('create')),
    array('label'=>'Update UserRole','url'=>array('update','id'=>$model->roleID)),
    array('label'=>'Delete UserRole','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->roleID),'confirm'=>'Are you sure you want to delete this item?')),
    array('label'=>'Manage UserRole','url'=>array('admin')),
);
?>

<h1>View UserRole #<?php echo $model->roleID; ?></h1>
<hr />
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'roleID',
		'userID',
		'status',
		'updated_at',
		'updated_by',
),
)); ?>
