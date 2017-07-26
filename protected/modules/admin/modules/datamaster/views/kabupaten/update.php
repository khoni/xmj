<?php
$this->breadcrumbs=array(
	'Kabupaten'=>array('index'),
	$model->kabupatenID=>array('view','id'=>$model->kabupatenID),
	'Update',
);

?>

<h2>Update<br /><small style="font-size:12px;color:#999999">Kabupaten :  <?php echo $model->kabupatenID; ?></small></h1>
<hr />
<?php 
	echo CHtml::link('Create',array('create'),array('class'=>'btn btn-sm blue-madison'));
    echo CHtml::link('View',array('view','id'=>$model->kabupatenID),array('class'=>'btn btn-sm green-meadow'));
    echo CHtml::link('Manage',array('index'),array('class'=>'btn btn-sm yellow'));
?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>