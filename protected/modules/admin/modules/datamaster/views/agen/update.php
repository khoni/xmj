<?php
$this->breadcrumbs=array(
	'Agen'=>array('index'),
	$agen->agenID=>array('view','id'=>$agen->agenID),
	'Update',
);

?>

<h2>Update<br /><small style="font-size:12px;color:#999999">Agen :  <?php echo $agen->agenID; ?></small></h1>
<hr />
<?php 
	echo CHtml::link('Create',array('create'),array('class'=>'btn btn-sm blue-madison'));
    echo CHtml::link('View',array('view','id'=>$agen->agenID),array('class'=>'btn btn-sm green-meadow'));
    echo CHtml::link('Manage',array('index'),array('class'=>'btn btn-sm yellow'));
?>

<?php echo $this->renderPartial('_form',array('user'=>$user)); ?>