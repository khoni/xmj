<?php
$this->breadcrumbs=array(
	'Jenis Service'=>array('index'),
	$model->jenis_serviceID=>array('view','id'=>$model->jenis_serviceID),
	'Update',
);

?>

<h2>Update<br /><small style="font-size:12px;color:#999999">JenisService :  <?php echo $model->jenis_serviceID; ?></small></h1>
<hr />
<?php 
	echo CHtml::link('Create',array('create'),array('class'=>'btn btn-sm blue-madison'));
    echo CHtml::link('View',array('view','id'=>$model->jenis_serviceID),array('class'=>'btn btn-sm green-meadow'));
    echo CHtml::link('Manage',array('index'),array('class'=>'btn btn-sm yellow'));
?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>