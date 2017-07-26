<?php
$this->breadcrumbs=array(
	'User'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
    array('label'=>'List User','url'=>array('index')),
    array('label'=>'Create User','url'=>array('create')),
    array('label'=>'View User','url'=>array('view','id'=>$model->id)),
    array('label'=>'Manage User','url'=>array('admin')),
);
?>

<h1>Update User <?php echo $model->id; ?></h1>
<hr />
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>