<?php
$this->breadcrumbs=array(
	'User Role'=>array('index'),
	'Create',
);

$this->menu=array(
    array('label'=>'List UserRole','url'=>array('index')),
    array('label'=>'Manage UserRole','url'=>array('admin')),
);
?>

<h1>Create UserRole</h1>
<hr />
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>