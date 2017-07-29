<?php
$this->breadcrumbs=array(
	'Pre Alert'=>array('index'),
	$model->pre_alertID=>array('view','id'=>$model->pre_alertID),
	'Update',
);

?>

<h2>Update<br /><small style="font-size:12px;color:#999999">PreAlert :  <?php echo $model->pre_alertID; ?></small></h1>
<hr />
<?php 
	echo CHtml::link('Create',array('create'),array('class'=>'btn btn-sm blue-madison'));
    echo CHtml::link('View',array('view','id'=>$model->pre_alertID),array('class'=>'btn btn-sm green-meadow'));
    echo CHtml::link('Manage',array('index'),array('class'=>'btn btn-sm yellow'));
?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>