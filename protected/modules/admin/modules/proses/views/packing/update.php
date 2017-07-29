<?php
$this->breadcrumbs=array(
	'Packing'=>array('index'),
	$model->packingID=>array('view','id'=>$model->packingID),
	'Update',
);

?>

<h2>Update<br /><small style="font-size:12px;color:#999999">Packing :  <?php echo $model->packingID; ?></small></h1>
<hr />
<?php 
	echo CHtml::link('Create',array('create'),array('class'=>'btn btn-sm blue-madison'));
    echo CHtml::link('View',array('view','id'=>$model->packingID),array('class'=>'btn btn-sm green-meadow'));
    echo CHtml::link('Manage',array('index'),array('class'=>'btn btn-sm yellow'));
?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>