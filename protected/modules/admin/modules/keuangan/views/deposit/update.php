<?php
$this->breadcrumbs=array(
	'Deposit'=>array('index'),
	$model->depositID=>array('view','id'=>$model->depositID),
	'Update',
);

?>

<h2>Update<br /><small style="font-size:12px;color:#999999">Deposit :  <?php echo $model->depositID; ?></small></h1>
<hr />
<?php 
	echo CHtml::link('Create',array('create'),array('class'=>'btn btn-sm blue-madison'));
    echo CHtml::link('View',array('view','id'=>$model->depositID),array('class'=>'btn btn-sm green-meadow'));
    echo CHtml::link('Manage',array('index'),array('class'=>'btn btn-sm yellow'));
?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>