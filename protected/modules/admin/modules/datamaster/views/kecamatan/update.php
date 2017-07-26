<?php
$this->breadcrumbs=array(
	'Kecamatan'=>array('index'),
	$model->kecamatanID=>array('view','id'=>$model->kecamatanID),
	'Update',
);

?>

<h2>Update<br /><small style="font-size:12px;color:#999999">Kecamatan :  <?php echo $model->kecamatanID; ?></small></h1>
<hr />
<?php 
	echo CHtml::link('Create',array('create'),array('class'=>'btn btn-sm blue-madison'));
    echo CHtml::link('View',array('view','id'=>$model->kecamatanID),array('class'=>'btn btn-sm green-meadow'));
    echo CHtml::link('Manage',array('index'),array('class'=>'btn btn-sm yellow'));
?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>