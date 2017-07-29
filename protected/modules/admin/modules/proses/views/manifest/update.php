<?php
$this->breadcrumbs=array(
	'Manifest'=>array('index'),
	$model->manifestID=>array('view','id'=>$model->manifestID),
	'Update',
);

?>

<h2>Update<br /><small style="font-size:12px;color:#999999">Manifest :  <?php echo $model->manifestID; ?></small></h1>
<hr />
<?php 
	echo CHtml::link('Create',array('create'),array('class'=>'btn btn-sm blue-madison'));
    echo CHtml::link('View',array('view','id'=>$model->manifestID),array('class'=>'btn btn-sm green-meadow'));
    echo CHtml::link('Manage',array('index'),array('class'=>'btn btn-sm yellow'));
?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>