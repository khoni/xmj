<?php
$this->breadcrumbs=array(
	'Kelurahan'=>array('index'),
	$model->kelurahanID=>array('view','id'=>$model->kelurahanID),
	'Update',
);

?>

<h2>Update<br /><small style="font-size:12px;color:#999999">Kelurahan :  <?php echo $model->kelurahanID; ?></small></h1>
<hr />
<?php 
	echo CHtml::link('Create',array('create'),array('class'=>'btn btn-sm blue-madison'));
    echo CHtml::link('View',array('view','id'=>$model->kelurahanID),array('class'=>'btn btn-sm green-meadow'));
    echo CHtml::link('Manage',array('index'),array('class'=>'btn btn-sm yellow'));
?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>