<?php
$this->breadcrumbs=array(
	'User'=>array('index'),
	$model->name,
);

$this->menu=array(
    array('label'=>'List User','url'=>array('index')),
    array('label'=>'Create User','url'=>array('create')),
    array('label'=>'Update User','url'=>array('update','id'=>$model->id)),
    array('label'=>'Delete User','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
    array('label'=>'Manage User','url'=>array('admin')),
);
?>

<h1>My Profile #<?php echo $model->id; ?></h1>
<hr />
<?php $this->widget('booster.widgets.TbDetailView',array(
'type'=>'striped bordered',
'data'=>$model,
'attributes'=>array(
		//'id',
		'username',
		//'password',
		'name',
),
)); ?>
