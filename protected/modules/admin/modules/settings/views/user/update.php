<?php
$this->breadcrumbs=array(
	'User'=>array('index'),
	$model->userID=>array('view','id'=>$model->userID),
	'Update',
);

$this->menu=array(
    array('label'=>'List User','url'=>array('index')),
    array('label'=>'Create User','url'=>array('create')),
    array('label'=>'View User','url'=>array('view','id'=>$model->userID)),
    array('label'=>'Manage User','url'=>array('admin')),
);
?>

<h1>Update User <?php echo $model->userID; ?></h1>
<hr />
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>