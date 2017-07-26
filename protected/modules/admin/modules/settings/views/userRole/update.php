<?php
$this->breadcrumbs=array(
	'User Role'=>array('index'),
	$model->roleID=>array('view','id'=>$model->roleID),
	'Update',
);

$this->menu=array(
    array('label'=>'List UserRole','url'=>array('index')),
    array('label'=>'Create UserRole','url'=>array('create')),
    array('label'=>'View UserRole','url'=>array('view','id'=>$model->roleID)),
    array('label'=>'Manage UserRole','url'=>array('admin')),
);
?>

<h1>Update UserRole <?php echo $model->roleID; ?></h1>
<hr />
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>